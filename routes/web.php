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
    return view('admin.master');
});
Route::get('/users','UserController@index');
Route::get('/users/create','UserController@create')->name('users.create');
Route::post('/users/store','UserController@store')->name('users.store');
Route::get('/users/{id}/edit','UserController@edit')->name('users.edit');
Route::get('/users/{id}/delete','UserController@delete')->name('users.delete');

Route::patch('/users/{id}/update','UserController@update')->name('users.update');
Route::delete('/users/{id}/delete','UserController@delete')->name('users.delete');

Route::resource('suppliers','SupplierController');
Route::resource('customers','CustomersController');
Route::resource('products','ProductsController');
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');
Route::resource('purchases','PurchaseController');
Route::resource('sales','SalesController');
Route::post('/product/search','ProductsController@search');