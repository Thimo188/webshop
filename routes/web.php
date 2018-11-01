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

Route::get('/cart', 'CartController@index');

Route::get('/photography', 'PhotographyController@index');
Route::get('/illustrations', 'IllustrationsController@index');
Route::get('/3DArt', 'ThreeDArtController@index');

Route::get('/', 'HomepageController@index');

Route::get('/shipping', 'ShippingController@index');
Route::resource('/description', 'HomepageController');
Route::get('/addToCart/{id}', 'CartController@Create');
Route::get('/cart/remove/{id}', 'CartController@Destroy');

// WISHLIST
Route::resource('/wishlist', 'WishlistController');
Route::get('/addToWishlist/{id}', 'WishlistController@store')->name('wishlist.add');
Route::get('/removeWishlist/{id}', 'WishlistController@destroy')->name('wishlist.destroy');

Route::get('/ordersadmin', 'Ordersadmin@index');
Route::get('/sidemenu', 'SidemenuController@index');
Route::get('/account','AccountController@index');
Route::get('/cart', 'CartController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/account','AccountController@index');
    Route::get('/subscription','SubscriptionController@index');
    Route::get('/statistics', 'StatisticsController@index');
    Route::get('/upload', 'UploadController@index');
    Route::post('/upload', 'UploadController@store');
});
Route::group(['middleware' => 'admin'], function() {
	Route::get('/admin', 'AdminController@index');
});
Auth::routes();
