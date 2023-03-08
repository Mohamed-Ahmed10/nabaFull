<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public function home(){
        try{
            $data = NULL;
            $sliders = Slider::translatedIn(LaravelLocalization::setLocale())->latest()->get();
            $setting = Setting::translatedIn(LaravelLocalization::setLocale())->latest()->first();
            $products = Product::translatedIn(LaravelLocalization::setLocale())->active()->get();
            $about_section = AboutSection::translatedIn(LaravelLocalization::setLocale())->active()->get();
            return view('front.home', compact(['setting', 'products', 'about_section', 'sliders']));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concat Technical Support");
            return back();
        }
    }

    public function about() {
        return view('front.about');
    }
}
