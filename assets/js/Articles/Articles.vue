<template>
    <main>
        <h1 class="title">Очень крутые новости</h1>

        <article-part v-for="article in articles" :key="article.id" :article="article"></article-part>
    </main>
</template>

<script>
  import { get } from '../api';
  import ArticlePart from './ArticlePart';

  export default {
    components: {ArticlePart},
    data () {
      return {
        articles: []
      };
    },
    created () {
      get('articles').then(({data}) => {
        this.articles = data;
      }).catch((err) => {});
    }
  };
</script>
