<template>
    <div class="limiter signUp-form">
        <div class="container-login100">
            <div class="pull-right" v-if="$auth.check()">
                <p>
                    <a href="#" @click.prevent="$auth.logout()">Logout</a>
                </p>
            </div>
            <div class="main">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
