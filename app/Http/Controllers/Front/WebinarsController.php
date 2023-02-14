<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WebinarsController extends Controller
{
    public function webinars()
    {
        try{
            $webinars = Webinar::translatedIn(LaravelLocalization::setLocale())->active()->get();
            return view('front.webinars', compact('webinars'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }

    public function webinar($id)
    {
        try{
            $webinar = Webinar::active()->find($id);
            return view('front.webinar-details', compact('webinar'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }
}
