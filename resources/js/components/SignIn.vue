<template>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-160 p-t-50">
                <form class="login100-form validate-form" @submit.prevent="onSubmit($event)">
					<span class="login100-form-title p-b-43">
						Account Login
					</span>

                    <div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
                        <input class="input100" type="email" v-model="email">
                        <span class="label-input100">Email</span>
                    </div>


                    <div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" v-model="password">
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" :disabled="loggingIn">Sign in</button>
                    </div>

                    <div class="text-center w-full p-t-23">
                        <router-link :to="{name: 'forgot'}" class="txt1">Forgot password?</router-link>
                    </div>
                    <div class="text-center w-full">
                        <router-link :to="{name: 'signUp'}" class="txt1">Sign Up?</router-link>
                    </div>
                </form>
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
                password: ''
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
                    success: function () {},
                    error: function (err) {
                        console.log(err)
                    },
                    rememberMe: true,
                    redirect: '/',
                    fetchUser: false,
                });
            }
        }
    }
</script>
