import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App.vue';

Vue.config.productionTip = false;
Vue.use(VueRouter);

import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

UIkit.use(Icons);

export const EventEmitter = new Vue();

new Vue({
  render: h => h(App)
}).$mount('#app');
