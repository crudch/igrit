import Vue from 'vue';
import App from './App.vue';
import router from './routing';
import Auth from './auth';

Auth.init();

new Vue({
  el: '#app',
  render: h => h(App),
  router
});