<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    public function products()
    {
        try{
            $products = Product::translatedIn(LaravelLocalization::setLocale())->active()->get();
            return view('front.products', compact('products'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }

    public function product($id)
    {
        try{
            $product = Product::active()->with('options_section_one', 'options_section_two')->find($id);
            $options_section_one_data = $product->options_section_one;
            $options_section_two_data = $product->options_section_two;
            return view('front.product-details', compact('product', 'options_section_one_data', 'options_section_two_data'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }
}
