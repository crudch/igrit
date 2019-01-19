<template>
    <div class="uk-margin-bottom">
        <button
                class="uk-button uk-button-large"
                @click="changeButton('success', true)"
                :class="{'uk-button-primary': value, 'uk-button-default': !value}"
        >
            ВКЛ
        </button>

        <button
                class="uk-button uk-button-default uk-button-large"
                @click="changeButton('danger', false)"
                :class="{'uk-button-danger': !value, 'uk-button-default': value}"
        >
            ВЫКЛ
        </button>
    </div>
</template>

<script>
  export default {
    props: ['value'],
    methods: {
      changeButton (value, con) {
        this.$emit('input', con, value);
      }
    }
  };
</script>