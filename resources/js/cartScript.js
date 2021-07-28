import axios from 'axios';
import Vue from 'vue';


var app = new Vue(
  {
    el: '#app',
    data: {
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

    mounted: function(){
      this.restaurant_id = restaurant_id_js;
      if(localStorage.getItem('tot_price') != undefined && this.restaurant_id == localStorage.getItem('restaurant_id')) {
        this.tot_price = parseFloat(localStorage.getItem('tot_price')).toFixed(2);
        this.delivery = parseFloat(localStorage.getItem('delivery')).toFixed(2);
        this.cart_dishes = JSON.parse(localStorage.getItem('dishs'));
      }

      this.tot_price = parseFloat(this.tot_price);
    },

    methods: {
      push_dish: function(name, price, img_url){
      },
      dish_minus: function(index){
      },
      dish_plus: function(index){

      },

    }
  });
