<template>
    <div class="container">
        <nav class="nav-bar">
            <div class="pure-menu pure-menu-horizontal">
                <router-link :to="{name: 'home'}" exact class="pure-menu-heading pure-menu-link">ИТАР-ТАСС</router-link>
                <ul class="pure-menu-list">

                    <li class="pure-menu-item" v-for="link in links">
                        <router-link :to="{name: link.route}" class="pure-menu-link">{{ link.title }}</router-link>
                    </li>
                </ul>

                <ul class="pure-menu-list" v-if="count">
                    <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <span class="pure-menu-link">Корзина: {{ count }} шт. - {{ price }} ₽</span>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item">
                                <a class="pure-menu-link" @click.prevent="clearCart">Очистить</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="pure-menu-list" v-if="isUser">
                    <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <a class="pure-menu-link link-bold">
                            <img :src="avatar" width="30" height="30" alt="Avatar">
                            {{ user['first_name'] }}
                        </a>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item">
                                <router-link :to="{name: 'profile'}" class="pure-menu-link">Профиль</router-link>
                            </li>
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
  import { mapGetters } from 'vuex';

  export default {
    data () {
      return {
        links: [
          {title: 'Новости', route: 'articles'},
          {title: 'Чат', route: 'simpleChat'},
          {title: 'Товары', route: 'products'}
        ],
        user: Auth.$data
      };
    },
    computed: {
      ...mapGetters(['count', 'price']),
      isUser () {
        return !!this.user.token;
      },
      avatar () {
        return this.user.avatar || '/img/avatar.svg';
      }
    },
    methods: {
      logout () {
        Auth.clear().then(() => this.$router.replace('/'));
      },
      clearCart () {
        this.$store.dispatch('clear').then(() => {});
      }
    },
    created () {
      this.$store.dispatch('init').then(() => {});
    }
  };
</script>