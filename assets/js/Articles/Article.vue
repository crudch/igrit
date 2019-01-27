<template>
    <article class="article">
        <h1 class="article-title">{{ article.title }}</h1>
        <figure class="article-figure">
            <img class="article-img" :src="article.img" width="640" height="480" :alt="article.title">
        </figure>

        <div class="article-body" v-html="body"></div>
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
        return this.article.short + this.article.body;
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
          catch((err) => {console.log(err);});
      }
    }

  };
</script>

<style lang="scss">
    .article {
        margin-bottom: 3rem;
        background-color: #f7f6f6;

        &-title {
            margin-bottom: 1rem;
            font-size: 1.4rem;
            text-align: center;

            &::before {
                content: '§';
                display: inline-block;
                margin-right: 5px;
                color: #716f72;
            }
        }

        &-figure {
            text-align: center;
            margin-bottom: 1rem;
        }

        &-body {
            padding: 1rem;
            box-shadow: rgba(0, 0, 0, 0.09) 0 2px 0;
        }
    }
</style>