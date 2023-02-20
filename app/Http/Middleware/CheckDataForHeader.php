<?php

namespace App\Http\Middleware;

use App\Models\Article;
use App\Models\Product;
use App\Models\Service;
use App\Models\Training;
use App\Models\Webinar;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CheckDataForHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        // if(Session::has('nav_products') && Session::has('nav_articles') && Session::has('nav_webinars') && Session::has('nav_services') && Session::has('nav_trainings')) {
        //     return $next($request);
        // }else{
        //     if(Session::has('nav_products')) {
        //         $products = Product::translatedIn(LaravelLocalization::setLocale())->active()->get();
        //         Session::put("nav_products", $products, now()->addMonth(1));
        //     }
        //     if(Session::has('nav_articles')) {
        //         $articles = Article::translatedIn(LaravelLocalization::setLocale())->active()->get();
        //         Session::put("nav_articles", $articles, now()->addMonth(1));
        //     }
        //     if(Session::has('nav_webinars')) {
        //         $webinars = Webinar::translatedIn(LaravelLocalization::setLocale())->active()->get();
        //         Session::put("nav_webinars", $webinars, now()->addMonth(1));
        //     }
        //     if(Session::has('nav_services')) {
        //         $services = Service::translatedIn(LaravelLocalization::setLocale())->active()->get();
        //         Session::put("nav_services", $services, now()->addMonth(1));
        //     }
        //     if(Session::has('nav_trainings')) {
        //         $trainings = Training::translatedIn(LaravelLocalization::setLocale())->active()->get();
        //         Session::put("nav_trainings", $trainings, now()->addMonth(1));
        //     }
        //     return $next($request);
        // }
    }
}
