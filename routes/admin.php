<?php

use Illuminate\Support\Facades\Route;

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
Route::group([ 'namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin' ],function(){

    // login routes
    Route::get('login', 'AuthController@login')->name('admin/login');
    Route::post('login', 'AuthController@check_login')->name('admin/check-login');
    
    Route::get('/home', 'HomeController@home')->name('admin/index');
    // Route::group(['middleware' => 'auth:admin'],function(){

        Route::get('admins/info/{id}', 'AdminController@info')->name('admins/info');
        Route::post('admins/info-update{id}', 'AdminController@info_update')->name('admins/info-update');
        Route::post('admins/change-password/{id}', 'AdminController@change_password')->name('admins/change-password');

        Route::post('admins/getMore', 'AdminController@getMore')->name('admin/getMore');
        Route::post('admins/search', 'AdminController@search')->name('admin/search');

        Route::get('logout', 'AuthController@logout')->name('admin/logout');

        Route::get('admins/index', 'AdminController@index')->name('admins/index');
        Route::get('admins/create', 'AdminController@create')->name('admins/create');
        Route::post('admins/create', 'AdminController@store')->name('admins/store');
        Route::get('admins/role/{id}', 'AdminController@role')->name('admins/role');
        Route::post('admins/role/{id}', 'AdminController@roleUpdate')->name('admins/role/update');
        Route::get('admins/activate', 'AdminController@activate')->name('admins/activate');
        Route::get('admins/delete/{id}', 'AdminController@delete')->name('admins/delete');

    // });

});
