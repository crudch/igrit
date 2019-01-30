import Vue from 'vue';

export default new Vue({
  data: {
    id: null,
    first_name: null,
    token: null
  },

  created () {
    this.init();
  },

  methods: {
    init () {
      const data = JSON.parse(localStorage.getItem('user'));
      null !== data && this.setData(data);
    },

    set (key, value = null) {
      const data = typeof key === 'object' ? key : {[key]: value};
      this.setData(data);
      localStorage.setItem('user', JSON.stringify(this.$data));
    },

    clear () {
      for (let key in this.$data) {
        if (this.$data.hasOwnProperty(key)) {
          this[key] = null;
        }
      }

      localStorage.removeItem('user');
    },

    setData (obj) {
      for (let key in obj) {
        if (obj.hasOwnProperty(key)) {
          this[key] = obj[key];
        }
      }
    }
  },

  computed: {
    isUser () {
      return null !== this.id;
    },

    isGuest () {
      return !this.isUser;
    }
  }
});
