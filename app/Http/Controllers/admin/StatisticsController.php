<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Dish;
use App\Type;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Query;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\VarDumper\Cloner\Data;

class StatisticsController extends Controller
{
    //prendo i dati dal DB con il Controller per mandarli allo script in js che usera' ajax
    function index()
    {

        $user_id = Auth::user()->id;

        //seleziona i ristoranti del User
        $restaurants = Restaurant::where('user_id', $user_id)->orderBy('name', 'asc')->get();


        /*
            seleziona tutti gli ordini di tutti i ristoranti di un User
            SELECT * FROM `orders` JOIN restaurants on orders.restaurant_id = restaurants.id
            WHERE restaurants.id = users.id
        */
        $orders = DB::table('orders')
            ->join('restaurants', 'orders.restaurant_id', '=', 'restaurants.id')
            ->select('orders.*')
            ->orderBy('created_at', 'ASC')
            ->where('restaurants.user_id', '=', $user_id)
            ->get();

        //dump(compact('orders', 'restaurants'));
        //return view("admin.statistics", compact('orders', 'restaurants'));
        //die();


        // $chart = Charts::database($users, 'bar', 'highcharts')
        //     ->title("Monthly new Register Users")
        //     ->elementLabel("Total Users")
        //     ->dimensions(1000, 500)
        //     ->responsive(false)
        //     ->groupByMonth(date('Y'), true);

        //return view("admin.statistics", compact('orders', 'restaurants'));

        // $orders = $user->orders;

        dump(compact('user_id', 'orders', 'restaurants'));
        return view('admin.statistics', compact('user_id', 'orders', 'restaurants'));
    }

    function getRestaurantOrders()
    {

        $user_id = Auth::user()->id;

        //seleziona i ristoranti del User
        $restaurants = Restaurant::where('user_id', $user_id)->orderBy('name', 'asc')->get();


        /*
            seleziona tutti gli ordini di tutti i ristoranti di un User
            SELECT * FROM `orders` JOIN restaurants on orders.restaurant_id = restaurants.id
            WHERE restaurants.id = users.id
        */
        $orders = DB::table('orders')
            ->join('restaurants', 'orders.restaurant_id', '=', 'restaurants.id')
            ->select('orders.*')
            ->orderBy('created_at', 'ASC')
            ->where('restaurants.user_id', '=', $user_id)
            ->pluck('created_at');

        //dump(compact('orders', 'restaurants'));
        //die();


        // $chart = Charts::database($users, 'bar', 'highcharts')
        //     ->title("Monthly new Register Users")
        //     ->elementLabel("Total Users")
        //     ->dimensions(1000, 500)
        //     ->responsive(false)
        //     ->groupByMonth(date('Y'), true);

        //return view("admin.statistics", compact('orders', 'restaurants'));
        return $orders;
    }

    function getAllMonths()
    {

        $month_array = array();
        //$orders_dates = Order::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
        $orders_dates = $this->getRestaurantOrders();
        $orders_dates = json_decode($orders_dates);
        // dump($orders_dates);
        if (!empty($orders_dates)) {
            foreach ($orders_dates as $unformatted_date) {
                $date = new \DateTime($unformatted_date);

                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_no] = $month_name;
            }
        }

        return $month_array;
    }

    function getMonthlyOrderCount($month)
    {
        $monthly_order_count = Order::whereMonth( 'created_at', $month )->get()->count();
		return $monthly_order_count;
    }

    function getMonthlyOrderCountArray()
    {
        // $monthly_post_count = Post::whereMonth( 'created_at', $month )->get()->count();


        $user_id = Auth::user()->id;

        $orders = DB::table('orders')
            ->join('restaurants', 'orders.restaurant_id', '=', 'restaurants.id')
            ->select('orders.*')
            ->orderBy('created_at', 'ASC')
            ->where('restaurants.user_id', '=', $user_id)
            ->pluck('created_at');

        // dump(json_decode($orders));

        $month_no_array = [];

        foreach ($orders as $orders) {
            $date = new \DateTime($orders);

            $month_no = $date->format('m');
            
            array_push($month_no_array, $month_no);
        }
        
        $month_no_array_count = array_count_values($month_no_array);

        return $month_no_array_count;
    }

    function getMonthlyOrderData()
    {

        $monthly_order_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $monthly_order_count = $this->getMonthlyOrderCount($month_no);
                array_push($monthly_order_count_array, $monthly_order_count);
                array_push($month_name_array, $month_name);
            }
        }
        $monthly_order_count_array = $this->getMonthlyOrderCountArray();
        $max_no = max($monthly_order_count_array);
        $max = round(($max_no + 10 / 2) / 10) * 10;  //arrotondo per eccesso in multipli di 10

        $monthly_order_data_array = array(
            'months' => $month_name_array,
            'order_count_data' => $monthly_order_count_array,
            'max' => $max,
        );

        $months = $month_name_array;
        $order_count_data = $monthly_order_count_array;
        $max = $max;
        //dump(compact('months', 'order_count_data', 'max', 'max_no'));
        
        return view("admin.statistics", compact('months', 'order_count_data', 'max', 'max_no'));
    }
}
