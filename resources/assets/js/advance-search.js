
require('./bootstrap');

window.Vue = require('vue');

/**
 * Vue JS code
 */
import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

Vue.component('advance-search', require('./components/AdvanceSearch.vue'));

const app = new Vue({
    el: '#my-app'
});