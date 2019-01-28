import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './Home';

import Login from './Auth/Login';
import Registration from './Auth/Registration';

import Articles from './Articles/Articles';
import Article from './Articles/Article';
import ArticleForm from './Articles/ArticleForm';

import Auth from './auth';

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  scrollBehavior () {
    return {x: 0, y: 0};
  },
  linkActiveClass: 'active',
  routes: [
    {path: '/', name: 'home', component: Home},
    {
      path: '/login',
      name: 'login',
      component: Login,
      beforeEnter: (to, from, next) => {next(Auth.isGuest() || '/');}
    },
    {
      path: '/registration',
      name: 'registration',
      component: Registration,
      beforeEnter: (to, from, next) => {next(Auth.isGuest() || '/');}
    },
    {path: '/articles', name: 'articles', component: Articles},
    {
      path: '/articles/:id(\\d+)', name: 'article.show', component: Article, props: true,
      beforeEnter: (to, from, next) => {next(Auth.isUser() || '/login');}
    },
    {path: '/articles/create', name: 'article.create', component: ArticleForm, props: {mode: 'create'}},
    {path: '/articles/:id(\\d+)/edit', name: 'article.edit', component: ArticleForm, props: {mode: 'edit'}}
  ]
});