<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
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

Route::get('services', 'ServiceController@index')->name('services.index');

Route::get('services/create', 'ServiceController@create')->name('services.create');

Route::get('services/active', 'ServiceController@active')->name('services.active');

Route::get('services/{service}', 'ServiceController@show')->name('services.show');

Route::get('services/{service}/edit', 'ServiceController@edit')->name('services.edit');

Route::get('/', 'PanelController@index')->name('panel.index');

Route::get('users', 'UserController@index')->name('users.index');

/**
 * POST
 */
Route::post('services', 'ServiceController@store')->name('services.store');

Route::post('users/admin/{user}', 'UserController@toggleAdmin')->name('users.admin.toggle');

/**
 * PUT OR PATCH
 */
Route::match(['put', 'patch'],'services/{service}/edit', 'ServiceController@update')->name('services.update');

/**
 * DELETE
 */
Route::delete('services/{service}', 'ServiceController@destroy')->name('services.destroy');
