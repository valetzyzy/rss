import SignIn from "./components/SignIn.vue"
import SignUp from "./components/SignUp.vue"
import Forgot from "./components/Forgot.vue"
import Dashboard from "./components/Dashboard.vue"
import CommonWords from "./components/CommonWords.vue"
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
            path: '/register',
            name: 'register',
            component: SignUp,
            meta: {auth: false}
        },
        {
            path: '/forgot',
            name: 'forgot',
            component: Forgot,
            meta: {auth: false}
        },
        {
            path: '/commonWords',
            name: 'commonWords',
            component: CommonWords,
            meta: {auth: true}
        },
    ]
});

export default router;
