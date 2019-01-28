<template>

    <form class="pure-form pure-form-stacked" @submit.prevent="process(mode)">
        <fieldset>
            <legend>Форма для новости</legend>

            <div class="form-block">
                <input type="text" class="pure-input-1 form-input form-title"
                        placeholder="Заголовок новости" v-model="article.title">
            </div>

            <div class="form-block">
                <textarea class="pure-input-1 form-input" placeholder="Краткое описание"
                        v-model="article.short"></textarea>
            </div>

            <div class="form-block">
                <quill-editor v-model="article.body"></quill-editor>
            </div>

            <div class="form-block">
                <label class="pure-checkbox form-checkbox">
                    <input type="checkbox" v-model.number="article.activity"
                            true-value="1"
                            false-value="0"
                    > Обубликовать
                </label>
            </div>

            <button type="submit" class="pure-button pure-button-primary">{{ buttonText }}</button>
        </fieldset>
    </form>

</template>

<!--suppress ES6CheckImport -->
<script>
  import { get, post } from '../api';
  import 'quill/dist/quill.core.css';
  import 'quill/dist/quill.snow.css';

  import { quillEditor } from 'vue-quill-editor';

  export default {
    components: {
      quillEditor
    },
    props: ['mode'],
    data () {
      return {
        article: {
          title: '',
          img: '',
          short: '',
          body: '',
          activity: 1
        }
      };
    },
    created () {
      if (this.mode === 'edit') {
        get(`articles/${this.$route.params['id']}/edit`).
          then(({data}) => {
            ['created_at', 'updated_at'].forEach((e) => {delete data[e];});
            this.article = data;
          }).
          catch((err) => {});
      }
    },
    computed: {
      buttonText () {
        return this.mode === 'create' ? 'Создать' : 'Обновить';
      }
    },
    methods: {
      create (callback) {

      },
      edit (callback) {
        post(`articles/${this.$route.params['id']}/edit`, this.article).
          then(() => {callback()}).
          catch((err) => {});
      },
      process (callback) {
        this[callback](() => this.$router.replace({name: 'articles'}));
      }
    }
  };
</script>