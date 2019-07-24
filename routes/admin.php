<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Admin!
|
/**
* Guest Route
*/

Route::get('/', [
    'as' => 'admin.dashboard.index',
    'uses' => 'DashboardController@index'
]);

Route::get('showLoginForm', [
    'as' => 'admin.Login.showLoginForm',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::post('login', [
    'as' => 'admin.Login.login',
    'uses' => 'Auth\LoginController@login'
]);

Route::post('logout', [
    'as' => 'admin.Login.logout',
    'uses' => 'Auth\LoginController@logout'
]);


Route::resource('products', 'ProductController', [
    'as' => 'admin',
    'parameters' => ['products' => 'id']
]);

Route::resource('users', 'UserController', [
    'as' => 'admin',
    'parameters' => ['user' => 'id']
]);

Route::resource('categories', 'CategoryController', [
    'as' => 'admin',
    'parameters' => ['categories' => 'id']
]);

Route::get('orders/processed', [
    'as' => 'admin.orders.processed',
    'uses' => 'OrderController@processed'
]);

Route::resource('orders', 'OrderController', [
    'as' => 'admin',
    'parameters' => ['orders' => 'id']
]);


