<?php
/**
 * @var \Crudch\View\View $this
 * @var string            $username
 */
?>

<?php $this->extend('layout/layout'); ?>

<?php $this->start('title'); ?>Title<?php $this->stop(); ?>
<?php $this->start('description'); ?>Description<?php $this->stop(); ?>

<?php $this->start('style'); ?><?php $this->stop(); ?>

<?php $this->start('content'); ?>

    <div class="container">
        <div id="app" v-cloak>
            <form class="mb-4">

                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input type="text" class="form-control" id="firstname" v-model="formData.firstname">
                </div>

                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input type="text" class="form-control" id="lastname" v-model="formData.lastname">
                </div>

                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" v-model="formData.url">
                </div>

                <div class="form-group">
                    <label for="badge">Example textarea</label>
                    <textarea class="form-control" id="badge" rows="3" v-model="formData.badge"></textarea>
                </div>

                <div class="form-group">
                    <label for="book">Book</label>
                    <input type="text" class="form-control" id="book" v-model="formData.bookisbn">
                </div>

                <div class="form-group">
                    <label for="techno">Technologies</label>
                    <input type="text" class="form-control" id="techno" v-model="formData.technologies">
                </div>

                <button type="submit" class="btn btn-primary" @click.prevent="submit">Submit</button>
            </form>

            <div class="jumbotron" v-if="showDetails">
                <h1 class="display-4">Hello, {{fullname}}!</h1>
                <p class="lead">My blog is <a :href="formData.url">here</a></p>
                <hr class="my-4">
                <p v-html="formData.badge"></p>
                <div>
                    <p>My favorite book is <strong>{{book.title}}</strong></p>
                    <p>
                        <img :src="book.url" alt="{{book.title}}">
                    </p>
                </div>
                <ul class="list-group" v-if="myTech.length > 0 && myTech[0].length">
                    <li class="list-group-item" v-for="tech in myTech">{{tech}}</li>
                </ul>
            </div>
        </div>
    </div>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
    <script>
      const vm = new Vue({
        el: '#app',
        data: {
          formData: {
            firstname: '',
            lastname: '',
            url: 'http://www.',
            badge: '',
            bookisbn: '',
            technologies: ''
          },
          showDetails: false,
          book: {
            title: '',
            url: ''
          }
        },

        computed: {
          fullname () {
            return `${this.formData.firstname} ${this.formData.lastname}`;
          },
          myTech () {
            return this.formData.technologies.split(',').filter(e => e !== '');
          }
        },

        watch: {
          'formData.bookisbn': function () {
            const url = `http://openlibrary.org/api/books?bibkeys=ISBN:${this.formData.bookisbn}&format=json&jscmd=data`;
            axios({
              method: 'get',
              url: url
            }).then((json) => {
                vm.book.title = json.data[`ISBN:${this.formData.bookisbn}`].title;
                vm.book.url = json.data[`ISBN:${this.formData.bookisbn}`]['cover']['large'];
            }).catch((err) => {
              console.log(err);
            });
          }
        },

        methods: {
          submit () {
            this.showDetails = true;
          }
        }

      });
    </script>
<?php $this->stop(); ?>