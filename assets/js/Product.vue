<template>
    <div class="card mb-2">

        <router-link class="card-body crutch-link" :to="{name : 'show', params: {id: product.id}}">
            <h5 class="card-title"># {{index}} {{product.title}}</h5>
            <p v-fuck :data-src="product.url"></p>
            <p class="card-text">{{product.body}}</p>
        </router-link>

    </div>
</template>

<script>
  export default {
    props: ['product', 'index'],
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
    }
  };
</script>