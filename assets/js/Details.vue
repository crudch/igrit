<template>
    <div class="card">
        <div class="card-header">
            {{ product.title | toUppercase }}
        </div>
        <div class="card-body">
            <p>{{ toLowerCaseBody}}</p>
        </div>
        <div class="card-footer text-muted text-right">
            <router-link class="btn btn-outline-primary" :to="{name : 'update'}">Редактировать</router-link>
            <button class="btn btn-outline-danger" @click.prevent="deleteData">Удалить</button>
        </div>
    </div>
</template>

<script>
  import ProductService from './ProductService';

  export default {
    data () {
      return {
        product: {}
      };
    },
    created () {
      // загружаем данные, когда представление создано
      // и данные реактивно отслеживаются
      this.fetchData();
    },
    watch: {
      // при изменениях маршрута запрашиваем данные снова
      '$route': 'fetchData'
    },
    methods: {
      fetchData () {
        this.product = ProductService.find(this.$route.params['id']);
      },
      deleteData () {
        ProductService.delete(this.$route.params['id']);
        this.$router.replace({name: 'home'});
      }
    },
    computed: {
      toLowerCaseBody () {
        if (this.product.body !== undefined) {
          return this.product.body.toLowerCase();
        }
      }
    },
    filters: {
      toUppercase (value) {
        return value && value.toUpperCase();
      }
    }
  };
</script>