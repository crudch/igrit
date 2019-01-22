import Vue from 'vue';
import Router from 'vue-router';

import Home from './views/Home';
import Cars from './views/Cars';
import Car from './views/Car';

Vue.use(Router);

export default new Router({
  mode: 'history',
  scrollBehavior (to, from, savedPosition) {
    /*if (savedPosition) {
      return savedPosition;
    }

    if (to.hash) {
      return {selector: to.hash};
    }*/

    return {x: 0, y: 0};
  },
  routes: [
    {path: '/min', name: 'home', component: Home},
    {path: '/min/cars', name: 'cars', component: Cars},
    {path: '/min/cars/:id', name: 'car', component: Car}
  ]
});
