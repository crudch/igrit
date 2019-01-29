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

                <ul class="pure-menu-list" v-if="isUser">
                    <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a class="pure-menu-link">{{ user['first_name'] }}</a>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item">
                                <a href="#" class="pure-menu-link" @click.prevent="logout">Выход</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="pure-menu-list" v-else>
                    <li class="pure-menu-item">
                        <router-link :to="{name: 'registration'}" class="pure-menu-link">Регистрация</router-link>
                    </li>
                    <li class="pure-menu-item">
                        <router-link :to="{name: 'login'}" class="pure-menu-link">Войти</router-link>
                    </li>
                </ul>

            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
  import Auth from './auth';

  export default {
    data () {
      return {
        links: [{title: 'Новости', route: 'articles'}],
        user: Auth.$data
      };
    },
    computed: {
      isUser () {
        return !!this.user.id;
      }
    },
    methods: {
      logout () {
        Auth.remove();
      }
    }
  };
</script>