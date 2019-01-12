<template>
    <div class="container mt-5">
        <my-header>
            <h1 class="text-center">SLOT</h1>
            <h2 slot="subtitle">Sub Title</h2>
        </my-header>
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
  import myHeader from './Header';
  import DetailsView from './Details';
  import ProductList from './ProductList';

  export default {
    components: {
      myHeader,
      ProductList,
      DetailsView
    },
  };
</script>