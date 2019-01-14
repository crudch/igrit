<template>
    <div class="card" v-fuck>
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
    },
    directives: {
      'fuck': {
        bind (el, binding, vnode) {
          setTimeout(() => el.style.boxShadow = '5px 7px 5px rgba(0,0,0,0.3)', 1000);
        }
      }
    }
  };
</script>