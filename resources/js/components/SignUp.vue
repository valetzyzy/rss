<template>
    <div class="wrap-login100 p-b-160 p-t-50">
        <form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Sign Up
					</span>

            <div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
                <input class="input100" type="text" name="email">
                <span class="label-input100">Name</span>
            </div>

            <div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
                <input class="input100" type="text" name="email">
                <span class="label-input100">Email</span>
            </div>


            <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                <input class="input100" type="password" name="password">
                <span class="label-input100">Password</span>
            </div>


            <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                <input class="input100" type="password" name="password-again">
                <span class="label-input100">Password Again</span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Sign in
                </button>
            </div>

            <div class="text-center w-full p-t-23">
                <router-link :to="{name: 'forgot'}" class="txt1">Forgot password?</router-link>
            </div>
            <div class="text-center w-full">
                <router-link :to="{name: 'signIn'}" class="txt1">Sign In</router-link>
            </div>
        </form>
    </div>
</template>

<script>
    export default {}
</script>

<style>
    .signUp-form .wrap-input100 {
        width: 100%;
    }

    .signUp-form .wrap-input100.rs1 {
        border-top-left-radius: 0;
    }
</style>
