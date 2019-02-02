export default {
  state: {
    messages: [{user: 'Оператор #1', text: 'Чем я могу вам помочь?'}]
  },
  getters: {
    messages: state => state.messages
  },
  mutations: {
    ADD_MESSAGE (state, payload) {
      state.messages.push(payload);
    }
  },
  actions: {
    addMessage ({commit, getters}, payload) {
      commit('ADD_MESSAGE', {
        user: payload.name,
        text: payload.message
      });
    }
  }
};
