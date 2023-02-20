<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Webinar;
use Illuminate\Validation\Rule;
use DB;

class WebinarRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Webinar $model)
    {
        $this->model = $model;
    }

    public function WebinarStore($request)
    {
        try{
            // validation 
            // create new webinar 
            $webinar = new $this->model();

            // webinar translation ar
            $webinar->translateOrNew('ar')->name = $request->name_ar;
            $webinar->translateOrNew('ar')->title = $request->title_ar;
            $webinar->translateOrNew('ar')->description = $request->description_ar;
            // webinar translation en
            if(!$request->title_en == null && !$request->description_en == null && !$request->name_en == null){
                $webinar->translateOrNew('en')->name = $request->name_en;
                $webinar->translateOrNew('en')->title = $request->title_en;
                $webinar->translateOrNew('en')->description = $request->description_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'webinars'); // function on helper file to upload file
                $webinar->image = $file;
            }
            if(!$request->cost == null){
                $webinar->cost = $request->cost;
            }
            $webinar->date = $request->date;
            $webinar->hours = $request->hours;
            $webinar->time_started = $request->time_started;
            $webinar->is_activate = 1; 
            $webinar->added_by = auth()->guard('admin')->user()->id;
            $webinar->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function WebinarEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function WebinarUpdate($request, $id)
    {
        try{
            // validation 
            $validator = validator()->make($request->all(),[
                'date' => ['required'],
                'time_started' => ['required'],
                'hours' => ['required'],
                'name_ar' => ['required'],
                'title_ar' => ['required'],
                'description_ar' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get webinar by id
            $webinar = $this->model->findOrFail($id);

            // webinar translation ar
            $webinar->translateOrNew('ar')->name = $request->name_ar;
            $webinar->translateOrNew('ar')->title = $request->title_ar;
            $webinar->translateOrNew('ar')->description = $request->description_ar;
            // webinar translation en
            if(!$request->title_en == null && !$request->description_en == null && !$request->name_en == null){
                $webinar->translateOrNew('en')->name = $request->name_en;
                $webinar->translateOrNew('en')->title = $request->title_en;
                $webinar->translateOrNew('en')->description = $request->description_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'webinars'); // function on helper file to upload file
                $webinar->image = $file;
            }
            if(!$request->cost == null){
                $webinar->cost = $request->cost;
            }
            $webinar->date = $request->date;
            $webinar->hours = $request->hours;
            $webinar->time_started = $request->time_started;
            $webinar->edited_by = auth()->guard('admin')->user()->id;
            $webinar->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function WebinarActivate($request)
    {
        try{
            $webinar = $this->model->findOrFail($request->record_id);
            if($webinar->is_activate == 0){
                $webinar->update(['is_activate' => 1]);
            }else{
                $webinar->update(['is_activate' => 0]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function WebinarDelete($request)
    {
        try{
            $webinar =  $this->model->findOrFail($request->record_id);
            $webinar->deleteTranslations();
            $webinar->delete();
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function WebinarGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $webinars = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $webinars = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($webinars && count($webinars) > 0){
                $all_data = $webinars;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function WebinarSearch($request)
    {
        try{
            $query = $request->get('query');
            $webinars = NULL;
            if($query != ''){
                $webinars = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhereTranslationLike('name', '%'. $query .'%')
                                                ->orWhereTranslationLike('title', '%'. $query .'%')
                                                ->get();
            }else{
                $webinars = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($webinars && count($webinars) > 0){
                if( $query != '' ){
                    $webinars[0]->searchButton = 0;
                }else{
                    $webinars[0]->searchButton = 1;
                }
                return $webinars;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}