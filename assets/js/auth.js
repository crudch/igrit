import Vue from 'vue';

export default new Vue({
  data: {
    id: null,
    token: null,
    first_name: null
  },

  methods: {
    init () {
      const data = JSON.parse(localStorage.getItem('user'));

      if (null === data) {
        return this.id = this.token = this.first_name = null;
      }

      this.id = data.id;
      this.token = data.token;
      this.first_name = data.first_name;
    },

    set (user) {
      localStorage.setItem('user', JSON.stringify(user));
      this.init();
    },

    remove () {
      localStorage.removeItem('user');
      this.init();
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
