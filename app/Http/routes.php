<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

//Route::get('public/js/company.js', function() {
//    return 'bisaya';
//});

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', "Auth\AuthController@getLogin");
    Route::post('/user/login', "UsersController@login");
    Route::post('/auth/login', "Auth\AuthController@postLogin");
    Route::get('/auth/logout', "Auth\AuthController@getLogout");

    Route::get('stores/nodevice', 'StoresController@withoutDevice');
});

Route::group(['middleware' => ['web', 'auth']], function () {
//Route::group(['middleware' => ['web']], function () {
    Route::get('/', "SalesController@index");
    Route::resource('stores', "StoresController");
    Route::get('stores/{id}/delete', "StoresController@delete");
    Route::resource('rewards', "RewardsController");
    Route::resource('customers', "CustomersController");
    Route::post('promo', 'PromoController@store');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('products', 'ProductsController@products');
    Route::get('rewards', 'RewardsController@index');
    Route::get('promo', 'PromoController@index');
    Route::get('promo/json', 'PromoController@json');

    Route::post('stores/{id}/device/register', 'StoresController@registerDevice');
    Route::post('stores/{id}/device/test', 'StoresController@registerDevice');

    Route::post('customers', "CustomersController@store");
});
