/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueFormulate from '@braid/vue-formulate'




window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VueFormulate)
Vue.component('form-promo-web', require('./components/promo/FormPromoWeb.vue').default);
Vue.component('form-promo-web-edit', require('./components/promo/FormPromoWebEdit.vue').default);

Vue.component('form-promo-app', require('./components/promo/FormPromoApp.vue').default);
Vue.component('form-promo-app-edit', require('./components/promo/FormPromoAppEdit.vue').default);

Vue.component('form-promo-marketing', require('./components/promo/FormPromoMarketing.vue').default);
Vue.component('form-promo-marketing-edit', require('./components/promo/FormPromoMarketingEdit.vue').default);

Vue.component('form-promo', require('./components/promo/FormPromoDefault.vue').default);
Vue.component('form-promo-edit', require('./components/promo/FormPromoDefaultEdit.vue').default);

Vue.component('form-create-question', require('./components/question/FormCreateQuestion.vue').default);
Vue.component('form-edit-question', require('./components//question/FormEditQuestion.vue').default);

Vue.component('filters', require('./components/list/Filters.vue').default);
Vue.component('promo-list', require('./components/list/PromoList.vue').default);
Vue.component('box', require('./components/list/Box.vue').default);
Vue.component('list', require('./components/list/VueList.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
