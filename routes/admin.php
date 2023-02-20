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
    
    Route::get('get/categories', 'HomeController@categories')->name('get/categories');
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

        // category routes 
        Route::get('categories/index', 'CategoriesController@index')->name('admin/categories/index');
        Route::get('categories/create', 'CategoriesController@create')->name('admin/categories/create');
        Route::post('categories/create', 'CategoriesController@store')->name('admin/categories/store');
        Route::get('categories/edit/{id?}', 'CategoriesController@edit')->name('admin/categories/edit');
        Route::post('categories/edit/{id}', 'CategoriesController@update')->name('admin/categories/update');
        Route::get('categories/activate', 'CategoriesController@activate')->name('admin/categories/activate');
        Route::get('categories/delete', 'CategoriesController@delete')->name('admin/categories/delete');
        Route::post('categories/getMore', 'CategoriesController@getMore')->name('admin/categories/getMore');
        Route::post('categories/search', 'CategoriesController@search')->name('admin/categories/search');

        // product routes 
        Route::get('products/index', 'ProductsController@index')->name('admin/products/index');
        Route::get('products/create', 'ProductsController@create')->name('admin/products/create');
        Route::post('products/create', 'ProductsController@store')->name('admin/products/store');
        Route::get('products/edit/{id?}', 'ProductsController@edit')->name('admin/products/edit');
        Route::post('products/edit/{id}', 'ProductsController@update')->name('admin/products/update');
        Route::get('products/activate', 'ProductsController@activate')->name('admin/products/activate');
        Route::get('products/delete', 'ProductsController@delete')->name('admin/products/delete');
        Route::post('products/getMore', 'ProductsController@getMore')->name('admin/products/getMore');
        Route::post('products/search', 'ProductsController@search')->name('admin/products/search');

        // product section routes 
        Route::get('products/section/index/{id?}', 'ProductSectionController@index')->name('admin/products/section/index');
        Route::get('products/section/create{id}', 'ProductSectionController@create')->name('admin/products/section/create');
        Route::post('products/section/create/{id}', 'ProductSectionController@store')->name('admin/products/section/store');
        Route::get('products/section/edit/{id?}', 'ProductSectionController@edit')->name('admin/products/section/edit');
        Route::post('products/section/edit/{id}', 'ProductSectionController@update')->name('admin/products/section/update');
        Route::get('products/section/activate', 'ProductSectionController@activate')->name('admin/products/section/activate');
        Route::get('products/section/delete', 'ProductSectionController@delete')->name('admin/products/section/delete');

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

        // webinar routes 
        Route::get('webinars/index', 'WebinarsController@index')->name('admin/webinars/index');
        Route::get('webinars/create', 'WebinarsController@create')->name('admin/webinars/create');
        Route::post('webinars/create', 'WebinarsController@store')->name('admin/webinars/store');
        Route::get('webinars/edit/{id?}', 'WebinarsController@edit')->name('admin/webinars/edit');
        Route::post('webinars/edit/{id}', 'WebinarsController@update')->name('admin/webinars/update');
        Route::get('webinars/activate', 'WebinarsController@activate')->name('admin/webinars/activate');
        Route::get('webinars/delete', 'WebinarsController@delete')->name('admin/webinars/delete');
        Route::post('webinars/getMore', 'WebinarsController@getMore')->name('admin/webinars/getMore');
        Route::post('webinars/search', 'WebinarsController@search')->name('admin/webinars/search');

        // service routes 
        Route::get('services/index', 'ServicesController@index')->name('admin/services/index');
        Route::get('services/create', 'ServicesController@create')->name('admin/services/create');
        Route::post('services/create', 'ServicesController@store')->name('admin/services/store');
        Route::get('services/edit/{id?}', 'ServicesController@edit')->name('admin/services/edit');
        Route::post('services/edit/{id}', 'ServicesController@update')->name('admin/services/update');
        Route::get('services/activate', 'ServicesController@activate')->name('admin/services/activate');
        Route::get('services/delete', 'ServicesController@delete')->name('admin/services/delete');
        Route::post('services/getMore', 'ServicesController@getMore')->name('admin/services/getMore');
        Route::post('services/search', 'ServicesController@search')->name('admin/services/search');

        // traning routes 
        Route::get('trainings/index', 'TrainingsController@index')->name('admin/trainings/index');
        Route::get('trainings/create', 'TrainingsController@create')->name('admin/trainings/create');
        Route::post('trainings/create', 'TrainingsController@store')->name('admin/trainings/store');
        Route::get('trainings/edit/{id?}', 'TrainingsController@edit')->name('admin/trainings/edit');
        Route::post('trainings/edit/{id}', 'TrainingsController@update')->name('admin/trainings/update');
        Route::get('trainings/activate', 'TrainingsController@activate')->name('admin/trainings/activate');
        Route::get('trainings/delete', 'TrainingsController@delete')->name('admin/trainings/delete');
        Route::post('trainings/getMore', 'TrainingsController@getMore')->name('admin/trainings/getMore');
        Route::post('trainings/search', 'TrainingsController@search')->name('admin/trainings/search');

        // setting routes 
        Route::get('settings/index', 'SettingController@index')->name('admin/settings/index');
        Route::get('settings/create', 'SettingController@create')->name('admin/settings/create');
        Route::post('settings/create', 'SettingController@store')->name('admin/settings/store');
        Route::get('settings/edit/{id?}', 'SettingController@edit')->name('admin/settings/edit');
        Route::post('settings/edit/{id}', 'SettingController@update')->name('admin/settings/update');
        Route::get('settings/delete', 'SettingController@delete')->name('admin/settings/delete');
        Route::post('settings/getMore', 'SettingController@getMore')->name('admin/settings/getMore');
        Route::post('settings/search', 'SettingController@search')->name('admin/settings/search');

        // about-section routes 
        Route::get('about-section/index', 'AboutSectionController@index')->name('admin/about-section/index');
        Route::get('about-section/create', 'AboutSectionController@create')->name('admin/about-section/create');
        Route::post('about-section/create', 'AboutSectionController@store')->name('admin/about-section/store');
        Route::get('about-section/edit/{id?}', 'AboutSectionController@edit')->name('admin/about-section/edit');
        Route::post('about-section/edit/{id}', 'AboutSectionController@update')->name('admin/about-section/update');
        Route::get('about-section/activate', 'AboutSectionController@activate')->name('admin/about-section/activate');
        Route::get('about-section/delete', 'AboutSectionController@delete')->name('admin/about-section/delete');
        Route::post('about-section/getMore', 'AboutSectionController@getMore')->name('admin/about-section/getMore');
        Route::post('about-section/search', 'AboutSectionController@search')->name('admin/about-section/search');

        // contact-us routes 
        Route::get('contact-us/index', 'ContactUsController@index')->name('admin/contact-us/index');
        Route::post('contact-us/getMore', 'ContactUsController@getMore')->name('admin/contact-us/getMore');
        Route::post('contact-us/search', 'ContactUsController@search')->name('admin/contact-us/search');

    });

});
