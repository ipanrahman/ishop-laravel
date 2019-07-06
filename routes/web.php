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

Route::get('/', 'PublicController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/images/{filename}');

Route::name('admin.')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('products', 'Admin\ProductController');
        Route::resource('orders', 'Admin\OrderController');
    });
});

Route::get('public', 'PublicController@index');
Route::get('show/{id}', 'PublicController@show');
Route::get('public/image/{imageName}', 'PublicController@image');

Route::post('review', 'PublicController@store')->name('review.store');

Route::get('carts', 'CartController@index')->name('carts.index');
Route::get('carts/add/{id}', 'CartController@add')->name('carts.add');
Route::patch('carts/update', 'CartController@update')->name('carts.update');
Route::delete('carts/remove', 'CartController@remove')->name('carts.remove');

Route::get('/latihan', function () {

    return view('latihan.index');
});
