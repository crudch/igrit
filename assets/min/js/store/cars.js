import { get } from '../api';

export default {
  state: {
    cars: []
  },
  getters: {
    CARS (state) {
      return state.cars;
    },

    CAR (state, id) {
      return state[id];
    }
  },
  mutations: {
    SET_CARS: (state, payload) => {
      state.cars = payload;
    },

    ADD_CAR: (state, payload) => {
      state.cars.push(payload);
    }
  },
  actions: {
    GET_CARS (context) {
      get('/cars').then((result) => {
        context.commit('SET_CARS', result.data)
      }).catch((err) => {});
    },

    SAVE_CAR(context, payload) {

    }
  }
};