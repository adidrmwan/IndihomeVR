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

// Route::get('users','FirebaseController@index');

Route::get('/produk','ProdukController@index')->name('produk');
Route::post('/produk','ProdukController@store')->name('produk.store');

Route::get('/user','UserController@index')->name('user');
Route::post('/user','UserController@store')->name('user.store');



