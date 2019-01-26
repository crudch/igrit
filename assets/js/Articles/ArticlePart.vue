<template>
    <router-link :to="{name: 'article.show', params: {id: article.id}}" class="news">

        <div class="news-figure" :data-src="article['img']" v-fuck></div>

        <div class="news-content">
            <div class="news-date">
                {{ article['created_at'] }}
            </div>

            <h2 class="news-title">{{ article.title}}</h2>

            <p>
                {{ shortBody }}
            </p>
        </div>
    </router-link>
</template>

<script>
  export default {
    props: ['article'],
    directives: {
      'fuck': {
        inserted (el) {
          if (!('IntersectionObserver' in window)) {
            return el.src = el.dataset.src;
          }

          const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                const img = new Image();
                img.onload = () => {
                  el.append(img);
                };
                img.src = el.dataset.src;
                observer.unobserve(el);
              }
            });
          }, {root: null, threshold: 0});

          observer.observe(el);
        }
      }
    },
    data () {
      return {
        short: 200
      };
    },
    computed: {
      shortBody () {
        return this.article.body.length > this.short
          ? this.article.body.slice(0, this.short > 3 ? this.short - 3 : this.short) + '...'
          : this.article.body;
      }
    }
  };
</script>

<style lang="scss">
    .news {
        display: flex;
        margin-bottom: 1rem;
        padding: .6rem;
        background-color: #f7f5f5;
        box-shadow: rgba(0, 0, 0, 0.09) 0 2px 0;
        color: inherit;
        text-decoration: none;

        &:hover{
            box-shadow: 0 5px 16px rgba(0,0,0,.3);
        }

        @media (max-width: 640px) {
            flex-wrap: wrap;
            justify-content: center;
        }

        &-figure {
            width: 320px;
            height: 240px;
            background: #c5c5c5 url(/img/blur.jpg) center / cover;
        }

        &-title {
            font-size: 1.2rem;
            margin: 0;
        }

        &-content {
            flex: 1;
            margin-left: 1rem;
        }

        &-date {
            text-align: right;
            font-size: .7em;
            font-weight: 700;
            color: #666;
        }

    }
</style>