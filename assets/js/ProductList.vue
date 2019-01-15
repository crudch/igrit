<template>
    <div>
        <product v-for="(product) in products"
                :key="product.id" :index="product.id" :product="product"></product>
    </div>
</template>

<script>
  import Product from './Product';
  import { get } from './api';

  export default {
    components: {Product},
    data () {
      return {
        products: []
      };
    },
    created () {
      get(`/products`).
        then((res) => this.products = res.data).
        catch((err) => console.log(err));
    }
  };
</script>