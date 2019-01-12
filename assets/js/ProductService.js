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
        title: 'Третий продукт',
        body: 'Описание четвертого продукта'
      }
    ]
  },
  methods: {
    show(id) {
      const product = this.products.find(n => n.id === +id);
      this.$emit('show', product);
    }
  }
});