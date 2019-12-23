import SignIn from "./pages/SignIn.vue"
import SignUp from "./pages/SignUp.vue"

export default [
    {
        path: '/',
        name: 'signIn',
        component: SignIn
    },
    {
        path: '/signUp',
        name: 'signUp',
        component: SignUp
    },
]
