import axios from 'axios';
import Vue from 'vue';

var app = new Vue( 
    {
      el: "#app",
      data: {
          arrItems: [],
          tot_price: 0,
          delivery: 0,
          restaurant_id: 0,
          dishes: []
      },
      mounted: function() {
        this.arrItems = JSON.parse(localStorage.getItem('dishes'));
        this.tot_price = localStorage.getItem('tot_price');
        this.delivery = localStorage.getItem('delivery');
        this.restaurant_id = localStorage.getItem('restaurant_id');
        this.dishes = localStorage.getItem('dishes');

        setInterval(function(){
          document.getElementById('amount').type = 'hidden'; 
          document.getElementById('amount').value = parseFloat(localStorage.getItem('tot_price')).toFixed(2);
          document.getElementById('dishes').type = 'hidden'; 
          document.getElementById('dishes').value = localStorage.getItem('dishes');
          document.getElementById('restaurant_id').type = 'hidden'; 
          document.getElementById('restaurant_id').value = localStorage.getItem('restaurant_id');
        }, 50);
      }
})