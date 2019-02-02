<template>
    <form class="pure-form pure-form-stacked form" @submit.prevent="registration">
        <fieldset>
            <legend>Регистрация</legend>

            <div class="form-block">
                <input type="email" class="pure-input-1 form-input" :class="{ 'form-error-border': hasErrorEmail }"
                        placeholder="Email" v-model="email">
                <span class="form-error" v-show="hasErrorEmail">
                    {{ errors.email }}
                </span>
            </div>

            <div class="form-block">
                <input type="text" class="pure-input-1 form-input" :class="{ 'form-error-border': hasErrorFirstName }"
                        placeholder="Имя" v-model="first_name">
                <span class="form-error" v-show="hasErrorFirstName">
                    {{ errors.first_name }}
                </span>
            </div>

            <div class="form-block">
                <input type="text" class="pure-input-1 form-input" :class="{ 'form-error-border': hasErrorPassword }"
                        placeholder="Пароль" v-model="password">
                <span class="form-error" v-show="hasErrorPassword">
                    {{ errors.password }}
                </span>
            </div>

            <button type="submit" class="button-success pure-button">Зарегистрироваться</button>
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
        first_name: '',
        errors: {
          email: '',
          password: '',
          first_name: ''
        }
      };
    },
    watch: {
      email () {
        this.errors.email = '';
      },
      password () {
        this.errors.password = '';
      },
      'first_name' () {
        this.errors.first_name = '';
      }
    },
    computed: {
      hasErrorEmail () {
        return !!this.errors.email;
      },

      hasErrorPassword () {
        return !!this.errors.password;
      },

      hasErrorFirstName () {
        return !!this.errors.first_name;
      }
    },
    methods: {
      registration () {
        post('/registration', {email: this.email, password: this.password, first_name: this.first_name}).
          then(({data}) => {
            Auth.set(data).then(() => {
              this.$router.replace({name: 'profile'});
            });
          }).
          catch((err) => {
            if (err.response.status === 422) {
              return this.errors = err.response.data.errors;
            }

            console.log(err);
          });
      }
    }
  };
</script>

<style>

</style>