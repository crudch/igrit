import Vue from 'vue';
import { get } from './api';

export default new Vue({
  data: {
    user: null,
    token: null
  },

  created () {
    this.init();
  },

  methods: {
    init () {
      const token = localStorage.getItem('token');

      if (null !== token) {

      }
    },

    set (key, value = null) {
      const o = typeof key === 'object' ? key : {[key]: value};

      Object.keys(o).forEach((key) => {
        this[key] = o[key];
      }, o);

      localStorage.setItem('user', JSON.stringify(this.$data));
    },

    clear () {
      for (let key in this.$data) {
        if (this.$data.hasOwnProperty(key)) {
          this[key] = null;
        }
      }

      localStorage.removeItem('token');
    }
  },

  computed: {
    isUser () {
      return null !== this.user;
    },

    isGuest () {
      return !this.isUser;
    }
  }
});
