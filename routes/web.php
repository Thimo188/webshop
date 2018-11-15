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
Route::get('/', 'HomepageController@index')->name('home');
Route::get('/photography/colors/{color}/{categoryid}', 'FilterController@index');
Route::get('/illustrations/colors/{color}/{categoryid}', 'FilterController@illustrations');
Route::get('/3DArt/colors/{color}/{categoryid}', 'FilterController@ThreeDArt');

//Orders
Route::resource('/address', 'AddressController');
Route::post('/payment/create', 'PaymentController@createPayment')->name('payments.create');
Route::get('/payment/thankyou/{ordernumber}', 'AddressController@finishPayment')->name('payments.end');
Route::post('/payment/finish', 'AddressController@mollieWebhook')->name('webhooks.mollie');


Route::resource('/description', 'HomepageController');
// Cart pages
Route::get('/addToCart/{id}', 'CartController@Create');
Route::get('/cart/remove/{id}', 'CartController@Destroy');
Route::post('/cart/edit', 'AjaxController@updateCart');

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
	Route::get('/orders/show', 'AccountController@showOrders')->name('orders.show');
});

//Route::get('/search', function (Request $request) {
  //  return App\Product::search($request->search)->get();
//});

Route::get('/search',          'SearchController@search')->name('search');
Route::get('/product/{id}',  'SearchController@product');



Route::group(['middleware' => 'admin'], function() {
	Route::get('/admin', 'AdminController@index');
});
Auth::routes();
