<template>
    <form>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Title" v-model="product.title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Body" v-model="product.body">
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="process(mode)">{{mode}}</button>
    </form>
</template>

<script>
  import ProductService from './ProductService';

  export default {
    props: ['mode'],
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
        if (this.mode === 'update') {
          return this.product = ProductService.find(this.$route.params['id']);
        }

        return this.product = {title: '', body: ''};
      },
      add () {
        ProductService.add(this.product.title, this.product.body);
      },
      update () {
        ProductService.update(this.$route.params['id'], this.product.title, this.product.body);
      },
      process (callback) {
        if (this.product.title !== '' && this.product.body !== '') {
          this[callback]();
          this.$router.replace({name: 'home'});
        }
      }
    }
  };
</script>