<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/app')->group(function () {
    Route::resource('/category', 'CategoryController');
    Route::resource('/pizza', 'PizzaController');
    Route::resource('/cart', 'CartController');
    Route::resource('/order', 'OrderController');
    Route::resource('/topping', 'ToppingController');

     
});