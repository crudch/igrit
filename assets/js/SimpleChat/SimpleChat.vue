<template>
    <div>
        <h1 class="title">Просто чат</h1>

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
        messages: [],
        msg: '',
        msg_id: 0,
        last_msg_id: 0,
        sHeight: 0,
        timer: null,
        request: true,
        stop: false,
        down: false
      };
    },
    created () {
      this.fetch();
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
    computed: {},
    methods: {
      fetch () {
        get(`chat/all/${this.msg_id}`).then(({data}) => {
          if (data.length) {
            this.msg_id = data[0].id;

            if (this.last_msg_id === 0) {
              this.last_msg_id = data[data.length - 1].id;
            }

            data.reverse().forEach((el) => {
              this.messages.push(el);
            });

            this.down = true;
          }

          this.timer = setTimeout(() => {
            this.fetch();
          }, 10000);
        });
      },
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
            this.fetch();
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
      }
    },
    components: {
      ChatMessage
    },
    beforeRouteLeave (to, from, next) {
      clearTimeout(this.timer);
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
</style>