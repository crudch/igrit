<template>
    <div class="jumbotron" v-show="Object.keys(product).length !== 0">
        <h1 class="display-4">{{ product.title }}</h1>
        <p class="lead">{{ product.body}}</p>
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
      ProductService.$on('show', (o) => this.product = o);
    }
  };
</script>