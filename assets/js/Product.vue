<template>
    <div class="card mb-2">

        <router-link class="card-body crutch-link" :to="{name : 'show', params: {id: product.id}}">
            <h5 class="card-title"># {{index}} {{product.title}}</h5>
            <p class="card-text">{{product.body}}</p>
        </router-link>

    </div>
</template>

<script>
  export default {
    props: ['product', 'index']
  };
</script>