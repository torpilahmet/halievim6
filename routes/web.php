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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function (){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
//    Route::resource('roles','RoleController');
    Route::get('products/export/', 'CustomerController@export')->name('products.export');
    Route::resource('products','ProductController');

    Route::resource('users','UserController');
    Route::get('customers/export/', 'CustomerController@export')->name('customers.export');
    Route::post('customers/import/', 'CustomerController@import')->name('customers.import');
    Route::resource('customers','CustomerController');
    Route::get('carts/export/', 'CustomerController@export')->name('carts.export');
    Route::resource('carts','CartController')->only([
        'store', 'update', 'destroy'
    ]);
    Route::resource('orders','OrderController');
//    Route::resource('settings','SettingsController');
//
//    Route::get('/activities/clean', 'ActivityController@clean')->name('activity.clean');
//
//    Route::resource('activities','ActivityController');
});
