<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SettingRequests\SettingStoreRequest;
use App\Http\Repository\Eloquent\SettingRepository;

class SettingController extends Controller
{

    public $setting;

    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        try{
            $settings = $this->setting->GetAll();
            return view('admin.settings.index', compact('settings'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            return view('admin.settings.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(SettingStoreRequest $request)
    {
        return $this->setting->SettingStore($request);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $setting = $this->setting->SettingEdit($id);
                return view('admin.settings.edit', compact('setting'));
            }else{
                flash()->error("There Is Something Wrong , Please Contact Technical Support");
                return back();
            }
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        return $this->setting->SettingUpdate($request, $id);
    }
    public function delete(Request $request)
    {
        return $this->setting->SettingDelete($request);
    }

    public function getMore(Request $request)
    {
        return $this->setting->SettingGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->setting->SettingSearch($request);
    }

}
