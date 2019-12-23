import Vue from 'vue'

// const app = new Vue({
//   el: '#app',
//   data: {
//     currentRoute: window.location.pathname
//   },
//   computed: {
//     ViewComponent () {
//       const matchingView = routes[this.currentRoute]
//       return matchingView
//         ? require('./pages/' + matchingView + '.vue')
//         : require('./pages/404.vue')
//     }
//   },
//   render (h) {
//     return h(this.ViewComponent)
//   }
// })
//
// window.addEventListener('popstate', () => {
//   app.currentRoute = window.location.pathname
// })
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './layouts/Main.vue'
import routes from './routes'
import SignIn from "./pages/SignIn.vue"
import SignUp from "./pages/SignUp.vue"

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
