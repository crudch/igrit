<template>
    <form class="pure-form pure-form-stacked" @submit.prevent="registration">
        <fieldset>
            <legend>Регистрация</legend>

            <div class="form-block">
                <input type="email" class="pure-input-1-2 form-input"
                        placeholder="Ваш email" v-model="email">
            </div>

            <div class="form-block">
                <input type="text" class="pure-input-1-2 form-input"
                        placeholder="Ваш пароль" v-model="password">
            </div>

            <button type="submit" class="button-success pure-button">Зарегистрироваться</button>
        </fieldset>
    </form>
</template>

<script>
  import Auth from '../auth';

  export default {
    data () {
      return {
        email: '',
        password: ''
      };
    },
    methods: {
      registration () {

      }
    }
  };
</script>

<style>

</style>