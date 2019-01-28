<template>
    <router-link :to="{name: 'article.show', params: {id: article.id}}" class="news">

        <div class="news-figure" :data-src="article['img']" v-fuck></div>

        <div class="news-content">
            <div class="news-date">
                {{ article['created_at'] }}
            </div>

            <h2 class="news-title">{{ article.title}}</h2>

            <p>{{ article.short }}</p>
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
