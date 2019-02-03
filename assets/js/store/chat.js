import { get, post } from '../api';

export default {
  state: {
    messages: [],
    timer: null,
    id: 0,
    last_id: 0,
    request: true,
    subscribe: true,
    sub_add: true
  },
  getters: {
    messages: state => state.messages,
    id: state => state.id,
    last_id: state => state.last_id,
    request: state => state.request,
    subscribe: state => state.subscribe,
    sub_add: state => state.sub_add
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
        state.subscribe = !state.subscribe;
      }

      state.timer = setTimeout(() => {
        this.dispatch('show');
      }, 10000);
    },
    ADD (state, payload) {
      state.request = false;

      if (payload.length === 21) {
        state.request = true;
        payload.splice(-1, 1);
      }

      state.last_id = payload[payload.length - 1].id;
      payload.forEach((val) => {
        state.messages.unshift(val);
      });
      state.sub_add = !state.sub_add;
    },
    CLEAR_TIMER (state) {
      clearTimeout(state.timer);
    },
    SCROLL ({subscribe}) {
      subscribe = !subscribe;
    }
  },
  actions: {
    show ({commit, getters}) {
      get(`chat/all/${getters.id}`).then(({data}) => {
        commit('SHOW', data);
      });
    },
    add ({commit, getters}) {
      if (true === getters.request) {
        get(`chat/add/${getters.last_id}`).then(({data}) => {
          commit('ADD', data);
        });
      }
    },
    addMessage ({commit, getters}, payload) {
      post('/chat/store', payload).then(() => {
        this.dispatch('show');
      });
    }
  }
};
