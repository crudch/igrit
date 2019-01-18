<template>
    <div class="car">
        <h2>{{ car.title }}</h2>
        <h3>{{ car.year }}</h3>
        <div>
            <button @click="addCount">Counter</button>
        </div>
    </div>
</template>

<script>
  import { EventEmitter } from './app.js';

  export default {
    props: ['car'],
    methods: {
      addCount () {
        EventEmitter.$emit('addCount', 25);
      }
    }
  };
</script>


<style lang="scss">
    .car {

    }
</style>
