<template>
    <article class="article">

        <section class="article-main">
            <h1 class="article-title">{{ article.title }}</h1>

            <figure class="article-figure">
                <img class="article-img" :src="article['img']" width="640" height="480" :alt="article.title">
            </figure>

            <div class="article-body" v-html="body"></div>
        </section>

        <section class="article-buttons">
            <router-link class="pure-button pure-button-primary" :to="{name: 'article.edit', params: {id: +id}}">
                Редактировать
            </router-link>
        </section>

    </article>
</template>

<script>
  import { get } from '../api';

  export default {
    props: ['id'],
    data () {
      return {
        article: {}
      };
    },
    watch: {
      '$route': 'fetchNews'
    },
    computed: {
      body () {
        return `<p>${this.article.short}</p>` + this.article.body;
      }
    },
    created () {
      this.fetchNews();
    },
    methods: {
      fetchNews () {
        get(`articles/${this.id}`).
          then(({data}) => {
            this.article = data;
          }).
          catch(({response}) => {console.log(response);});
      }
    }

  };
</script>