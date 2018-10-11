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

<<<<<<< HEAD
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/description', 'DescriptionController@index');
=======
Route::get('/account','AccountController@index');

Route::group(['middleware' => 'auth'], function() {
>>>>>>> e90e7f9925599bb633b5e9a1dc9aa36f04b2f43d
    Route::get('/cart', 'CartController@index');
Route::group(['middleware' => 'auth'], function() {

});

Auth::routes();
