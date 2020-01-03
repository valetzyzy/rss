<template>
    <div class="limiter signUp-form">
        <div class="container-login100">
            <ul class="nav justify-content-center" v-if="$auth.check()">
                <li class="nav-item">
                    <router-link :to="{name: 'dashboard'}" class="nav-link color-white">Feed</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'commonWords'}" class="nav-link color-white">Common words</router-link>
                </li>
                <li class="nav-item">
                    <a href="#" @click.prevent="$auth.logout()" class="nav-link color-white">Logout ({{ $auth.user().name }})</a>
                </li>
            </ul>
            <div class="main">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
