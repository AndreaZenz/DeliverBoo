<?php

use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', "RestaurantController@index")->name("restaurants.index");
Route::get('/restaurants/{id}', "RestaurantController@show")->name("restaurants.show");
Route::get('/dishes', "DishController@index")->name("dishes.index");
Route::get('/restaurants/{restaurant}/dishes/{dish}', "DishController@show")->name("dishes.show");

Auth::routes();

Route::resource("/restaurants", "RestaurantController");
// Route::resource("/dishes", "DishController");


Route::get('/payment', 'PaymentController@index')->name('payment.index');

Route::post('payment/checkout', 'PaymentController@checkout')->name('payment.checkout');


Route::prefix('admin')
    ->namespace('admin')
    ->middleware('auth')
    ->name("admin.")
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home_login');
        Route::get('/types', 'TypeController@index')->name('types.index');
        Route::get("/restaurants/filter", "RestaurantsController@filter")->name("restaurants.filter");

        
        //Route::resource("/orders", "OrderController");
        Route::get('orders', 'OrderController@index')->name('orders');
        Route::get('/statistics', 'StatisticsController@index')->name('statistics');
        
        
        Route::resource("/users", "UserController");
        Route::resource("/restaurants", "RestaurantsController");
        
        Route::resource('restaurants.dishes', "DishController");
        
        
        //Route::resource("/statistics", "StatisticController");
        //Route::resource("/dishes", "DishController");
        //completamente rifatta
        

});
