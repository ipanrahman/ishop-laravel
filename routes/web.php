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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/images/{filename}');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', 'DashboardController');

    # ProductController
    Route::get('/products', ['as' => 'products.index', 'uses' => 'ProductController@index']);
    Route::get('/products/create', ['as' => 'products.create', 'uses' => 'ProductController@create']);

    # OrderController
    Route::get('/orders', ['as' => 'orders.index', 'uses' => 'OrderController@index']);
    Route::get('/orders/create', ['as' => 'orders.create', 'uses' => 'OrderController@create']);

    # RoleController
    Route::get('role', ['as' => 'role.index', 'uses' => 'RoleController@index']);
    Route::get('role/datatables', ['as' => 'role.datatables', 'uses' => 'RoleController@dataTables']);
    Route::get('role/show/{id}', ['as' => 'role.show', 'uses' => 'RoleController@show']);
    Route::get('role/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
    Route::post('role/create', ['as' => 'role.store', 'uses' => 'RoleController@store']);
    Route::get('role/edit/{id}', ['as' => 'role.edit', 'uses' => 'RoleController@edit']);
    Route::put('role/update/{id}', ['as' => 'role.update', 'uses' => 'RoleController@update']);
    Route::get('role/delete/{id}', ['as' => 'role.delete', 'uses' => 'RoleController@destroy']);
    Route::resource('role', 'RoleController');

    # MenuController
    Route::get('menu', ['as' => 'menu.index', 'uses' => 'MenuController@index']);
    Route::get('menu/datatables', ['as' => 'menu.datatables', 'uses' => 'MenuController@dataTables']);
    Route::get('menu/show/{id}', ['as' => 'menu.show', 'uses' => 'MenuController@show']);
    Route::get('menu/create', ['as' => 'menu.create', 'uses' => 'MenuController@create']);
    Route::post('menu/create', ['as' => 'menu.store', 'uses' => 'MenuController@store']);
    Route::get('menu/edit/{id}', ['as' => 'menu.edit', 'uses' => 'MenuController@edit']);
    Route::put('menu/edit/{id}', ['as' => 'menu.update', 'uses' => 'MenuController@update']);
    Route::get('menu/delete/{id}', ['as' => 'menu.delete', 'uses' => 'MenuController@destroy']);
    Route::resource('menu', 'MenuController');

    # UserController
    Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
    Route::get('user/datatables', ['as' => 'user.datatables', 'uses' => 'UserController@dataTables']);
    Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => 'UserController@show']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::post('user/create', ['as' => 'user.store', 'uses' => 'UserController@store']);
    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    Route::put('user/update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
    Route::get('user/delete/{id}', ['as' => 'user.delete', 'uses' => 'UserController@destroy']);
});

Route::get('public', 'PublicController@index');
Route::get('show/{id}', 'PublicController@show');
Route::get('public/image/{imageName}', 'PublicController@image');

Route::post('review', 'PublicController@store')->name('review.store');

Route::get('carts', 'CartController@index')->name('carts.index');
Route::get('carts/add/{id}', 'CartController@add')->name('carts.add');
Route::patch('carts/update', 'CartController@update')->name('carts.update');
Route::delete('carts/remove', 'CartController@remove')->name('carts.remove');
