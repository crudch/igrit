<template>
    <div>
        <product v-for="(product) in products"
                :key="product.id" :index="product.id" :product="product"></product>
    </div>
</template>

<script>
  import Product from './Product';
  import ProductService from './ProductService';

  export default {
    components: {Product},
    data () {
      return {
        products: []
      };
    },
    created () {
      this.products = ProductService.products;
    }
  };
</script>