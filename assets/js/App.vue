<template>
    <div class="container">

        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">

                <router-link class="navbar-item" :to="{name: 'home'}">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28" alt="logo">
                </router-link>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu">
                <div class="navbar-start">
                    <router-link class="navbar-item" v-for="link in links" :to="{name: link.route}">
                        {{ link.title }}
                    </router-link>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary">
                                <strong>Регистрация</strong>
                            </a>
                            <a class="button is-light">
                                Вход
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <router-view></router-view>

    </div>
</template>

<script>
  export default {
    data () {
      return {
        links: [
          {title: 'Статьи', route: 'articles'}
        ]
      };
    }
  };
</script>

<style>

</style>