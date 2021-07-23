<?php

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


Route::get('/', 'HomeController@index')->name('homepage');

Auth::routes();

Route::resource("/restaurants", "RestaurantController");
Route::resource("/dishes", "DishController");

Route::resource("/orders", "OrderController");

Route::resource("/types", "TypeController");



Route::prefix('admin')
    ->namespace('admin')
    ->middleware('auth')
    ->name("admin.")
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home_login');

        //Route::get('/types', 'TypeController@index')->name('types.index');
        
        //Genera tutte le rotte necessarie per la crud dei posts
        Route::resource("/orders", "OrderController");

        //Route::resource("/statistics", "StatisticController");

        //Route::get("/posts/filter", "PostController@filter")->name("posts.filter");
        Route::resource("/users", "UserController");

        Route::resource("/restaurants", "RestaurantsController");
        Route::resource("/dishes", "DishController");
});
