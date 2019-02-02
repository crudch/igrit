export default {
  state: {
    user: null
  },
  getters: {
    user: state => state.user
  },
  mutations: {
    SET_USER (state, payload) {
      state.user = state.user || {};

      for (let key in payload) {
        if (payload.hasOwnProperty(key)) {
          state.user[key] = payload[key];
        }
      }
    }
  },
  actions: {
    setUser ({commit}, payload) {
      commit('SET_USER', payload);
      localStorage.setItem('user', JSON.stringify(this.getters.user));
    },

    logout ({commit}) {
      commit('SET_USER', null);
      localStorage.removeItem('user');
    },

    init ({commit}, payload) {
      const data = JSON.parse(localStorage.getItem(payload));
      null !== data && commit('SET_USER', data);
    }
  }
};
