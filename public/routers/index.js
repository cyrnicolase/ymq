import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const routes = [
    {
        path: '/home',
        component: resolve => require(['~home/index.vue'], resolve)
    }
];

export default new VueRouter({
    // mode: 'history',
    // base: '/dist/',
    routes
});
