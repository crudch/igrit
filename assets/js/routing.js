import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './Home'
import Articles from './Articles/Articles';
import Article from './Articles/Article';
import ArticleForm from './Articles/ArticleForm';

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  scrollBehavior () {
    return {x: 0, y: 0};
  },
  linkActiveClass: 'active',
  routes: [
    {path: '/', name: 'home', component: Home},
    {path: '/articles', name: 'articles', component: Articles},
    {path: '/articles/:id(\\d+)', name: 'article.show', component: Article},
    {path: '/articles/create', name: 'article.create', component: ArticleForm, props : {mode: 'create'}},
    {path: '/articles/:id(\\d)/edit', name: 'article.edit', component: ArticleForm, props : {mode: 'edit'}}
  ]
});