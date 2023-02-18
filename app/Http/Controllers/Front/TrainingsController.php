<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TrainingsController extends Controller
{
    public function trainings()
    {
        try{
            $trainings = Training::translatedIn(LaravelLocalization::setLocale())->active()->get();
            return view('front.trainings', compact('trainings'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }

    public function training($id)
    {
        try{
            $training = Training::active()->find($id);
            return view('front.training-details', compact('training'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }
}
