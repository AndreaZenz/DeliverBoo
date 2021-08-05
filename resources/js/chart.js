import axios from 'axios';
import Vue from 'vue';
import Chart from 'chart.js/auto';

let app = new Vue({
    el: "#app",
    data: {
        delivery: 0,
        max_no: 0,
        max_noCY: 0,
        max_noLY: 0,
        max_in_month: 0,
        max_in_monthCY: 0,
        max_in_monthLY: 0,
        ordersSum: 0,
        ordersSumCY: 0,
        ordersSumLY: 0,

        //ordersChart
        max_no_order: 0,
        ordersPerMonth: [],
        ordersPerMonthCY: [],
        ordersPerMonthLY: [],
        max_in_month_orders: 0,

        //cards
        year_target_progress: 0,

        //choose Year Chart
        checked: false,
    },
    mounted: function () {
        //prima richiesta per grafico vendite/guadagni
        axios
            .get(`http://127.0.0.1:8000/api/statistics/${user_id}`)
            .then((response) => {

                this.ordersPerMonthCY = [];
                this.ordersPerMonthLY = [];
                let orders = response.data;
                this.max_in_monthCY = 0;
                this.max_in_monthLY = 0;
                let today = new Date();
                let current_month = today.getMonth() + 1;
                let current_year = today.getFullYear();
                let last_year = current_year - 1;
                let current_month_revenue = 0;
                var current_year_rev = 0;
                let year_target = 1000;

                for (let i = 1; i <= current_month; i++) {

                    this.ordersSumCY = 0;
                    this.ordersSumLY = 0;
                    orders.forEach((element) => {

                        if (i == parseInt(element.created_at.substr(5, 2))) {
                            if (current_year == parseInt(element.created_at.substr(0, 4))) {
                                //per il costo di delievery wtf this shit gives me some bug if I comment it
                                element.total_price -= this.delivery;
                                this.ordersSumCY += element.total_price;

                                //get current month value 
                                if (i === current_month) {
                                    current_month_revenue = this.ordersSumCY;
                                }
                            } else if (last_year == parseInt(element.created_at.substr(0, 4))) {
                                element.total_price -= this.delivery;
                                this.ordersSumLY += element.total_price;
                            }
                        }

                    });

                    //get highest income in a month
                    if (this.max_in_monthCY < this.ordersSumCY) {
                        this.max_in_monthCY = this.ordersSumCY
                    }

                    //get highest income in a month Last Year
                    if (this.max_in_monthLY < this.ordersSumLY) {
                        this.max_in_monthLY = this.ordersSumLY
                    }


                    this.ordersPerMonthCY.push(this.ordersSumCY);
                    this.ordersPerMonthLY.push(this.ordersSumLY);

                    //sum current year value
                    if (this.ordersSumCY > 0) {
                        current_year_rev += this.ordersSumCY;
                    }
                }
                this.year_target_progress = Math.floor(current_year_rev / year_target * 100);


                //max value on y axis - round up to multiple of 20
                this.max_noCY = Math.round(((this.max_in_monthCY + (this.max_in_monthCY / 100 * 20)) + 20 / 2) / 20) * 20;
                this.max_noLY = Math.round(((this.max_in_monthLY + (this.max_in_monthLY / 100 * 20)) + 20 / 2) / 20) * 20;


                // if(this.checked == true){
                //     // this.changeLY();
                //     this.ordersPerMonth = this.ordersPerMonthLY;
                //     this.max_no = this.max_noLY;
                // }else if(this.checked == false){
                //     // this.changeCY();
                //     this.ordersPerMonth = this.ordersPerMonthCY;
                //     this.max_no = this.max_noCY;
                // }
                this.ordersPerMonth = this.ordersPerMonthCY;
                this.max_no = this.max_noCY;

                //CURRENT YEAR DATA
                var cdata = {
                    labels: ['gen', 'feb', 'mar', 'apr', 'mag', 'giu', 'lug', 'ago', 'set', 'ott', 'nov', 'dic'],
                    datasets: [{
                        label: 'Tutti i ristoranti',
                        data: this.ordersPerMonth,
                        backgroundColor: [
                            // 'rgba(54, 162, 235, 0.8)',
                            // 'rgba(255, 206, 86, 0.8)',
                            'rgba(229, 56, 59, 0.8)'
                        ],
                        borderColor: 'rgba(229, 56, 59, 0.8)',
                    }]
                };
                var config = {
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
                                max: this.max_no,
                            },
                        }
                    }
                };

                //CURRENT YEAR DATA
                var cdataCY = {
                    labels: ['gen', 'feb', 'mar', 'apr', 'mag', 'giu', 'lug', 'ago', 'set', 'ott', 'nov', 'dic'],
                    datasets: [{
                        label: 'Tutti i ristoranti',
                        data: this.ordersPerMonth,
                        backgroundColor: [
                            // 'rgba(54, 162, 235, 0.8)',
                            // 'rgba(255, 206, 86, 0.8)',
                            'rgba(229, 56, 59, 0.8)'
                        ],
                        borderColor: 'rgba(229, 56, 59, 0.8)',
                    }]
                };

                //-------LAST YEAR DATA----------
                const cdataLY = {
                    labels: ['gen', 'feb', 'mar', 'apr', 'mag', 'giu', 'lug', 'ago', 'set', 'ott', 'nov', 'dic'],
                    datasets: [{
                        label: 'Tutti i ristoranti',
                        data: this.ordersPerMonthLY,
                        backgroundColor: [
                            // 'rgba(54, 162, 235, 0.8)',
                            // 'rgba(255, 206, 86, 0.8)',
                            'rgba(229, 56, 59, 0.8)'
                        ],
                        borderColor: 'rgba(229, 56, 59, 0.8)',
                    }]
                };
                const configLY = {
                    type: 'line',
                    data: cdataLY,
                    options: {
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                            },
                            y: {
                                max: this.max_noLY,
                            },
                        }
                    }
                };
                //-------END LAST YEAR DATA----------

                //controllo when target reached

                //dati in cards
                document.getElementById('month_record').innerHTML = this.max_in_monthCY;
                document.getElementById('current_month_revenue').innerHTML = current_month_revenue;
                document.getElementById('current_year_revenue').innerHTML = current_year_rev;
                document.getElementById('year_target').innerHTML = year_target.toLocaleString();
                document.getElementById('year_target_progress').innerHTML = this.year_target_progress;
                document.getElementById('year_target_progress_style').style.width = this.year_target_progress + '%';

                if(this.year_target_progress >= 100){
                    document.getElementById("checkTarget").classList.remove('fa-times-circle');
                    document.getElementById("TargetSainato").classList.add('sainato-approved');
                    // document.getElementById("checkTarget").classList.add('fa-check-circle');    
                }


                //get the chart from
                let ctx = document.getElementById('myAreaChart').getContext('2d');
                var myChart = new Chart(ctx, config);

                //change YEAR in CHART
                document.getElementById('changeCY').onclick = function () {

                    cdata.datasets = cdataCY.datasets;

                    myChart.update();
                };
                
                document.getElementById('changeLY').onclick = function () {

                    cdata.datasets = cdataLY.datasets;

                    myChart.update();
                };

            })
            .catch((er) => {
                alert("Can't load gross revenue chart");
            });


        //grafico per numero ordini
        axios
            .get(`http://127.0.0.1:8000/api/statistics/${user_id}`)
            .then((response) => {

                this.ordersPerMonth = [];
                let orders = response.data;
                this.max_no_order = 0;
                this.max_in_monthLY = 0;
                let stepSize = 0;
                let today = new Date();
                let current_month = today.getMonth() + 1;
                let current_year = today.getFullYear();
                let last_year = current_year - 1;

                for (let i = 1; i <= current_month; i++) {

                    let ordersSum = 0;
                    this.ordersSumLY = 0;

                    orders.forEach((element) => {

                        if (i == parseInt(element.created_at.substr(5, 2))) {
                            if (current_year == parseInt(element.created_at.substr(0, 4))) {
                                ordersSum++;
                            } else if ((last_year) == parseInt(element.created_at.substr(0, 4))) {
                                this.ordersSumLY++;
                            }
                        }

                    });

                    //get highest income in a month
                    if (this.max_in_month_orders < ordersSum) {
                        this.max_in_month_orders = ordersSum
                    }

                    this.ordersPerMonth.push(ordersSum);

                }

                //max value on y axis - round up to multiple of 5
                this.max_no_order = Math.round((this.max_in_month_orders + 5 / 2) / 5) * 5;

                //to prevent decimal numbers
                if (this.max_no_order == 5) {
                    stepSize = this.max_no_order / 5;
                }

                //CURRENT YEAR DATA
                const cdata = {
                    labels: ['gen', 'feb', 'mar', 'apr', 'mag', 'giu', 'lug', 'ago', 'set', 'ott', 'nov', 'dic'],
                    datasets: [{
                        label: 'Tutti i ristoranti',
                        data: this.ordersPerMonth,
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
                                max: this.max_no_order,
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


    },
});
