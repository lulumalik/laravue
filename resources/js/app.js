window.Vue = require('vue');

// import dependecies tambahan
import VueRouter from 'vue-router';
import Vuex from 'vuex'
import Axios from 'axios'

// component
import App from '../component/app.vue';
import Admin from '../component/admin.vue'
import Home from "../component/home.vue"

Vue.prototype.$axios = Axios;
Vue.prototype.$baseUrl = 'http://127.0.0.1:8000/api/';
Vue.use(VueRouter);
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        count: 0
    },
    mutations: {
        increment(state) {
            state.count++
        }
    }
})

const routes = [{
    name: 'home',
    path: '/',
    component: Home,
}, {
    name: 'admin',
    path: '/admin',
    component: Admin
}]

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

new Vue(Vue.util.extend({
    router,
    store
}, App)).$mount("#app");
