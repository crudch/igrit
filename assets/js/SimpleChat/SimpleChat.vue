<template>
    <div>
        <h1 class="title">Просто чат</h1>
        <div class="clients">
            <template v-if="users.length">
                <span class="clients-client">{{ users }}</span>
            </template>
            <template v-else>
                Ищу чуваков ...
            </template>
        </div>
        <div class="chat" ref="chat" @scroll="unshiftMessage">
            <p class="chat-message" v-for="message in messages" :key="message.id">
                <small @click="insertName(message.name)">{{ message.name }}</small>
                <span class="chat-date">({{ message['created_at'] }})</span>
                <br>
                <chat-message
                        :message="message.message"
                        :name="user.first_name"
                ></chat-message>
            </p>
        </div>

        <form class="chat-form" @submit.prevent="addMessage">
            <input ref="message" type="text" v-model="msg" placeholder="Сообщение">
            <button type="submit">Отправить</button>
        </form>

    </div>
</template>

<script>
  import Auth from '../auth';
  import { get, post } from '../api';
  import ChatMessage from '../Chat/ChatMessage';

  export default {
    data () {
      return {
        user: Auth.$data,
        ws: null,
        messages: [],
        clients: [],
        msg: '',
        last_msg_id: 0,
        sHeight: 0,
        request: true,
        stop: false,
        down: false,
        timer: null
      };
    },
    created () {
      this.ws = this.socket();
    },
    mounted () {
      this.scrollDown();
    },
    updated () {
      this.$nextTick(() => {
        if (this.stop) {
          this.stop = false;
          return this.scrollStop();
        }

        if (this.down) {
          this.down = false;
          return this.scrollDown();
        }
      });
    },
    computed: {
      users () {
        return this.clients.map(n => n.first_name).join(', ');
      }
    },
    methods: {
      unshiftMessage (e) {
        if (e.target.scrollTop === 0 && this.request) {
          this.request = false;
          get(`chat/add/${this.last_msg_id}`).then(({data}) => {
            if (data.length === 21) {
              this.request = true;
              data.splice(-1, 1);
            }
            this.last_msg_id = data[data.length - 1].id;

            data.forEach((val) => {
              this.messages.unshift(val);
            });

            this.stop = true;
          });
        }
      },
      addMessage () {
        if (this.msg.length && this.request) {
          this.timer = null;
          this.request = false;
          post('/chat/store', {message: this.msg, name: this.user.first_name}).then(() => {
            this.request = true;
            this.msg = '';
          });
        }
      },
      scrollDown () {
        this.sHeight = this.$refs.chat.scrollHeight;
        this.$refs.chat.scrollTop = this.$refs.chat.scrollHeight;
      },
      scrollStop () {
        this.$refs.chat.scrollTop = this.$refs.chat.scrollHeight - this.sHeight;
        this.sHeight = this.$refs.chat.scrollHeight;
      },
      insertName (name) {
        const input = this.$refs.message;
        const value = `{{${name}}}, `;
        if (input.selectionStart || input.selectionStart === 0) {
          const startPos = input.selectionStart;
          const endPos = input.selectionEnd;
          const scrollTop = input.scrollTop;
          this.msg = this.msg.substring(0, startPos) + value + this.msg.substring(endPos, this.msg.length);
          input.focus();
          const embed = startPos + value.length;
          input.selectionStart = embed;
          input.selectionEnd = embed;
          input.scrollTop = scrollTop;
        } else {
          this.msg += value;
          input.focus();
        }
      },
      socket () {
        const ws = new WebSocket(`ws://${document.domain}/ws/chat`);
        ws.onopen = this.pingPong;
        ws.onmessage = this.socketHandler;
        ws.onclose = () => console.info('WS close');
        ws.error = () => console.error('WS error');
        return ws;
      },
      pingPong () {
        this.timer = setTimeout(() => {
          this.ws.send('{"type": "ping"}');
          this.pingPong();
        }, 40000);
      },
      socketHandler (e) {
        try {
          const data = JSON.parse(e.data);
          if (!('type' in data)) {
            return;
          }
          switch (data['type']) {
            case 'init':
              post(`/chat/init/${data['data']['client_id']}`, null).then(({data}) => {
                this.clients = data.users;
                if (data['chat'].length) {
                  this.last_msg_id = data['chat'][data['chat'].length - 1].id;

                  data['chat'].reverse().forEach((el) => {
                    this.messages.push(el);
                  });

                  this.down = true;
                }
              });
              break;
            case 'join' :
              this.clients.push({id: data['data']['id'], first_name: data['data']['first_name']});
              break;
            case 'leave' :
              this.clients = this.clients.filter((n) => n.id !== data['data']['id']);
              break;
            case 'message':
              break;
          }

        } catch (e) {}
      }
    },
    components: {
      ChatMessage
    },
    beforeRouteLeave (to, from, next) {
      clearTimeout(this.timer);
      this.ws.close();
      next();
    }
  };
</script>

<style lang="scss">
    .chat {
        height: 300px;
        overflow-y: scroll;
        margin-bottom: 2rem;
        background-color: #fbfbfb;
        padding: .5rem;
        border: 1px dashed #ccc;

        &-message {
            padding: 3px;
            background-color: #eee;
            box-shadow: rgba(0, 0, 0, 0.09) 0 2px 0;

            small {
                font-weight: 700;
                cursor: pointer;
            }
        }

        &-date {
            font-weight: 700;
            font-size: .7em;
            color: #777
        }

        &-number {
            display: inline-block;
            margin-right: 5px;
            border: 1px dashed;
            padding: 0 5px;
        }
    }

    .chat-form {
        input {
            width: 35rem;
            padding: 2px;
        }
    }

    .clients {
        margin-bottom: 10px;

        &-client {
            display: inline-block;
            margin-right: 10px;
        }
    }
</style>