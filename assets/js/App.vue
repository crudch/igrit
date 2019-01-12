<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <product-list @show="show"></product-list>
            </div>
            <div class="col-sm">
                <details-view :product="select"></details-view>
            </div>
        </div>
    </div>
</template>

<script>
  import ProductList from './ProductList';
  import DetailsView from './Details';

  export default {
    data () {
      return {
        select: {}
      };
    },
    components: {
      ProductList,
      DetailsView
    },
    methods: {
      show (product) {
        this.select = product;
      }
    }
  };
</script>