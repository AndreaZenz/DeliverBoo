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
            plates: []
        },
        mounted: function() {
          this.arrItems = JSON.parse(localStorage.getItem('plates'));
          this.tot_price = localStorage.getItem('tot_price');
          this.delivery = localStorage.getItem('delivery');
          this.restaurant_id = localStorage.getItem('restaurant_id');
          this.plates = localStorage.getItem('plates');

          setInterval(function(){
            document.getElementById('amount').type = 'hidden'; 
            document.getElementById('amount').value = parseFloat(localStorage.getItem('tot_price')).toFixed(2);
            document.getElementById('plates').type = 'hidden'; 
            document.getElementById('plates').value = localStorage.getItem('plates');
            document.getElementById('restaurant_id').type = 'hidden'; 
            document.getElementById('restaurant_id').value = localStorage.getItem('restaurant_id');
          }, 100);
        }
  })