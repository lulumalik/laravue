window.Vue = require('vue');
// import dependecies tambahan
import VueRouter from 'vue-router';
import Vuex from 'vuex'
import Axios from 'axios'

// component
import App from '../component/app.vue';
import Admin from '../component/admin.vue'
import Home from "../component/home.vue"
import MainAdmin from "../component/mainAdmin.vue"
import MainDiagram from "../component/mainDiagram.vue"
import Login from "../component/login.vue"

Vue.prototype.$axios = Axios;
Vue.prototype.$baseUrl = 'http://127.0.0.1:8000/api/';
Vue.use(VueRouter);
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        inputMoment: false,
        inputPostZakat: [],
        refreshForm: {}
    },
    mutations: {
        dynamic(state, data) {
            state[data.key] = data.value
        },
        pushPostZakat(state, data) {
            state.inputPostZakat.push(data)
        }
    }
})

const routes = [{
    name: 'home',
    path: '/',
    component: Home,
}, {
    name: 'login',
    path: '/login',
    component: Login
}, {
    name: 'admin',
    path: '/admin',
    component: Admin,
    children: [
        {
          // UserProfile will be rendered inside User's <router-view>
          // when /user/:id/profile is matched
          name: 'Dashboard',
          path: 'main',
          component: MainAdmin
        },
        {
          // UserPosts will be rendered inside User's <router-view>
          // when /user/:id/posts is matched
          name: 'Diagram',
          path: 'diagram',
          component: MainDiagram
        }
      ]
}]

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

new Vue(Vue.util.extend({
    router,
    store
}, App)).$mount("#app");
