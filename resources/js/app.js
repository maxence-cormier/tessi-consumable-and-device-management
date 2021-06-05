/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { App, plugin } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'

window.Vue = require('vue');
Vue.use(plugin)

// Add Ziggy routes in Vue properties.
Vue.mixin({
    methods: {
        route: ( name, params, absolute ) => route(name, params, absolute).url()
    }
});

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

 new Vue({
   render: h => h(App, {
     props: {
       initialPage: JSON.parse(el.dataset.page),
       resolveComponent: name => import(`./pages/${name}`).default,
     },
   }),
 }).$mount(el)
