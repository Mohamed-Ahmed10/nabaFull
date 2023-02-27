<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        try{
            $products = Product::translatedIn(LaravelLocalization::setLocale())->active()->get();
            $request->session()->forget('get_user_ip_before_product');
            return view('front.products', compact('products'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }

    public function product(Request $request ,$id)
    {
        try{
            $product = Product::active()->with('options_section_one', 'options_section_two')->find($id);
            $options_section_one_data = $product->options_section_one;
            $options_section_two_data = $product->options_section_two;

            if(empty($request->session()->get('get_user_ip_before_product'.$product->id))) {
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
                        'section_no' => 1,
                        'hour' => $hour
                    ];
                    $product->views()->create($data_store);
                    $request->session()->put("get_user_ip_before_product".$product->id, 1, now()->addDay(1));
                }
            }
            return view('front.product-details', compact('product', 'options_section_one_data', 'options_section_two_data'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }
}
