import Vue from 'vue';
import Vuex from 'vuex';
import Chat from './chat'
import Cart from './cart'

Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
  modules: {
    Chat, Cart
  }
});
