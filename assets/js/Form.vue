<template>
    <form>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Заголовок" v-model="product.title">
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="Тект" rows="3" v-model="product.body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="process(mode)">{{mode}}</button>
    </form>
</template>

<script>
  import { get, post } from './api';

  export default {
    props: ['mode'],
    data () {
      return {
        product: {}
      };
    },
    created () {
      this.fetchData();
    },
    watch: {
      '$route': 'fetchData'
    },
    methods: {
      fetchData () {
        if (this.mode === 'update') {
          return get(`/products/${this.$route.params['id']}`).
            then((res) => this.product = res.data).
            catch((err) => console.log(err));
        }

        return this.product = {title: '', body: ''};
      },
      add (callback) {
        post(`/products`, {title: this.product.title, body: this.product.body}).
          then((res) => {callback()}).
          catch((err) => {});
      },
      update (callback) {
        post(`/products/${this.product.id}/edit`,
          {id: this.product.id, title: this.product.title, body: this.product.body}).
          then((res) => {callback()}).
          catch((err) => {});
      },
      process (callback) {
        if (this.product.title !== '' && this.product.body !== '') {
          this[callback](() => this.$router.replace({name: 'home'}));
        }
      }
    }
  };
</script>