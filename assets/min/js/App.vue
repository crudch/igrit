<template>
    <div class="uk-offcanvas-content">
        <div class="uk-section-primary ss-section-second">
            <div uk-sticky class="uk-navbar-container uk-navbar-transparent">
                <div class="uk-container uk-container-expand">
                    <nav class="uk-navbar" uk-navbar="align: right;delay-hide:200;offset:-15">
                        <div class="uk-navbar-left">
                            <router-link :to="{name: 'home'}" class="ss-brand">
                                <span>skills-swap</span>
                            </router-link>
                        </div>
                        <div class="uk-navbar-right">
                            <ul class="uk-navbar-nav uk-visible@m">
                                <li>
                                    <router-link :to="{name: 'cars'}" class="ss-auth" data-index="0">
                                        <span>Машинки</span>
                                    </router-link>
                                </li>
                                <li><a class="ss-auth" data-index="1">Создать профиль</a></li>
                            </ul>
                            <a uk-navbar-toggle-icon uk-toggle href="#offcanvas"
                                    class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="9" width="20" height="2"></rect>
                                    <rect y="3" width="20" height="2"></rect>
                                    <rect y="15" width="20" height="2"></rect>
                                </svg>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <router-view></router-view>

        <div class="uk-section uk-section-secondary uk-light ss-section-footer">
            <div class="uk-container">

                <h3>Footer</h3>

                <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
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
