import { get, post } from '../api';

export default {
  state: {
    messages: [],
    timer: null,
    id: 0
  },
  getters: {
    messages: state => state.messages,
    id: state => state.id
  },
  mutations: {
    SHOW (state, payload) {
      clearTimeout(state.timer);
      if (payload.length) {
        state.id = payload[0].id;
        payload.reverse().forEach((val) => {
          state.messages.push(val);
        });
      }

      state.timer = setTimeout(() => {
        this.dispatch('show');
      }, 10000);
    }
  },
  actions: {
    show ({commit, getters}) {
      get(`chat/all/${getters.id}`).then(({data}) => {
        commit('SHOW', data);
      });
    },
    addMessage ({commit, getters}, payload) {
      post('/chat/store', payload).then(() => {
        this.dispatch('show');
      });
    }
  }
};
