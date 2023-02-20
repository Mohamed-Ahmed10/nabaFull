<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Service;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Session;

class ServiceRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }

    public function ServiceStore($request)
    {
        try{
            // validation 
            // create new webinar 
            $service = new $this->model();

            // service translation ar
            $service->translateOrNew('ar')->title = $request->title_ar;
            $service->translateOrNew('ar')->description = $request->description_ar;
            // service translation en
            if(!$request->title_en == null && !$request->description_en == null){
                $service->translateOrNew('en')->title = $request->title_en;
                $service->translateOrNew('en')->description = $request->description_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'services'); // function on helper file to upload file
                $service->image = $file;
            }
            $service->is_activate = 1; 
            $service->added_by = auth()->guard('admin')->user()->id;
            $service->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ServiceEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function ServiceUpdate($request, $id)
    {
        try{
            // validation 
            $validator = validator()->make($request->all(),[
                'title_ar' => ['required'],
                'description_ar' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get service by id
            $service = $this->model->findOrFail($id);

            // service translation ar
            $service->translateOrNew('ar')->title = $request->title_ar;
            $service->translateOrNew('ar')->description = $request->description_ar;
            // service translation en
            if(!$request->title_en == null && !$request->description_en == null){
                $service->translateOrNew('en')->title = $request->title_en;
                $service->translateOrNew('en')->description = $request->description_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'services'); // function on helper file to upload file
                $service->image = $file;
            }
            $service->edited_by = auth()->guard('admin')->user()->id;
            $service->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ServiceActivate($request)
    {
        try{
            $service = $this->model->findOrFail($request->record_id);
            if($service->is_activate == 0){
                $service->update(['is_activate' => 1]);
            }else{
                $service->update(['is_activate' => 0]);
            }
            if(Session::has('nav_services')) {
                Session::forget("nav_services");
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ServiceDelete($request)
    {
        try{
            $service =  $this->model->findOrFail($request->record_id);
            $service->delete();
            if(Session::has('nav_services')) {
                Session::forget("nav_services");
            }
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ServiceGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $services = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $services = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($services && count($services) > 0){
                $all_data = $services;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function ServiceSearch($request)
    {
        try{
            $query = $request->get('query');
            $services = NULL;
            if($query != ''){
                $services = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhereTranslationLike('title', '%'. $query .'%')
                                                ->get();
            }else{
                $services = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($services && count($services) > 0){
                if( $query != '' ){
                    $services[0]->searchButton = 0;
                }else{
                    $services[0]->searchButton = 1;
                }
                return $services;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}