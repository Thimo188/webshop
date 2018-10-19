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

Route::get('/', 'HomepageController@index');

Route::get('/cart', 'CartController@index');


Route::get('/photography', 'PhotographyController@index');

Route::get('/', 'HomepageController@index')->name('home');

Route::get('/admin', 'AdminController@index');
Route::resource('/description', 'HomepageController');
Route::get('/addToCart/{id}', 'CartController@Create');
Route::get('/cart/remove/{id}', 'CartController@Destroy');
Route::get('/wishlist', 'WishlistController@index');
Route::get('upload', 'UploadController@index');
Route::get('/ordersadmin', 'Ordersadmin@index');
Route::get('/sidemenu', 'SidemenuController@index');
Route::get('/account','AccountController@index');
Route::get('/cart', 'CartController@index');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/account','AccountController@index');
    Route::get('/subscription','SubscriptionController@index');
    Route::get('/statistics', 'StatisticsController@index');



});

Auth::routes();
