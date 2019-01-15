<template>
    <div class="container">
        <nav class="navbar navbar-expand navbar-dark bg-dark mb-2">
            <router-link class="navbar-brand" :to="{name : 'home'}">Вся куча</router-link>

            <div class="collapse navbar-collapse">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name : 'create'}">Добавить</router-link>
                    </li>
                </ul>

            </div>
        </nav>

        <router-view></router-view>

    </div>
</template>

<script>

  import { interceptors } from './api';

  export default {
    created () {
      interceptors((err) => {
        if (err.response.status === 401) {

        }

        if (err.response.status === 500) {

        }

        if (err.response.status === 404) {
            console.log(err.response.data.message);
        }
      });
    }
  };
</script>