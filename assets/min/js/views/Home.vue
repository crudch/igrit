<template>
    <div>
        <div class="uk-section uk-section-primary uk-text-center ss-section-second">
            <div class="uk-container">

                <h1>Наши фишки</h1>
                <p class="uk-margin-medium uk-text-lead">Много фишек! Просто поверьте нам!</p>

                <div class="uk-grid-match uk-child-width-1-4@m" uk-grid>

                    <div v-for="feature in features" :key="feature.id">
                        <img class="ss-preview-icon" :src="feature.img" width="200" height="140" :alt="feature.title">
                        <h2 class="uk-margin-remove">{{ feature.title }}</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
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