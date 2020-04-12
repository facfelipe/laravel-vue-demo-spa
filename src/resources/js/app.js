import Vue from 'vue';

import VueRouter from 'vue-router';

import { BootstrapVue, IconsPlugin}  from 'bootstrap-vue';
import Toasted from 'vue-toasted';

import App from './components/AppComponent';
import Author from './components/AuthorComponent';
import Book from './components/BookComponent';
import Home from './components/HomeComponent';

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(Toasted);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: "active",
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/books',
            name: 'book',
            component: Book,
        },
        {
            path: '/authors',
            name: 'author',
            component: Author,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App, Author, Book, Home },
    router,
});

