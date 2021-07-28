import axios from 'axios';
import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue');

new Vue(
  {
    el: '#app',
    data: {
      one_dish: {
        "name": null,
        "price": null,
        "index": 0,
      },
      index: null,
      onedishTest: null,
      cart_dishes: "",
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

    methods: {
      AddToCart(name, price){
        this.one_dish = {
          "name": name,
          "price": price,
          "index": 0,
        };
        this.tot_price += price;
        this.index = this.one_dish.index;
        this.cart_dishes += this.one_dish;

      },
      
      PrintToCart: function(index){
      },
      dish_plus: function(index){
      },
      SaveOrderToPayment(){

      },

    },
    mounted(){

    }
  });
