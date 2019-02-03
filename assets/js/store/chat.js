import { get, post } from '../api';

export default {
  state: {
    messages: [],
    timer: null,
    id: 0,
    last_id: 0
  },
  getters: {
    messages: state => state.messages,
    id: state => state.id,
    last_id: state => state.last_id
  },
  mutations: {
    SHOW (state, payload) {
      clearTimeout(state.timer);
      if (payload.length) {
        state.id = payload[0].id;
        if (state.last_id === 0) {
          state.last_id = payload[payload.length - 1].id;
        }
        payload.reverse().forEach((val) => {
          state.messages.push(val);
        });
      }

      state.timer = setTimeout(() => {
        this.dispatch('show');
      }, 5000);
    },

    ADD (state, payload) {
      if (payload.length) {
        state.last_id = payload[payload.length - 1].id;
        payload.reverse().forEach((val) => {
          state.messages.unshift(val);
        });
      }
    },
    CLEAR_TIMER (state) {
      clearTimeout(state.timer);
    }
  },
  actions: {
    show ({commit, getters}) {
      get(`chat/all/${getters.id}`).then(({data}) => {
        commit('SHOW', data);
      });
    },
    add ({commit, getters}) {
      get(`chat/add/${getters.last_id}`).then(({data}) => {
        commit('ADD', data);
      });
    },
    addMessage ({commit, getters}, payload) {
      post('/chat/store', payload).then(() => {
        this.dispatch('show');
      });
    }
  }
};
