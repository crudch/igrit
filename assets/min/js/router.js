import Vue from 'vue';
import Router from 'vue-router';

import Home from './views/Home';
import Car from './views/Car';

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    {path: '/min', name: 'home', component: Home},
    {path: '/min/cars', name: 'cars', component: Car}
  ]
});
