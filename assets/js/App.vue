<template>
    <div class="container">
        <nav class="nav-bar">
            <div class="pure-menu pure-menu-horizontal">
                <router-link :to="{name: 'home'}" exact class="pure-menu-heading pure-menu-link">ИТАР-ТАСС</router-link>
                <ul class="pure-menu-list">

                    <li class="pure-menu-item" v-for="link in links">
                        <router-link :to="{name: link.route}" class="pure-menu-link">{{ link.title }}</router-link>
                    </li>

                    <li class="pure-menu-item"><a href="#" class="pure-menu-link" @click.prevent="">Финансы</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link" @click.prevent="">Техника</a></li>
                </ul>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
  import Auth from './auth';

  export default {
    created () {
      Auth.init();
    },
    data () {
      return {
        links: [{title: 'Новости', route: 'articles'}],
      };
    },
    computed: {
      user () {
        return Auth.user;
      }
    }
  };
</script>