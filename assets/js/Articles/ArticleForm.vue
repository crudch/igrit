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
  import { get } from '../api';
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

      },
      process (callback) {
        this[callback](() => this.$router.replace({name: 'articles'}));
      }
    }
  };
</script>

<style lang="scss">
    .pure-form {

        .form-block {
            margin-bottom: 1rem;
        }

        .form-input, input[type] {
            border: 2px solid #ddd;
            box-shadow: none;
            border-radius: 0;
            font-size: 100%;

            &.form-title {
                font-weight: 700;
                padding: 0.1em 0.3em;
                font-size: 1.2rem;
            }
        }

        .form-checkbox {
            cursor: pointer;
            display: inline-block;
            user-select: none;
        }

        .ql-editor p,
        .ql-editor ol,
        .ql-editor ul,
        .ql-editor pre,
        .ql-editor blockquote,
        .ql-editor h1,
        .ql-editor h2,
        .ql-editor h3,
        .ql-editor h4,
        .ql-editor h5,
        .ql-editor h6 {
            margin-bottom: 10px;
            font-size: 1rem;
        }
    }
</style>