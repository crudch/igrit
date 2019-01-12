<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <product-list></product-list>
            </div>
            <div class="col-sm">
                <details-view></details-view>
            </div>
        </div>
    </div>
</template>

<script>
  import ProductList from './ProductList';
  import DetailsView from './Details';

  export default {
    components: {
      ProductList,
      DetailsView
    },
  };
</script>