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

Route::get('/', 'HomeController@index');
Route::get('/frontend', 'FrontendController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# ProductController
Route::get('/products/{id}', ['as' => 'products.show', 'uses' => 'ProductController@show']);

# CartController
Route::get('/carts', ['as' => 'carts.index', 'uses' => 'CartController@index']);
Route::post('/carts', ['as' => 'carts.store', 'uses' => 'CartController@store']);
Route::get('/carts/count', ['as' => 'carts.count', 'uses' => 'CartController@count']);
Route::put('/carts/{id}', ['as' => 'carts.update', 'uses' => 'CartController@update']);
Route::delete('/carts/{id}', ['as' => 'carts.delete', 'uses' => 'CartController@destroy']);

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', 'DashboardController');

    # ProductController
    Route::get('/products', ['as' => 'products.index', 'uses' => 'ProductController@index']);
    Route::get('/products/create', ['as' => 'products.create', 'uses' => 'ProductController@create']);
    Route::post('/products', ['as' => 'products.store', 'uses' => 'ProductController@store']);
    Route::get('/products/{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductController@edit']);
    Route::put('/products/{id}', ['as' => 'products.update', 'uses' => 'ProductController@update']);
    Route::delete('/products/{id}', ['as' => 'products.destroy', 'uses' => 'ProductController@destroy']);
    Route::get('/products/{id}', ['as' => 'products.show', 'uses' => 'ProductController@show']);

    # CategoryController
    Route::get('/categories', ['as' => 'categories.index', 'uses' => 'CategoryController@index']);
    Route::get('/categories/create', ['as' => 'categories.create', 'uses' => 'CategoryController@create']);
    Route::post('/categories', ['as' => 'categories.store', 'uses' => 'CategoryController@store']);
    Route::get('/categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoryController@edit']);
    Route::put('/categories/{id}', ['as' => 'categories.update', 'uses' => 'CategoryController@update']);
    Route::delete('/categories/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoryController@destroy']);
    Route::get('/categories/{id}', ['as' => 'categories.show', 'uses' => 'CategoryController@show']);

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

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Done';
});
