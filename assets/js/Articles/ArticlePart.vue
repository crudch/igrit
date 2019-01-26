<template>
    <article class="news">

        <div class="news-figure" :data-src="article['img']" v-fuck></div>

        <div class="news-content">
            <h2 class="news-title">{{ article.title}}</h2>

            <p>
                {{ shortBody }}
            </p>
        </div>
    </article>
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

        @media (max-width: 640px) {
            flex-wrap: wrap;
            justify-content: center;
        }
    }

    .news-figure {
        width: 320px;
        height: 240px;
        background: #c5c5c5 url(/img/blur.jpg) center / cover;
    }

    .news-title {
        font-size: 1.2rem;
        margin: 0;
    }

    .news-content {
        flex: 1;
        margin-left: 1rem;
    }
</style>