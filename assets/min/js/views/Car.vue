<template>
    <main>
        <article>

            <h1><a href="">{{id}}</a></h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <a @click.prevent="back">Назад</a>
        </article>
    </main>
</template>

<script>
  export default {
    data () {
      return {
        id: this.$route.params['id']
      };
    },
    methods: {
      back () {
        this.$router.back();
      }
    },
    watch: {
      $route (toRoute, fromRoute) {
        this.id = toRoute.params['id'];
      }
    }
  };
</script>
