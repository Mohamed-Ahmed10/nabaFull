<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Location;

class ArticleController extends Controller
{
    public function articles()
    {
        try{
            $articles = Article::translatedIn(LaravelLocalization::setLocale())->active()->get();
            return view('front.articles', compact('articles'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }

    public function article(Request $request, $id)
    {
        try{
            // $ip = $request->ip();
            // $data = \Location::get("213.212.201.226");
            // Stevebauman\Location\Position {#476 ▼
            //     +ip: "213.212.201.226"
            //     +countryName: "Egypt"
            //     +countryCode: "EG"
            //     +regionCode: "C"
            //     +regionName: "Cairo Governorate"
            //     +cityName: "Cairo"
            //     +zipCode: ""
            //     +isoCode: null
            //     +postalCode: null
            //     +latitude: "30.0588"
            //     +longitude: "31.2268"
            //     +metroCode: null
            //     +areaCode: "C"
            //     +timezone: "Africa/Cairo"
            //     +driver: "Stevebauman\Location\Drivers\IpApi"
            //   }
            // dd($data->countryName);
            $article = Article::active()->find($id);
            return view('front.article-details', compact('article'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }
}
