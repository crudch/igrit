<template>
    <div>
        <div class="uk-section uk-section-default uk-text-center">
            <div class="uk-container">

                <h1>Машинки</h1>

                <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                    <div v-for="c of 3">
                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                            <div class="uk-card-badge uk-label">Badge</div>
                            <h3 class="uk-card-title">Default</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
  export default {

  };
</script>
