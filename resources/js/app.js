require('./bootstrap');
window.Vue = require('vue');
Vue.component('example-component', require('./ExampleComponent.vue').default);
const app = new Vue({
    el: '#app'
});
