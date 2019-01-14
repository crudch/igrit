import Vue from 'vue';
import VueRouter from 'vue-router';

import Form from './Form';
import Details from './Details';
import ProductList from './ProductList';

Vue.use(VueRouter);

export const router = new VueRouter({
  mode: 'history',
  linkActiveClass: 'active',
  routes: [
    {path: '/', name: 'home', component: ProductList},
    {path: '/:id(\\d+)', name: 'show', component: Details},
    {path: '/create', name: 'create', component: Form, props : {mode: 'add'}},
    {path: '/:id(\\d+)/edit', name: 'update', component: Form, props : {mode: 'update'}}
  ]
});