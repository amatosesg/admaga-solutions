<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** 
 * GET
*/
Route::get('/', 'MainController@index')->name('main');

Route::get('home', 'HomeController@index')->name('home');

Route::get('pricing', 'PricingController@index')->name('pricing.index');

Route::get('carts', 'CartController@index')->name('carts.index');

Route::get('orders/create', 'OrderController@create')->name('orders.create')->middleware(['verified']);

Route::get('orders/{order}/payments/create', 'OrderPaymentController@create')->name('orders.payments.create')->middleware(['verified']);

Route::get('profile', 'ProfileController@edit')->name('profiles.edit');

Route::get('profile/history', 'ProfileController@history')->name('profiles.history');

Route::get('profile/services', 'ProfileController@services')->name('profiles.services');

Route::get('profile/configure', 'ProfileController@configure')->name('profiles.configure.services')->middleware(['verified']);

Route::get('enterprise/{order}', 'EnterpriseController@show')->name('enterprises.show')->middleware(['verified']);

/**
 * POST
 */
Route::post('services/{service}/carts', 'ServiceCartController@store')->name('services.carts.store');

Route::post('orders', 'OrderController@store')->name('orders.store')->middleware(['verified']);

Route::post('enterprise', 'EnterpriseController@store')->name('enterprise.store')->middleware(['verified']);

Route::post('orders/{order}/payments', 'OrderPaymentController@store')->name('orders.payments.store')->middleware(['verified']);

/**
 * PUT OR PATCH
 */
Route::match(['put', 'patch'], 'profile', 'ProfileController@update')->name('profiles.update');

// Route::match(['put', 'patch'], 'profile/setup/services', 'ProfileController@setup')->name('profiles.setup.services')->middleware(['verified']);

/**
 * DELETE
 */
Route::delete('services/{service}/carts/{cart}', 'ServiceCartController@destroy')->name('services.carts.destroy');


/**
 * AUTH ROUTES
 */
Auth::routes(['verify' => true]);