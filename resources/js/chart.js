import axios from 'axios';
import Vue from 'vue';

let app = new Vue({
    el: "#app",
    data: {
        delivery: 0,
    },

    mounted: function() {

        //prima richiesta per grafico vendite/guadagni
        axios
        .get(`http://127.0.0.1:8000/api/statistics/${user_id}`)
        .then((response) => {

            let ordersPerMonth = [];
            let orders = response.data; 

            for (let i = 1; i <= 12; i++) {
                            
                let ordersSum = 0;

                orders.forEach((element) => {

                    if ( i == parseInt(element.created_at.substr(5, 2)) ) {
                        element.total_price -= this.delivery;
                        ordersSum += element.total_price; 
                    }

                });

                ordersPerMonth.push(ordersSum);
                
            }

            let ctx = document.getElementById('myAreaChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['gen', 'feb', 'mar', 'apr', 'mag', 'giu', 'lug', 'ago', 'set', 'ott', 'nov', 'dic'],
                    datasets: [{
                        label: 'Gross revenue',
                        data: ordersPerMonth, 
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(67, 97, 238, 0.8)',
                            'rgba(164, 44, 214, 0.8)',
                            'rgba(158, 42, 43, 0.8)',
                            'rgba(255, 195, 0, 0.8)',
                            'rgba(79, 119, 45, 0.8)',
                            'rgba(229, 56, 59, 0.8)'
                        ]
                    }]
                },
                options: {
                    scales: {
                        
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        })

        //grafico per numero ordini
        axios
        .get(`http://127.0.0.1:8000/api/statistics/${user_id}`)
        .then((response) => {

            let ordersPerMonth = [];
            let orders = response.data; 

            for (let i = 1; i <= 12; i++) {
                            
                let ordersSum = 0;

                orders.forEach((element) => {

                    if ( i == parseInt(element.created_at.substr(5, 2)) ) {
                        ordersSum++; 
                    }

                });

                ordersPerMonth.push(ordersSum);
                
            }

            let ctx = document.getElementById('ordersChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['gen', 'feb', 'mar', 'apr', 'mag', 'giu', 'lug', 'ago', 'set', 'ott', 'nov', 'dic'],
                    datasets: [{
                        label: 'Orders Counts',
                        data: ordersPerMonth, 
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(67, 97, 238, 0.8)',
                            'rgba(164, 44, 214, 0.8)',
                            'rgba(158, 42, 43, 0.8)',
                            'rgba(255, 195, 0, 0.8)',
                            'rgba(79, 119, 45, 0.8)',
                            'rgba(229, 56, 59, 0.8)'
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        })
    }
});
