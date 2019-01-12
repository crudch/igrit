<template>
    <form>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Title" v-model="title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Body" v-model="body">
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="add">Добавить</button>
    </form>
</template>

<script>
  import ProductService from './ProductService';

  export default {
    data () {
      return {
        title: '',
        body: ''
      };
    },
    methods: {
      add () {
        if (this.title !== '' && this.body !== '') {
          ProductService.add(this.title, this.body);
          this.title = this.body = '';
        }
      }
    }
  };
</script>