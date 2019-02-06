export default {
  state: {
    products: []
  },
  getters: {
    products: state => state.products,
    price: state => {
      return state.products.reduce((acc, product) => {
        return product['price'] * product['quantity'] + acc;
      }, 0);
    },
    count: state => {
      return state.products.reduce((acc, product) => {
        return product['quantity'] + acc;
      }, 0);
    }
  },
  mutations: {
    INIT (state, products) {
      state.products = products;
    },
    ADD (state, product) {
      for (let i = 0; i < state.products.length; i++) {
        if (product.id === state.products[i].id) {
          state.products[i].quantity += 1;
          return;
        }
      }

      state.products.push({id: product.id, price: product.price, quantity: 1});
    },
    CLEAR (state) {
      state.products = [];
    }
  },
  actions: {
    init ({commit}) {
      commit('INIT', JSON.parse(localStorage.getItem('cart') || '[]'));
    },

    pay ({commit, getters}, product) {
      return new Promise((resolve) => {
        setTimeout(() => {
          commit('ADD', product);
          localStorage.setItem('cart', JSON.stringify(getters.products));
          resolve();
        }, 0);
      });
    },
    clear ({commit}) {
      return new Promise((resolve) => {
        setTimeout(() => {
          commit('CLEAR');
          localStorage.removeItem('cart');
          resolve();
        }, 0);
      });
    }
  }
};