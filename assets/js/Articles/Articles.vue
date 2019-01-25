<template>
    <div>
        <h1 class="title is-1">Статейки</h1>

        <article-part
                class="media"
                v-for="article in articles"
                :key="article.id"
                :article="article"
        ></article-part>>
    </div>
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
