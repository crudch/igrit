<template>
    <main>
        <article>
            <h1>Наши фишки</h1>
            <p>Много фишек! Просто поверьте нам!</p>

            <section v-for="feature in features" :key="feature.id">
                <h2>{{ feature.title }}</h2>
                <img :src="feature.img" width="200" height="140" :alt="feature.title">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
            </section>

        </article>
    </main>
</template>

<script>
  export default {
    data(){
      return{
        features: [
          {id: 1, title: 'Фишка 1', img: '/img/icon_less.svg'},
          {id: 2, title: 'Фишка 2', img: '/img/icon_components.svg'},
          {id: 3, title: 'Фишка 3', img: '/img/icon_themes.svg'},
          {id: 4, title: 'Фишка 4', img: '/img/icon_responsive.svg'},
        ]
      }
    }
  };
</script>