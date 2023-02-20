<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Setting;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Session;

class SettingRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    public function SettingStore($request)
    {
        try{
            // validation 
            // create new setting 
            $setting = new $this->model();

            // setting translation ar
            $setting->translateOrNew('ar')->title = $request->title_ar;
            $setting->translateOrNew('ar')->second_title = $request->second_title_ar;
            // setting translation en
            if(!$request->title_en == null && !$request->second_title_en == null){
                $setting->translateOrNew('en')->title = $request->title_en;
                $setting->translateOrNew('en')->second_title = $request->second_title_en;
            }
            $setting->video_link = $request->video_link; 
            // $setting->color_icon = $request->color_icon; 
            $setting->added_by = auth()->guard('admin')->user()->id;
            $setting->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function SettingEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function SettingUpdate($request, $id)
    {
        try{
            // dd($request->all());
            // validation 
            $validator = validator()->make($request->all(),[
                'title_ar' => ['required'],
                'second_title_ar' => ['required'],
                'video_link' => ['required'],
                // 'color_icon' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get setting by id
            $setting = $this->model->findOrFail($id);

            // setting translation ar
            $setting->translateOrNew('ar')->title = $request->title_ar;
            $setting->translateOrNew('ar')->second_title = $request->second_title_ar;
            // setting translation en
            if(!$request->title_en == null && !$request->second_title_en == null){
                $setting->translateOrNew('en')->title = $request->title_en;
                $setting->translateOrNew('en')->second_title = $request->second_title_en;
            }
            $setting->video_link = $request->video_link; 
            // $setting->color_icon = $request->color_icon; 
            $setting->edited_by = auth()->guard('admin')->user()->id;
            $setting->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function SettingDelete($request)
    {
        try{
            $setting =  $this->model->findOrFail($request->record_id);
            $setting->deleteTranslations();
            $setting->delete();
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function SettingGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $settings = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $settings = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($settings && count($settings) > 0){
                $all_data = $settings;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function SettingSearch($request)
    {
        try{
            $query = $request->get('query');
            $settings = NULL;
            if($query != ''){
                $settings = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhereTranslationLike('title', '%'. $query .'%')
                                                ->get();
            }else{
                $settings = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($settings && count($settings) > 0){
                if( $query != '' ){
                    $settings[0]->searchButton = 0;
                }else{
                    $settings[0]->searchButton = 1;
                }
                return $settings;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}