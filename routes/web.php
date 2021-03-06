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

Route::get('/', 'Auth\LoginController@showLoginForm');



Auth::routes();

Route::group(['middleware' => ['auth', 'permission_clearance']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('users','UserController');
    Route::resource('courier','CourierController');
    Route::resource('consignee','ConsigneeController');

    Route::get('allRoles', 'RoleController@allRoles')->name('allRoles');
    Route::get('allUsers', 'UserController@allUsers')->name('allUsers');
    Route::get('allConsignees', 'ConsigneeController@allConsignees')->name('allConsignees');
    Route::get('getAllPermissions', 'PermissionController@getAllPermissions')->name('getAllPermissions');

    // CRM Routes
    Route::resource('accounts', 'Account\AccountsController');
    Route::get('/list', 'Account\AccountsController@list')->name('accounts.list');

    // Sales Person
    Route::resource('sales', 'Account\SalesController');
    Route::get('/allSales', 'Account\SalesController@allSales')->name('allSales');

    //Product routes
    Route::resource('products', 'Product\ProductController');
    Route::get('/allProducts', 'Product\ProductController@allProducts')->name('allProducts');

});
