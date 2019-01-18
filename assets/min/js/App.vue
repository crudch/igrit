<template>
    <div class="uk-container uk-margin-medium-top">
        <div class="uk-flex">

            <article class="uk-article">
                <h1 class="uk-article-title">Vue test</h1>
                <div class="uk-margin">
                    <form class="uk-search uk-search-default">
                        <span uk-search-icon></span>
                        <input class="uk-search-input" type="search" placeholder="Search..." v-model="search">
                    </form>
                </div>
            </article>

            <div class="uk-margin-left">
                <ul class="uk-list">
                    <li v-for="car in searchCar">{{ car }}</li>
                </ul>
            </div>

            <div class="uk-margin-left">
                <switcher v-model="swi" @input="fuck"></switcher>
                <div class="uk-text-center">
                    <p class="uk-text-lead">
                        <span v-if="swi">Включено</span>
                        <span v-else>Выключено</span>
                    </p>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

  import Switcher from './Switcher';
  import UIkit from 'uikit';

  export default {
    data () {
      return {
        cars: ['Ford', 'Mazda', 'Audi', 'BMW', 'Ferrari', 'Chevrolet', 'Citroen', 'Skoda'],
        search: '',
        swi: false
      };
    },
    created () {},
    components: {
      Switcher
    },
    computed: {
      searchCar () {
        return this.cars.filter(n => !!~n.toLowerCase().indexOf(this.search.toLowerCase()));
      }
    },
    methods: {
      fuck(value, con){
        UIkit.notification({
          message: con,
          status: con,
          pos: 'bottom-right',
          timeout: 3000
        });
      }
    }
  };
</script>
