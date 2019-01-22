import Vue from 'vue';
import Router from 'vue-router';
import Car from './views/Car';
import Home from './views/Home';
import Cars from './views/Cars';

Vue.use(Router);

// Lazy loading (fail)
/*const Car = resolve => {
  require.ensure(['./views/Car'], () => {
    resolve(require('./views/Car'));
  });
};*/

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
