import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../pages/home.vue';
import ContactList from '../pages/contact/index.vue';
import CreateContact from '../pages/contact/create.vue';
import EditContact from '../pages/contact/edit.vue';
import ViewContact from '../pages/contact/view.vue';

const routes = new VueRouter({

    mode: 'history',
    routes: [

        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/contact',
            component: ContactList,
            name: 'contact-list'
        },
        {
            path: '/contact/create',
            component: CreateContact,
            name: 'create-contact'
        },
        {
            path: '/contact/edit/:id',
            component: EditContact,
            name: 'edit-contact'
        },
        {
            path: '/contact/view/:id',
            component: ViewContact,
            name: 'view-contact'
        }
    ]
});

export default routes;