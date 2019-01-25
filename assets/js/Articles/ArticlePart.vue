<template>
    <div>
        <figure class="media-left">
            <p class="image is-128x128">
                <img :src="article['img']" :alt="article.title">
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                <h2 class="title is-4">{{ article.title}}</h2>
                <p>
                    <small>{{ article['created_at'] }}</small>
                    <br>
                    {{ shortBody }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    props: ['article'],
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
