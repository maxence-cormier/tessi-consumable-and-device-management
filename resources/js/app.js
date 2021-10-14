/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { App, plugin } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import vuetify from './modules/vuetify'
import Vue from 'vue'
import Vuelidate from 'vuelidate'
import VueMeta from 'vue-meta'
import AuthUser from "./models/AuthUser";

window.Vue = require('vue');
Vue.mixin({ methods: { route } });
Vue.use(plugin)
Vue.use(Vuelidate)
Vue.use(VueMeta)

// Add Ziggy routes in Vue properties.
/*Vue.mixin({
    methods: {
        route: ( name, params, absolute ) => route(name, params, absolute).url()
    }
});*/

InertiaProgress.init({
    color: '#FF5252'
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const el = document.getElementById('app')

 if(app){
    window.App = new Vue({
        vuetify,
        metaInfo: {
            title: 'Chargement...',
            titleTemplate: '%s - Template',
            changed(info){
                window.App.winURL = window.location.href
                window.App.dynRoute = route()
                window.App.goBack = info.goBack
                window.App.breadcrumbs = info.breadcrumbs;
            }
        },
        data: vm => ({
            winURL: null,
            dynRoute: null,
            goBack: null,
            breadcrumbs: null
        }),
        render: h => h(App, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => import(`./pages/${name}`).then(module => module.default),
                transformProps: props => {
                    return {
                        ...props,
                        auth: {
                            user: props.auth.user ? new AuthUser(props.auth.user) : undefined
                        }
                    }
                },
            },
        }),
    }).$mount(app)
}

 /*if(app) {
    window.App = new Vue({
        vuetify,
        store,
        metaInfo: {
            title: 'Chargement...',
            titleTemplate: '%s - Template',
            changed(info){
                window.App.winURL = window.location.href
                window.App.dynRoute = route()
                window.App.goBack = info.goBack
                window.App.breadcrumbs = info.breadcrumbs;
            }
        },
        /*data: vm => ({
            winURL: null,
            dynRoute: null,
            goBack: null,
            breadcrumbs: null
        }),*/
        /*render: h => h(App, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => import(`./pages/${name}`).then(module => module.default),
                transformProps: props => {
                    return {
                        ...props,
                        auth: {
                            user: props.auth.user ? new AuthUser(props.auth.user) : undefined
                        }
                    }
                },
            },
        }),
    }).$mount(app);
}*/
