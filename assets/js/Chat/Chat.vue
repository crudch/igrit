<template>
    <div>
        <h1>Чат</h1>

        <div class="chat" ref="chat" @scroll="unshiftMessage">
            <p class="chat-message" v-for="message in messages" :key="message.id">
                <small @click="insertName(message.name)">{{ message.name }}</small>
                <span class="chat-date">({{ message['created_at'] }})</span>
                <br>
                <!--<span v-bold="{u: user.first_name, m: message.message}"></span>-->
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
  import ChatMessage from './ChatMessage';

  export default {
    data () {
      return {
        msg: '',
        user: Auth.$data,
        sHeight: 0,
        refresh: false
      };
    },
    computed: {
      messages () {
        return this.$store.getters.messages;
      },
      subscribe () {
        return this.$store.getters.subscribe;
      },
      subAdd () {
        return this.$store.getters.sub_add;
      }
    },
    watch: {
      subscribe () {
        this.scroll();
      },
      subAdd () {
        this.refresh = true;
      }
    },
    created () {
      this.fetch();
    },
    components: {
      ChatMessage
    },
    directives: {
      'bold': {
        inserted (el, {value}) {
          el.innerHTML = value.m.replace(/{{(.+?)}}/g, (s, el) => {
            return `<b class="chat-bold-${+(value.u === el)}">${el}</b>`;
          });
        }
      }
    },
    methods: {
      addMessage () {
        this.$store.dispatch('addMessage', {name: this.user.first_name, message: this.msg}).then(() => {
          this.msg = '';
        });
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
      fetch () {
        this.$store.dispatch('show').then(() => {});
      },
      scroll () {
        setTimeout(() => {
          this.sHeight = this.$refs.chat.scrollHeight;
          this.$refs.chat.scrollTop = this.$refs.chat.scrollHeight;
        }, 0);
      },
      unshiftMessage (e) {
        if (e.target.scrollTop === 0) {
          this.$store.dispatch('add').then(() => {});
        }
      }
    },
    beforeRouteLeave (to, from, next) {
      this.$store.commit('CLEAR_TIMER');
      next();
    },
    mounted () {
      this.scroll();
    },
    updated () {
      if (this.refresh) {
        this.refresh = false;
        this.$refs.chat.scrollTop = this.$refs.chat.scrollHeight - this.sHeight;
        this.sHeight = this.$refs.chat.scrollHeight;
      }
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