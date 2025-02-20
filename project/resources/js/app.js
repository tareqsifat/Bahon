
 require('./bootstrap');

 window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';

Vue.use(VueRouter);

 Vue.component('navbar', require('./components/admin/include/navbar.vue').default);
 Vue.component('sidebar', require('./components/admin/include/sidebar.vue').default);
 

 const app = new Vue({
     el: '#app',
     router: new VueRouter(routes)
 });