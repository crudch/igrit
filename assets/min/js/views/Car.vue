<template>
    <div>
        <article class="uk-article">

            <h1 class="uk-article-title"><a class="uk-link-reset" href="">{{id}}</a></h1>

            <p class="uk-article-meta">Written by <a href="#">Super User</a> on 12 April 2012. Posted in
                <a href="#">Blog</a></p>

            <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="uk-grid-small uk-child-width-auto uk-margin-bottom" uk-grid>
                <div>
                    <a class="uk-button uk-button-text" href="#">Read more</a>
                </div>
                <div>
                    <a class="uk-button uk-button-text" href="#">5 Comments</a>
                </div>
            </div>

            <div class="uk-margin-bottom">
                <button class="uk-button uk-button-link" type="button" @click="back">Назад</button>
            </div>

        </article>
    </div>
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
