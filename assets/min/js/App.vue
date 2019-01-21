<template>
    <div>
        <header>
            <nav>
                <ul>
                    <router-link :to="{name: 'home'}" tag="li">
                        <a>skills-swap</a>
                    </router-link>
                    <router-link :to="{name: 'cars'}" tag="li">
                        <a>Машинки</a>
                    </router-link>
                </ul>
            </nav>
        </header>

        <router-view></router-view>
    </div>
</template>

<script>

  export default {

  };
</script>
