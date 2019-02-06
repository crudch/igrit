<template>
    <div>
        <h1 class="title">Товары</h1>

        <div class="products">
            <product
                    v-for="product in products"
                    :key="product.id"
                    :product="product"
            ></product>
        </div>

    </div>
</template>

<script>
  import { get } from '../api';
  import Product from './Product';

  export default {
    data () {
      return {
        products: []
      };
    },
    components: {
      Product
    },
    created () {
      get('/products').then(({data}) => {
        this.products = data;
      });
    }
  };
</script>

<style lang="scss">
    .products {

    }
</style>