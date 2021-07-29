import axios from 'axios';
import Vue from 'vue';

var app = new Vue( 
    {
      el: "#app",
      data: {
          arrItems: [],
          prezzototale: 0,
          delivery: 0,
          restaurant_id: 0,
          dishes: []
      },
      mounted: function() {
        this.arrItems = JSON.parse(localStorage.getItem('dishes'));
        this.prezzototale = localStorage.getItem('prezzototale');
        this.restaurant_id = localStorage.getItem('restaurant_id');

        setInterval(function(){
          document.getElementById('amount').type = 'hidden'; 
          document.getElementById('amount').value = parseFloat(localStorage.getItem('prezzototale')).toFixed(2);
          document.getElementById('restaurant_id').value = localStorage.getItem('restaurant_id');
        }, 50);
      }
})