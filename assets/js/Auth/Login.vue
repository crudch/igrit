<template>
    <form class="pure-form pure-form-stacked form" @submit.prevent="loginUser">
        <fieldset>
            <legend>Войти</legend>

            <div class="form-block">
                <input type="email" class="pure-input-1 form-input" :class="{ 'form-error-border': hasErrorEmail }"
                        placeholder="Email" v-model="email">
                <span class="form-error" v-show="hasErrorEmail">
                    {{ errors.email }}
                </span>
            </div>

            <div class="form-block">
                <input type="text" class="pure-input-1 form-input" :class="{ 'form-error-border': hasErrorPassword }"
                        placeholder="Пароль" v-model="password">
                <span class="form-error" v-show="hasErrorPassword">
                    {{ errors.password }}
                </span>
            </div>

            <button type="submit" class="button-success pure-button">Войти</button>
        </fieldset>
    </form>
</template>

<script>
  import Auth from '../auth';
  import { post } from '../api';

  export default {
    data () {
      return {
        email: '',
        password: '',
        errors: {
          email: '',
          password: ''
        }
      };
    },
    watch: {
      email () {
        this.errors.email = '';
      },
      password () {
        this.errors.password = '';
      }
    },
    computed: {
      hasErrorEmail () {
        return !!this.errors.email;
      },

      hasErrorPassword () {
        return !!this.errors.password;
      }
    },
    methods: {
      loginUser () {
        post('/login', {email: this.email, password: this.password}).
          then(({data}) => {
            Auth.set(data);
            this.$router.replace('/');
          }).
          catch((err) => {
            console.log(err);
            if (err.response.status === 422) {
              this.errors = err.response.data.errors;
            }
          });
      }
    }
  };
</script>
