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
Route::get('/admin', function () {
    return view('admin/index');
})->middleware('checklogin::class');
Route::get('/admin/add_product', 'Admin\AdminProductController@create');
Route::patch('/admin/add_product', 'Admin\AdminProductController@store');
Route::get('/admin/list_product', 'Admin\AdminProductController@index');
Route::get('/admin/detail_product/{id}', 'Admin\AdminProductController@show');
Route::get('/admin/update_product/{id}', 'Admin\AdminProductController@edit');
Route::patch('/admin/update_product/{id}', 'Admin\AdminProductController@update');
Route::delete('/admin/delete_product/{id}', 'Admin\AdminProductController@destroy');