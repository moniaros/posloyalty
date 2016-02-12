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
});

Route::group(['middleware' => ['web', 'auth']], function () {
//Route::group(['middleware' => ['web']], function () {
    Route::get('/', "DashboardController@index");

    Route::resource('rewards', "RewardsController");
});

Route::group(['middleware' => ['web']], function () {
    Route::get('products', 'ProductsController@products');
    Route::get('rewards', 'RewardsController@index');
});
