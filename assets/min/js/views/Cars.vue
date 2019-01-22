<template>
    <main>
        <article>
            <h1>Машинки</h1>

            <section v-for="car in cars" :key="car.id">
                <h2>{{ car.title }}</h2>
                <p>{{ car.body }}</p>
                <router-link :to="{name: 'car', params: { id: car.id }}">Подробнее...</router-link>
            </section>
        </article>
    </main>
</template>

<script>
  export default {
    computed: {
      cars () {
        return this.$store.getters.CARS;
      }
    },
    mounted () {
      return this.$store.dispatch('GET_CARS');
    }
  };
</script>
