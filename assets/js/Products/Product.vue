<template>
    <div class="product">
        <h2 class="product-title">{{ product.title }}</h2>
        <div class="product-author">Автор: <span>{{ product['author'] }}</span></div>
        <div class="product-description">{{ shortDesc }}</div>
        <div class="product-aside">
            <div class="product-aside--quantity">На складе: {{ product['quantity'] }} шт.</div>
            <div class="product-aside--price">{{ product['price'] }} ₽</div>
        </div>
        <button class="pure-button button-success" type="button" @click="pay" :disabled="buttonActive">Купить</button>
    </div>
</template>

<script>
  import { short } from '../api';

  export default {
    props: {
      product: {type: Object, required: true}
    },
    data () {
      return {
        button: false
      };
    },
    computed: {
      shortDesc () {
        return short(this.product.description, 150);
      },
      buttonActive () {
        return this.button || !this.product.quantity;
      }
    },
    methods: {
      pay () {
        this.button = true;
        this.$store.dispatch('pay', {id: this.product.id, price: this.product.price}).then(() => {
          this.button = false;
          this.product.quantity -= 1;
        });
      }
    }
  };
</script>

<style lang="scss">
    .product {
        margin: 1rem 0;
        padding: .5rem 1rem 1rem 1rem;
        background-color: #eee;
        box-shadow: rgba(0, 0, 0, 0.09) 0 2px 0;

        &-author {
            span {
                font-style: italic;
                color: brown;
            }
        }

        &-title {
            font-size: 1.5rem;
            margin-top: 0;
            margin-bottom: 10px;
        }

        &-description {
            border: 1px dashed #a7a6fd;
            padding: 5px;
            margin-bottom: 1rem;
        }

        &-aside {
            display: flex;
            justify-content: space-between;

            &--quantity {
                font-size: 0.8rem;
                font-weight: 700;
                color: #777;
            }

            &--price {
                font-size: 2rem;
            }
        }
    }
</style>