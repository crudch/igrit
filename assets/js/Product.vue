<template>
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title"># {{index}} {{product.title}}</h5>
            <p class="card-text">{{product.body}}</p>
            <a href="#" class="card-link" @click.prevent="show">Детали</a>
        </div>
    </div>
</template>

<script>
  import ProductService from './ProductService';

  export default {
    props: ['product', 'index'],
    methods: {
      show () {
        //this.$emit('show', this.product.id);
        ProductService.show(this.product.id);
      }
    }
  };
</script>