<template>
    <span v-html="boldMessage"></span>
</template>

<script>
  export default {
    props: ['message', 'name'],
    computed: {
      boldMessage () {
        return this.message.replace(/{{(.+?)}}/g, (s, el) => {
          return `<b class="chat-bold-${+(this.name === el)}">${el}</b>`;
        });
      }
    }
  };
</script>

<style>
    .chat-bold-0 {
        color: darkslategray;
    }

    .chat-bold-1 {
        color: tomato;
    }
</style>