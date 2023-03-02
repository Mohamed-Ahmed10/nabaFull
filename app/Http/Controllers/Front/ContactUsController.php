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
            $rules = [
                'g-recaptcha-response' => 'required|captcha',
            ];
            $messages = [
                'g-recaptcha-response.required' => __('Google reCaptcha is required field'),
                'g-recaptcha-response.captcha' => __('Google reCaptcha Must Be Captcha field'),
            ];
            $validatorCaptcha = validator()->make($request->all(), $rules, $messages);
            if ($validatorCaptcha->fails()) {
                flash()->error($validatorCaptcha->errors()->first());
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
            if(!$request->item_id == NULL){
                $contact->sectionable_id = strtolower(trim($request->item_id));
            }
            if(!$request->section_no == NULL){
                $section = '';
                if($request->section_no == 1){ $section = "App\Models\Product"; }
                elseif($request->section_no == 2){ $section = "App\Models\Article"; }
                elseif($request->section_no == 3){ $section = "App\Models\Webinar"; }
                elseif($request->section_no == 4){ $section = "App\Models\Service"; }
                elseif($request->section_no == 5){ $section = "App\Models\Training"; }
                $contact->section_no = strtolower(trim($request->section_no));
                $contact->sectionable_type = $section;
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
