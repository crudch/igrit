<template>
    <div>
        <h1>Чат</h1>

        <div class="chat" ref="chat">
            <p class="chat-message" v-for="(message, index) in messages" :key="index">
                <small>{{ message.user }}</small>
                <br>
                <span>{{ message.text }}</span>
            </p>
        </div>

        <form class="chat-form" @submit.prevent="addMessage">
            <input type="text" v-model="msg" placeholder="Сообщение">
            <button type="submit">Отправить</button>
        </form>

    </div>
</template>

<script>
    import Auth from '../auth';
  export default {
    data () {
      return {
        msg: '',
        user: Auth.$data
      };
    },
    computed: {
      messages () {
        return this.$store.getters.messages;
      }
    },
    methods: {
      addMessage () {
        this.$store.dispatch('addMessage', {name: this.user.first_name , message: this.msg}).then(() => {
          this.msg = '';
          setTimeout(() => {
            this.$refs.chat.scrollTop = this.$refs.chat.scrollHeight;
          }, 0);
        });
      }
    }
  };
</script>

<style lang="scss">
    .chat {
        height: 200px;
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
            }
        }
    }

    .chat-form {
        input {
            width: 35rem;
            padding: 2px;
        }
    }
</style>