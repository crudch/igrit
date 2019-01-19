<template>
    <div class="count">
        <h4>{{ count }}</h4>
    </div>
</template>

<script>
  import { EventEmitter } from '../app.js';

  export default {
    data () {
      return {
        count: 0
      };
    },
    created () {
      EventEmitter.$on('addCount', (num) => {
        this.count += num;
      });
    }
  };
</script>


<style lang="scss">
    .car {

    }
</style>
