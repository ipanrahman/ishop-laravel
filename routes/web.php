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

Route::name('admin.')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'Admin\DashboardController');
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
    # RoleController
    Route::get('role', ['as' => 'role.index','uses' => 'Admin\RoleController@index']);
    Route::get('role/datatables', ['as' => 'role.datatables', 'uses' => 'Admin\RoleController@dataTables']);
    Route::get('role/show/{id}', ['as' => 'role.show', 'uses' => 'Admin\RoleController@show']);
    Route::get('role/create', ['as' => 'role.create', 'uses' => 'Admin\RoleController@create']);
    Route::post('role/create', ['as' => 'role.store', 'uses' => 'Admin\RoleController@store']);
    Route::get('role/edit/{id}', ['as' => 'role.edit', 'uses' => 'Admin\RoleController@edit']);
    Route::put('role/update/{id}', ['as' => 'role.update', 'uses' => 'Admin\RoleController@update']);
    Route::get('role/delete/{id}', ['as' => 'role.delete', 'uses' => 'Admin\RoleController@destroy']);
    Route::resource('role','Admin\RoleController');

# MenuController
    Route::get('menu', ['as' => 'menu.index','uses' => 'Admin\MenuController@index']);
    Route::get('menu/datatables', ['as' => 'menu.datatables', 'uses' => 'Admin\MenuController@dataTables']);
    Route::get('menu/show/{id}', ['as' => 'menu.show', 'uses' => 'Admin\MenuController@show']);
    Route::get('menu/create', ['as' => 'menu.create', 'uses' => 'Admin\MenuController@create']);
    Route::post('menu/create', ['as' => 'menu.store', 'uses' => 'Admin\MenuController@store']);
    Route::get('menu/edit/{id}', ['as' => 'menu.edit', 'uses' => 'Admin\MenuController@edit']);
    Route::put('menu/edit/{id}', ['as' => 'menu.update', 'uses' => 'Admin\MenuController@update']);
    Route::get('menu/delete/{id}', ['as' => 'menu.delete', 'uses' => 'Admin\MenuController@destroy']);
    Route::resource('menu','Admin\MenuController');

# UserController
    Route::get('user', ['as' => 'user.index','uses' => 'Admin\UserController@index']);
    Route::get('user/datatables', ['as' => 'user.datatables', 'uses' => 'Admin\UserController@dataTables']);
    Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => 'Admin\UserController@show']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'Admin\UserController@create']);
    Route::post('user/create', ['as' => 'user.store', 'uses' => 'Admin\UserController@store']);
    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'Admin\UserController@edit']);
    Route::put('user/update/{id}', ['as' => 'user.update', 'uses' => 'Admin\UserController@update']);
    Route::get('user/delete/{id}', ['as' => 'user.delete', 'uses' => 'Admin\UserController@destroy']);
    Route::resource('user','Admin\UserController');

