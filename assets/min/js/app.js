import Vue from 'vue';
import App from './App.vue';

Vue.config.productionTip = false;

import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';
UIkit.use(Icons);

export const EventEmitter = new Vue();

new Vue({
  render: h => h(App)
}).$mount('#app');
