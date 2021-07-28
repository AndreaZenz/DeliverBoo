import axios from 'axios';
import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue');

new Vue(
  {
    el: '#app',
    data: {
      oneDish: {
        "name": null,
        "price": null,
      },
      onedishTest: null,
      cart_dishes: [],
      tot_price: 0,
      delivery: 2.00,
      dish: {
          "name": "",
          "price": 0,
          "description": "",
          "ingredients": "",
          "img_url": ""
        },
      restaurant_id: 0
    },   
    // function(){
    //   this.restaurant_id = restaurant_id_js;
    //   if(localStorage.getItem('tot_price') != undefined && this.restaurant_id == localStorage.getItem('restaurant_id')) {
    //     this.tot_price = parseFloat(localStorage.getItem('tot_price')).toFixed(2);
    //     this.delivery = parseFloat(localStorage.getItem('delivery')).toFixed(2);
    //     this.cart_dishes = JSON.parse(localStorage.getItem('dishes'));
    //   }

    //   this.tot_price = parseFloat(this.tot_price);
    // },

    methods: {
      AddToCart(name, price){
        this.oneDish = {
          "name": name,
          "price": price,
        };
      },
      
      dish_minus: function(index){
      },
      dish_plus: function(index){

      },

    },
    mounted(){

    }
  });
