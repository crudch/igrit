export default {
  user: {},
  init () {
    this.user = JSON.parse(localStorage.getItem('user')) || {};
  },
  set (user) {
    localStorage.setItem('user', JSON.stringify(user));
    this.user = user;
  },
  remove () {
    localStorage.removeItem('user');
    this.user = null;
  },
  isUser () {
    return !!this.user.id;
  },
  isGuest () {
    return !this.isUser();
  }
};
