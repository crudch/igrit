<template>
    <div>
        <h1>Профиль</h1>
    </div>
</template>

<script>
  import { get } from '../api';

  export default {
    data () {
      return {
        user: {}
      };
    },
    created () {
      get('/profile').
        then(({data}) => {
          this.user = data;
        }).
        catch((err) => console.log(err));
    }
  };
</script>