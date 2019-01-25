import Vue from 'vue';
import App from './App.vue';
import router from './routing';

new Vue({
  el: '#app',
  render: h => h(App),
  router
});