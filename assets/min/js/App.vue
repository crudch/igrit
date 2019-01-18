<template>
    <div class="container">
        <h1>Vue test</h1>
        <my-car :car="car"></my-car>
        <counter></counter>
    </div>
</template>

<script>
  import myCar from './Car';
  import Counter from './Counter';

  export default {
    data () {
      return {
        car: {
          title: 'Ford',
          year: 2015
        }
      };
    },
    components: {
      myCar,
      Counter
    }
  };
</script>

<style lang="scss">
    .container {
        position: relative;
        width: 640px;
        margin: 20px auto;
        padding: 20px;
        border: 1px dashed brown;
    }
    h1 {
        margin: 0;
    }
</style>
