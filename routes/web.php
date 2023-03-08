<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 
    Route::group([ 'namespace' => 'App\Http\Controllers\Front' ],function(){

        Route::get('/', 'HomeController@home');
        Route::get('/home', 'HomeController@home')->name('front/index');
        
        Route::get('/about', 'HomeController@about')->name('front/about');

        Route::get('/products', 'ProductController@products')->name('front/products');
        Route::get('/product-details/{id}', 'ProductController@product')->name('front/product');

        Route::get('/articles', 'ArticleController@articles')->name('front/articles');
        Route::get('/article-details/{id}', 'ArticleController@article')->name('front/article');

        Route::get('/webinars', 'WebinarsController@webinars')->name('front/webinars');
        Route::get('/webinar-details/{id}', 'WebinarsController@webinar')->name('front/webinar');

        Route::get('/services', 'ServicesController@services')->name('front/services');
        Route::get('/service-details/{id}', 'ServicesController@service')->name('front/service');

        Route::get('/trainings', 'TrainingsController@trainings')->name('front/trainings');
        Route::get('/training-details/{id}', 'TrainingsController@training')->name('front/training');

        Route::post('/contact-us', 'ContactUsController@contact_us')->name('front/contact-us');
    });
});
