<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\Admin\AdminRequests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function check_login(AdminLoginRequest $request){
        try{

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
            // validation
            $admin = Admin::where('email', strtolower(trim($request->email)))->first();
            if($admin){
                if(FacadesHash::check($request->password, $admin->password)){
                    if($admin->is_activate == 1){
                        if(FacadesAuth::guard('admin')->attempt($request->only('email', 'password'))){
                            return redirect(route('admin/index'));
                        }else{
                            flash()->error("There IS Something Worng");
                            return back();
                        }
                    }else{
                        flash()->error("You Are Not Activate");
                        return back();
                    }
                }else{
                    flash()->error("There IS Something Worng");
                    return back();
                }
            }else{
                flash()->error("There IS Something Wrong");
                return back();
            }
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function logout(){
        auth('admin')->logout();
        return redirect(route('admin/login'));
    }

}
