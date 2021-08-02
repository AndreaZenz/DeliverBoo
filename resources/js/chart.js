import axios from 'axios';
import Vue from 'vue';
import Chart from 'chart.js/auto';

let app = new Vue({
    el: "#app",
    data: {
        delivery: 0,
    },

    mounted: function () {

        //prima richiesta per grafico vendite/guadagni
        axios
            .get(`http://127.0.0.1:8000/api/statistics/${user_id}`)
            .then((response) => {

                let ordersPerMonth = [];
                let orders = response.data;
                let max_no = 0;
                let max_in_month = 0;

                for (let i = 1; i <= 12; i++) {

                    let ordersSum = 0;

                    orders.forEach((element) => {

                        if (i == parseInt(element.created_at.substr(5, 2))) {
                            element.total_price -= this.delivery;
                            ordersSum += element.total_price;
                        }

                    });
                    
                    //get highest income in a month
                    if(max_in_month < ordersSum){
                        max_in_month = ordersSum
                    }


                    ordersPerMonth.push(ordersSum);

                }

                //max value on y axis - round up to multiple of 10
                max_no = Math.round((max_in_month + 10 / 2) / 10) * 10; 
                

                //chart data
                const cdata = {
                        labels: ['gen', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
                        datasets: [{
                            label: 'All Restaurants',
                            data: ordersPerMonth,
                            backgroundColor: [
                                // 'rgba(54, 162, 235, 0.8)',
                                // 'rgba(255, 206, 86, 0.8)',
                                'rgba(229, 56, 59, 0.8)'
                            ],
                            borderColor: 'rgba(229, 56, 59, 0.8)',
                            
                        }
                        
                    ]
                };

                //chart settings
                const config = {
                    type: 'line',
                    data: cdata,
                    options: {
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                            },
                            y: {
                                max: max_no,
                                grid: {
                                },
                            },
                            
                            
                        }
                    }

                }

                
                //get the chart from
                let ctx = document.getElementById('myAreaChart').getContext('2d');
                var myChart = new Chart(ctx, config );
            })
            .catch((er) => {
                alert("Can't load gross revenue chart");
            });

        //grafico per numero ordini
        axios
            .get(`http://127.0.0.1:8000/api/statistics/${user_id}`)
            .then((response) => {

                let ordersPerMonth = [];
                let orders = response.data;
                let max_no = 0;
                let max_in_month = 0;
                let stepSize = 0;

                for (let i = 1; i <= 12; i++) {

                    let ordersSum = 0;

                    orders.forEach((element) => {

                        if (i == parseInt(element.created_at.substr(5, 2))) {
                            ordersSum++;
                        }

                    });

                    //get highest income in a month
                    if(max_in_month < ordersSum){
                        max_in_month = ordersSum
                    }

                    ordersPerMonth.push(ordersSum);

                }

                //max value on y axis - round up to multiple of 5
                max_no = Math.round((max_in_month + 5 / 2) / 5) * 5;

                //to prevent decimal numbers
                if(max_no == 5){
                    stepSize = max_no/5;
                }


                const cdata = {
                    labels: ['gen', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
                    datasets: [{
                        label: 'Orders Count',
                        data: ordersPerMonth,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.8)',
                        ],
                        borderColor: 'rgba(54, 162, 235, 0.8)',
                    }],
                };

                const config = {
                    type: 'line',
                    data: cdata,
                    options: {
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                            },
                            y: {
                                max: max_no,
                                ticks: {
                                    // forces step size to be x units
                                    stepSize: stepSize
                                },
                            },
                        }
                    }
                }
                let ctx = document.getElementById('ordersChart').getContext('2d');

                var myChart = new Chart(ctx, config);
            })
            .catch((er) => {               
                alert("Can't load orders count chart");
            });
    }
});
