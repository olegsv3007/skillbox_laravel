/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    'summary-report',
    require('./components/SummaryReport.vue').default
);
Vue.component(
    'notification',
    require('./components/Notification.vue').default
);

const app = new Vue({
    el: '#app'
});

