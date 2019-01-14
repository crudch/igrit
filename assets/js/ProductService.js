import Vue from 'vue';

export default new Vue({
  data: {
    products: [
      {
        id: 1,
        title: 'Первый продукт',
        body: 'Описание первого продукта'
      },
      {
        id: 2,
        title: 'Второй продукт',
        body: 'Описание второго продукта'
      },
      {
        id: 3,
        title: 'Третий продукт',
        body: 'Описание третьего продукта'
      },
      {
        id: 4,
        title: 'Четвертый продукт',
        body: 'Описание четвертого продукта'
      }
    ]
  },
  methods: {
    find (id) {
      return this.products.find(n => n.id === +id);
    },
    add (title, body) {
      const id = this.products.length ? this.products[this.products.length - 1].id + 1 : 1;
      this.products.push({id, title, body});
    },
    update (id, title, body) {
      this.products = this.products.map((i) => {
        if (i.id === id) {
          return {id: id, title: title, body: body};
        }
        return i;
      });
    },
    delete (id) {
      this.products = this.products.filter(o => o.id !== +id);
    }
  }
});