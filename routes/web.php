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
  return redirect('/login');
});
Route::get('/users','UserController@index');
Route::get('/users/create','UserController@create')->name('users.create');
Route::post('/users/store','UserController@store')->name('users.store');
Route::get('/users/{id}/edit','UserController@edit')->name('users.edit');
Route::get('/users/{id}/delete','UserController@delete')->name('users.delete');

Route::patch('/users/{id}/update','UserController@update')->name('users.update');
Route::delete('/users/{id}/delete','UserController@delete')->name('users.delete');

Route::resource('suppliers','SupplierController');
Route::resource('stocks','StockController');
Route::resource('customers','CustomersController');
Route::resource('products','ProductsController');
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');
Route::resource('purchases','PurchaseController');
Route::resource('sales','SalesController');
Route::post('/product/search','ProductsController@search')->name('autocomplete');
Route::post('/addsale','SalesController@addsale')->name('addtosale');
Route::get('/sale','SalesController@index')->name('sales');
Route::get('/customer/search/{id}','CustomersController@getbyuserid');
Auth::routes();
Route::resource('roles','RoleController');
Route::get('/plreport','ReportController@viewplreport');
Route::get('/salereport','ReportController@salereport');
Route::get('/purchasereport','ReportController@purchasereport');
Route::get('/home', 'HomeController@index')->name('home');