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
                <div class="text-center mb-3">
                    <button class="btn btn-light" @click="mode = !mode">{{componentName}}</button>
                </div>
                <keep-alive>
                    <component :is="componentName"></component>
                </keep-alive>
            </div>
        </div>
    </div>
</template>

<script>
  import myForm from './Form';
  import myHeader from './Header';
  import DetailsView from './Details';
  import ProductList from './ProductList';

  export default {
    components: {
      myForm,
      myHeader,
      ProductList,
      DetailsView
    },

    data() {
      return {
        mode: 1
      }
    },

    computed: {
      componentName() {
        return this.mode ? 'DetailsView' : 'myForm';
      }
    }
  };
</script>