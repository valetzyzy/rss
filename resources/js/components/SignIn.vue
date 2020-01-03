<template>
    <div class="limiter">
        <div class="container-login100">
            <div class="main">
                <div class="wrap-login100 p-b-160 p-t-50">
                    <form class="login100-form validate-form" @submit.prevent="onSubmit($event)">
                        <span class="login100-form-title p-b-43">
                            Account Login
                        </span>

                        <div class="alert alert-danger w-100" v-if="message">{{ message }}</div>

                        <div class="wrap-input100 rs1 validate-input">
                            <input class="input100" type="email" v-model="email">
                            <span class="label-input100">Email</span>
                        </div>


                        <div class="wrap-input100 rs2 validate-input">
                            <input class="input100" type="password" v-model="password">
                            <span class="label-input100">Password</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" :disabled="loggingIn">Sign in</button>
                        </div>
                        <div class="text-center w-full">
                            <router-link :to="{name: 'register'}" class="txt1">Sign Up?</router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loggingIn: false,
                email: '',
                password: '',
                message: null,
            }
        },
        methods: {
            onSubmit(event) {
                let app = this
                this.$auth.login({
                    data: {
                        email: app.email,
                        password: app.password
                    },
                    success () {},
                    error(err) {
                        this.message = err.response.data.error
                    },
                    rememberMe: true,
                    redirect: '/',
                    fetchUser: true,
                });
            }
        }
    }
</script>
