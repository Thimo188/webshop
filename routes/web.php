<?php

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

Route::get('/', function () { return view('homepage'); });
Route::get('/cart', 'CartController@index');


Route::get('/photography', function () { return view('photography'); });

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/description', 'DescriptionController@index');
Route::get('/admin', 'AdminController@index');

Route::get('upload', 'UploadController@index');
Route::get('/sidemenu', 'SidemenuController@index');

Route::get('/cart', 'CartController@index');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/account','AccountController@index');
    Route::get('/subscription','SubscriptionController@index');
    Route::get('/statistics', 'StatisticsController@index');


Route::group(['middleware' => 'auth'], function() {

});

Auth::routes();
