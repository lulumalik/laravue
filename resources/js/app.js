require('./bootstrap');


window.Vue = require('vue');

// import dependecies tambahan
import VueRouter from 'vue-router';
import Axios from 'axios'

// component
import App from '../component/app.vue';
import Home from '../component/home.vue'

Vue.prototype.$axios = Axios
Vue.use(VueRouter);

const routes = [{
    name: 'home',
    path: '/',
    component: Home
}]

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

new Vue(Vue.util.extend({
    router
}, App)).$mount("#app");
