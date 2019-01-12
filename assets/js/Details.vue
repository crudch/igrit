<template>
    <div class="card">
        <div class="card-header">
            {{ product.title }}
        </div>
        <div class="card-body">
            <p>{{ product.body}}</p>
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
      ProductService.$on('show', (o) => this.product = o);
    }
  };
</script>