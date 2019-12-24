import SignIn from "./components/SignIn.vue"
import SignUp from "./components/SignUp.vue"
import Forgot from "./components/Forgot.vue"
import News from "./components/News.vue"

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
    {
        path: '/forgot',
        name: 'forgot',
        component: Forgot
    },
    {
        path: '/news',
        name: 'news',
        component: News
    },
]
