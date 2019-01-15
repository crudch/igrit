<template>
    <div class="card">
        <div class="card-header">
            <h1>{{ product.title }}</h1>
        </div>
        <div class="card-body">
            <p>{{ product.body }}</p>
        </div>
        <div class="card-footer text-muted text-right">
            <router-link class="btn btn-outline-primary" :to="{name : 'update'}">Редактировать</router-link>
            <button class="btn btn-outline-danger" @click.prevent="deleteData">Удалить</button>
        </div>
    </div>
</template>

<script>
  import { get, post } from './api';

  export default {
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
        get(`/products/${this.$route.params['id']}`).
          then((res) => this.product = res.data).
          catch((err) => console.log(err));
      },
      deleteData () {
        post(`/products/${this.product.id}/delete`, {id: this.product.id}).
          then((res) => {
            this.$router.replace({name: 'home'});
          }).
          catch((err) => {});
      }
    }
  };
</script>