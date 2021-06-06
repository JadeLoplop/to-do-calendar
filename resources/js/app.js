require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';

Vue.component('main-app', require('./App.vue').default);

Vue.use(VueRouter);
Vue.use(Vuetify);

const router = new VueRouter({
    mode: 'history',
    routes: require('./routes.js'),
});



const app = new Vue({
    router,
    vuetify: new Vuetify(),
    el: '#app',
});