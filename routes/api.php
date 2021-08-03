<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/restaurants", "Api\RestaurantController@index");
Route::get("/restaurants/filter", "Api\RestaurantController@filter");
Route::get("/restaurant/{id}", "Api\RestaurantController@restaurantShow");
Route::get("/types", "Api\TypeController@index");
Route::get('/statistics/{id}', 'Api\StatisticsController@restaurantOrders');