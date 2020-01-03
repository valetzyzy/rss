<template>
    <div class="wrap-login100 p-b-160 p-t-50">
        <form class="login100-form validate-form" @submit.prevent="register()">
            <span class="login100-form-title p-b-43">
                Sign Up
            </span>

            <div v-if="message" class="alert alert-danger" v-html="message"></div>

            <div class="wrap-input100 rs1 validate-input">
                <input class="input100" type="text" v-model="name">
                <span class="label-input100">Name</span>
            </div>

            <div class="wrap-input100 rs1 validate-input">
                <input class="input100" type="text" v-model="email" v-on:blur="checkEmail">
                <span class="label-input100">Email</span>
            </div>


            <div class="wrap-input100 rs1 validate-input">
                <input class="input100" type="password" v-model="password">
                <span class="label-input100">Password</span>
            </div>


            <div class="wrap-input100 rs1 validate-input">
                <input class="input100" type="password" v-model="passwordAgain">
                <span class="label-input100">Password Again</span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Sign in
                </button>
            </div>
            <div class="text-center w-full">
                <router-link :to="{name: 'login'}" class="txt1">Sign In</router-link>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
                passwordAgain: '',
                message: null
            }
        },
        methods: {
            checkEmail() {
                this.message = null;
                axios.post('/auth/checkEmail', {
                    email: this.email
                })
                .catch(err => {
                    this.message = err.response.data.error.join('<br>')
                })
            },
            register() {
                let app = this
                this.message = null

                if ((app.password !== app.passwordAgain)
                    && (app.password !== '' || app.passwordAgain !== '')) {
                    app.message = 'Password must be the same'
                    return false
                }

                this.$auth.register({
                    data: {
                        name: app.name,
                        email: app.email,
                        password: app.password,
                        passwordAgain: app.passwordAgain
                    },
                    autoLogin: false,
                    success(res) {
                        this.$router.push({name: 'login'})
                    },
                    error(err) {
                        app.message = err.response.data.error.join('<br>');
                    }
                })
            }
        }
    }
</script>

<style>
    .signUp-form .wrap-input100 {
        width: 100%;
    }

    .signUp-form .wrap-input100.rs1 {
        border-top-left-radius: 0;
    }
</style>
