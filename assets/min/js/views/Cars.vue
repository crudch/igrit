<template>
    <main>
        <article>
            <h1>Машинки</h1>

            <section v-for="car in cars" :key="car.id">
                <h2>{{ car.title }}</h2>
                <p>{{ car.text }}</p>
                <router-link :to="{name: 'car', params: { id: car.id }}">Подробнее...</router-link>
            </section>
        </article>
    </main>
</template>

<script>
  export default {
    data () {
      return {
        cars: [
          {id: 1, title: 'Ford', text: 'Ford is best'},
          {id: 2, title: 'Audi', text: 'Audi fucking machine'},
          {id: 3, title: 'BMW', text: 'BMW will kill you'}
        ]
      };
    }
  };
</script>
