<template>
    <div class="text-center">
        <slot>
            <h1>Заголовок</h1>
        </slot>

        <slot name="subtitle">Это подзаголовок</slot>
    </div>
</template>

<script>
  export default {

  };
</script>