<template>
    <div class="card" v-fuck>
        <div class="card-header">
            {{ product.title | toUppercase }}
        </div>
        <div class="card-body">
            <p>{{ toLowerCaseBody}}</p>
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
    computed: {
      toLowerCaseBody () {
        if (this.product.body !== undefined) {
          return this.product.body.toLowerCase();
        }
      }
    },
    directives: {
      'fuck': {
        bind (el, binding, vnode) {
          setTimeout(() => el.style.boxShadow = '5px 7px 5px rgba(0,0,0,0.3)', 1000);
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