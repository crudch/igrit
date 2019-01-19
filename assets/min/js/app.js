import Vue from 'vue';
import App from './App.vue';

Vue.config.productionTip = false;

import router from './router';

import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';
UIkit.use(Icons);

new Vue({
  router,
  render: h => h(App)
}).$mount('#app');
