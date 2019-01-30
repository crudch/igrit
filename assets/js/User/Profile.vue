<template>
    <form class="pure-form pure-form-aligned">
        <fieldset>

            <legend>Профиль</legend>

            <div class="pure-control-group">
                <label for="first_name">Имя</label>
                <input id="first_name" type="text" v-model.trim="user.first_name" autocomplete="off" @change="save" pattern="[0-9A-zА-яЁё_ ]{3,}">
            </div>

            <div class="pure-control-group">
                <label for="email">Email</label>
                <input id="email" type="email" v-model="user.email" autocomplete="off" @change="save">
            </div>

        </fieldset>
    </form>
</template>

<script>
  import { get } from '../api';
  import Auth from '../auth';

  export default {
    data () {
      return {
        user: {},
        old: {}
      };
    },
    created () {
      get('/profile').
        then(({data}) => {
          this.user = data;
          this.old = Object.assign({}, data);
        }).
        catch((err) => console.log(err));
    },
    methods: {
      save ({target}) {
        if (!target.value.length || !target.validity.valid) {
          return this.user[target.id] = this.old[target.id];
        }

        this.old[target.id] = this.user[target.id];
        target.id === 'first_name' &&  Auth.set('first_name', this.user[target.id]);

        target.blur();
      }
    }
  };
</script>

<style lang="scss" scoped>
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

        &:hover {
            border-color: lighten(#999, 20%);
        }

        &:focus {
            border-color: #777;
            cursor: text;
        }
    }
</style>