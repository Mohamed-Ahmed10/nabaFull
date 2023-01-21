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
    
    Route::group(['middleware' => 'adminLogin'],function(){
        
        Route::get('/home', 'HomeController@home')->name('admin/index');

        Route::get('admins/info', 'AdminController@info')->name('admins/info');
        Route::post('admins/info-update', 'AdminController@info_update')->name('admins/info-update');
        Route::post('admins/change-password', 'AdminController@change_password')->name('admins/change-password');

        Route::post('admins/search', 'AdminController@search')->name('admin/search');
        Route::post('admins/getMore', 'AdminController@getMore')->name('admin/getMore');

        Route::get('logout', 'AuthController@logout')->name('admin/logout');

        Route::get('admins/index', 'AdminController@index')->name('admins/index');
        Route::get('admins/create', 'AdminController@create')->name('admins/create');
        Route::post('admins/create', 'AdminController@store')->name('admins/store');
        Route::get('admins/role/{id}', 'AdminController@role')->name('admins/role');
        Route::post('admins/role/{id}', 'AdminController@roleUpdate')->name('admins/role/update');
        Route::get('admins/activate', 'AdminController@activate')->name('admins/activate');
        Route::get('admins/delete', 'AdminController@delete')->name('admins/delete');

        // slider routes 
        Route::get('sliders/index', 'SlidersController@index')->name('admin/sliders/index');
        Route::get('sliders/create', 'SlidersController@create')->name('admin/sliders/create');
        Route::post('sliders/create', 'SlidersController@store')->name('admin/sliders/store');
        Route::get('sliders/edit/{id?}', 'SlidersController@edit')->name('admin/sliders/edit');
        Route::post('sliders/edit/{id}', 'SlidersController@update')->name('admin/sliders/update');
        Route::get('sliders/activate', 'SlidersController@activate')->name('admin/sliders/activate');
        Route::get('sliders/delete', 'SlidersController@delete')->name('admin/sliders/delete');
        Route::post('sliders/getMore', 'SlidersController@getMore')->name('admin/sliders/getMore');
        Route::post('sliders/search', 'SlidersController@search')->name('admin/sliders/search');

        // article routes 
        Route::get('articles/index', 'ArticlesController@index')->name('admin/articles/index');
        Route::get('articles/create', 'ArticlesController@create')->name('admin/articles/create');
        Route::post('articles/create', 'ArticlesController@store')->name('admin/articles/store');
        Route::get('articles/edit/{id?}', 'ArticlesController@edit')->name('admin/articles/edit');
        Route::post('articles/edit/{id}', 'ArticlesController@update')->name('admin/articles/update');
        Route::get('articles/activate', 'ArticlesController@activate')->name('admin/articles/activate');
        Route::get('articles/delete', 'ArticlesController@delete')->name('admin/articles/delete');
        Route::post('articles/getMore', 'ArticlesController@getMore')->name('admin/articles/getMore');
        Route::post('articles/search', 'ArticlesController@search')->name('admin/articles/search');


    });

});
