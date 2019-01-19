<template>
    <div>
        <div class="uk-section uk-section-default uk-text-center">
            <div class="uk-container">

                <h1>Машинки</h1>

                <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                    <div v-for="car in cars" :key="car.id">
                        <router-link :to="{name: 'car', params: { id: car.id }}" class="uk-card uk-card-default uk-card-hover uk-card-body">
                            <div class="uk-card-badge uk-label">Badge</div>
                            <h3 class="uk-card-title">{{ car.title }}</h3>
                            <p>{{ car.text }}</p>
                        </router-link>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        cars : [
          {id:1, title: 'Ford', text: 'Ford is best'},
          {id:2, title: 'Audi', text: 'Audi fucking machine'},
          {id:3, title: 'BMW', text: 'BMW will kill you'},
        ],
      }
    }
  };
</script>
