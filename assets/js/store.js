import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: null,
    messages: [{user: 'Fuck', text: 'Пошел нахуй отсюда петушок ебаный...'}]
  },
  getters: {
    user: state => state.user,
    messages: state => state.messages
  },
  mutations: {
    SET_USER (state, payload) {
      state.user = payload;
    },
    ADD_MESSAGE (state, payload) {
      state.messages.push(payload);
    }
  },
  actions: {
    setUser ({commit}, payload) {
      commit('SET_USER', payload);
    },
    init ({commit}, payload) {
      const data = JSON.parse(localStorage.getItem(payload));
      null !== data && commit('SET_USER', data);
    },
    addMessage ({commit, getters}, payload) {
      commit('ADD_MESSAGE', {
        user: getters.user.first_name,
        text: payload
      });
    }
  }
});
