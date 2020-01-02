import SignIn from "./components/SignIn.vue"
import SignUp from "./components/SignUp.vue"
import Forgot from "./components/Forgot.vue"
import Dashboard from "./components/Dashboard.vue"
import News from "./components/News.vue"
import VueRouter from "vue-router"
import Vue from "vue"

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard,
            meta: {auth: true}
        },
        {
            path: '/login',
            name: 'login',
            component: SignIn,
            meta: {auth: false}
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
            component: News,
            meta: {auth: true}
        },
    ]
});

export default router;
