<template>
    <div class="jumbotron" v-show="Object.keys(product).length !== 0">
        <h1 class="display-4">{{ product.title }}</h1>
        <p class="lead">{{ product.body}}</p>
    </div>
</template>

<script>
  export default {
    props: ['product']
  };
</script>