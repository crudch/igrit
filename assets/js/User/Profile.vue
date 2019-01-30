<template>
    <form class="pure-form pure-form-aligned" @submit.prevent="save">
        <fieldset>
            <legend>Профиль</legend>

            <div class="pure-control-group">
                <label for="first_name">Имя</label>
                <input id="first_name" type="text" placeholder="Имя" v-model="user.first_name" autocomplete="off">
            </div>

            <div class="pure-control-group">
                <label for="email">Email</label>
                <input id="email" type="email" placeholder="email" v-model="user.email" autocomplete="off">
            </div>

            <button type="submit" class="pure-button pure-button-primary">Сохранить</button>
        </fieldset>
    </form>
</template>

<script>
  import { get } from '../api';

  export default {
    data () {
      return {
        user: {}
      };
    },
    created () {
      get('/profile').
        then(({data}) => {
          this.user = data;
        }).
        catch((err) => console.log(err));
    },
    methods: {
      save () {
        console.log(this.user);
      }
    }
  };
</script>

<style lang="scss">
    .pure-form-aligned .pure-control-group label {
        cursor: pointer;

        &::after {
            content: ':';
        }
    }

    .pure-form input[type] {
        border: 1px dashed transparent;
        cursor: pointer;
        font-weight: 700;

        &:focus {
            border-color: #777;
            cursor: text;
        }
    }
</style>