/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');




window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


// queste 2 righe di comando chiamano tutte le Vue.component in automatico
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('RestaurantCard', require('./components/RestaurantCard.vue').default);
// Vue.component('RestaurantIndex', require('./components/RestaurantIndex.vue').default);
// Vue.component('TextInput', require('./components/formInputs/TextInput.vue').default);
// Vue.component('MultiCheckInput', require('./components/formInputs/MultiCheckInput.vue').default);
//Vue.component('DishCard', require('./components/DishCard.vue').default);
//Vue.component('StatisticsIndex', require('./components/StatisticsIndex.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
});


window.addEventListener("load", function() {
    const deleteForms = document.querySelectorAll(".delete_form");

    deleteForms.forEach(form => {
        form.addEventListener("submit", (event) => {

            if (!confirm("Sei sicuro di voler cancellare questo elemento?")) {
                event.preventDefault();
            }
        })
    })
})