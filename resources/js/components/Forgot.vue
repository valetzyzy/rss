<template>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-160 p-t-50">
                <form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Forgot Password
					</span>

                    <div class="wrap-input100 rs1 validate-input w-100" data-validate = "Username is required">
                        <input class="input100" type="text" name="email">
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Send verification link
                        </button>
                    </div>
                    <div class="text-center w-full">
                        <router-link :to="{name: 'signUp'}" class="txt1">Sign Up</router-link>
                    </div>
                    <div class="text-center w-full">
                        <router-link :to="{name: 'signIn'}" class="txt1">Sign In</router-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {}
</script>
