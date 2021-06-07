require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
import store from './vuex/store.js';


Vue.component('main-app', require('./App.vue').default);

Vue.use(VueRouter);
Vue.use(Vuetify);

const router = new VueRouter({
    mode: 'history',
    routes: require('./routes.js'),
});



const app = new Vue({
    router,
    store,
    vuetify: new Vuetify(),
    el: '#app',
});