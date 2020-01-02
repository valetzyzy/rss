require('./bootstrap')


import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import App from './layouts/Main.vue'
import VueAuth from '@websanova/vue-auth'
import router from './router'
import auth from './auth'

Vue.router = router
Vue.use(VueAxios, axios)

axios.defaults.baseURL = 'http://localhost:8035/api';

Vue.use(VueAuth, auth)

const app = new Vue({
    router,
    el: '#app',
    components: { App },
});
