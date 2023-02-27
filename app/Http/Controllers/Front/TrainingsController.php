<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TrainingsController extends Controller
{
    public function trainings(Request $request)
    {
        try{
            $trainings = Training::translatedIn(LaravelLocalization::setLocale())->active()->get();
            return view('front.trainings', compact('trainings'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }

    public function training(Request $request ,$id)
    {
        try{
            $training = Training::active()->find($id);

            if(empty($request->session()->get('get_user_ip_before_training'.$training->id))) {
                $ip = $request->ip();
                // $ip = "194.227.162.197";
                if(date('H') < 8){ $hour = 1; }
                elseif(date('H') < 12){ $hour = 2; }
                elseif(date('H') < 17){ $hour = 3; }
                else{ $hour = 4; }
                $location_data = \Location::get($ip);
                if($location_data){
                    $data_store = [
                        'ip' => $ip,
                        'country_name' => $location_data->countryName,
                        'country_code' => $location_data->countryCode,
                        'city_name' => $location_data->cityName,
                        'latitude' => $location_data->latitude,
                        'longitude' => $location_data->longitude,
                        'timezone' => $location_data->timezone,
                        'section_no' => 5,
                        'hour' => $hour
                    ];
                    $training->views()->create($data_store);
                    $request->session()->put("get_user_ip_before_training".$training->id, 1, now()->addDay(1));
                }
            }
            return view('front.training-details', compact('training'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }
}
