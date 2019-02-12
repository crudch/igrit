<template>
    <form class="profile">
        <h1>Профиль</h1>
        <div class="form-flex">
            <div class="form-flex-avatar">
                <div class="form-avatar">
                    <img :src="avatar" width="100" height="100" alt="Аватар">
                </div>

                <input ref="photoUpload" type="file" class="hide" @change="handlePhotoUpload" accept="image/*">
                <button type="button" @click="triggerFileUpload">Сменить</button>

                <div v-if="showButton" class="form-save-button">
                    <button type="button" @click="saveImage">Сохранить</button>
                </div>
            </div>

            <div class="form-flex-fieldset">

                <div class="field-input">
                    <input id="first_name" type="text" v-model.trim="user.first_name" placeholder="Имя"
                            autocomplete="off" @change="save" pattern="[0-9A-zА-яЁё_ ]{3,}">
                </div>

                <div class="field-input">
                    <input id="email" type="email" v-model="user.email" placeholder="email"
                            autocomplete="off" @change="save">
                </div>
            </div>
        </div>
    </form>
</template>

<script>
  import { get, post, upload } from '../api';
  import Auth from '../auth';

  export default {
    data () {
      return {
        user: {
          avatar: ''
        },
        old: {}
      };
    },
    created () {
      get('/profile').
        then(({data}) => {
          this.user = data;
          this.old = Object.assign({}, data); // { ...data }
        }).
        catch((err) => console.log(err));
    },
    computed: {
      avatar () {
        return this.user.avatar || '/img/avatar.svg';
      },

      showButton () {
        return null !== this.user.avatar && !!~this.user.avatar.indexOf('data:image');
      }
    },
    methods: {
      save ({target}) {
        if (!target.value.length || !target.validity.valid) {
          return this.user[target.id] = this.old[target.id];
        }

        this.old[target.id] = this.user[target.id];

        post('/profile/save', {[target.id]: this.user[target.id]}).
          then(() => {
            target.id === 'first_name' && Auth.set('first_name', this.user[target.id]);
          }).
          catch((err) => {});

        target.blur();
      },

      triggerFileUpload () {
        this.$refs.photoUpload.click();
      },

      handlePhotoUpload ({target}) {

        if (!target.files.length) {
          return this.user.avatar = this.old.avatar;
        }

        const reader = new FileReader();

        reader.onload = (e) => {
          this.user.avatar = e.target['result'];
        };

        reader.readAsDataURL(target.files[0]);
      },

      saveImage () {
        const data = new FormData();
        data.append('file', this.$refs.photoUpload.files[0]);

        upload('/upload/avatar', data).
          then(({data}) => {
            this.user.avatar = data.avatar;
            this.old.avatar = data.avatar;
            Auth.set('avatar', data.avatar);
          }).
          catch((err) => {console.log(err);});
      }
    }
  };
</script>

<style lang="scss">

    .profile {
        h1 {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        button {
            width: 100%;
        }
    }

    .form-save-button {
        margin-top: 1rem;
    }

    .form-flex {
        display: flex;
        padding: .6rem;
        background-color: whitesmoke;

        &-avatar {
            position: relative;
            text-align: center;
        }

        &-fieldset {
            margin-left: 1rem;
        }

        .form-avatar {
            margin-bottom: 10px;
            overflow: hidden;
            width: 100px;
            height: 100px;
        }
    }

    .field-input {
        margin-bottom: 5px;

        input[type] {
            width: 16rem;
            padding: 5px;
            font-weight: 700;
            border: 1px dashed transparent;
            cursor: pointer;
            background-color: whitesmoke;

            &:hover {
                border-color: lighten(#999, 20%);
            }

            &:focus {
                border-color: #777;
                cursor: text;
                outline: none;
                background-color: lighten(whitesmoke, 30%);
            }
        }
    }
</style>