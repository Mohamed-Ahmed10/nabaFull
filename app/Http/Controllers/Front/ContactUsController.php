<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ContactUsController extends Controller
{
    public function contact_us(Request $request)
    {
        try{
            // validation 
            $validator = validator()->make($request->all(),[
                'name' => ['required'],
                'company_name' => ['required'],
                'email' => ['required'],
                'country' => ['required'],
                'phone' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            $contact = new ContactUs();
            $contact->name = strtolower(trim($request->name));
            $contact->company_name = strtolower(trim($request->company_name));
            $contact->email = strtolower(trim($request->email));
            $contact->country = strtolower(trim($request->country));
            $contact->phone = strtolower(trim($request->phone));
            if(!$request->notes == NULL){
                $contact->notes = strtolower(trim($request->notes));
            }
            $contact->save();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }

}
