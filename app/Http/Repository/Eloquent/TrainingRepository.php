<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Training;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Session;

class TrainingRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Training $model)
    {
        $this->model = $model;
    }

    public function TrainingStore($request)
    {
        try{
            // validation 
            // create new webinar 
            $training = new $this->model();

            // training translation ar
            $training->translateOrNew('ar')->name = $request->name_ar;
            // $training->translateOrNew('ar')->title = $request->title_ar;
            $training->translateOrNew('ar')->description = $request->description_ar;
            // training translation en
            if(!$request->name_en == null && !$request->description_en == null){
                $training->translateOrNew('en')->name = $request->name_en;
                // $training->translateOrNew('en')->title = $request->title_en;
                $training->translateOrNew('en')->description = $request->description_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'trainings'); // function on helper file to upload file
                $training->image = $file;
            }
            if(!$request->cost == null){
                $training->cost = $request->cost;
            }
            $training->instructor = $request->instructor;
            $training->date_from = $request->date_from;
            $training->date_to = $request->date_to;
            $training->days = $request->days;
            $training->time_started = $request->time_started;
            $training->is_activate = 1; 
            $training->added_by = auth()->guard('admin')->user()->id;
            $training->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function TrainingEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function TrainingUpdate($request, $id)
    {
        try{
            // validation 
            $validator = validator()->make($request->all(),[
                'name_ar' => ['required'],
                'description_ar' => ['required'],
                'date_from' => ['required'],
                'date_to' => ['required'],
                'time_started' => ['required'],
                'days' => ['required'],
                'instructor' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get training by id
            $training = $this->model->findOrFail($id);

            // training translation ar
            $training->translateOrNew('ar')->name = $request->name_ar;
            // $training->translateOrNew('ar')->title = $request->title_ar;
            $training->translateOrNew('ar')->description = $request->description_ar;
            // training translation en
            if(!$request->name_en == null && !$request->description_en == null){
                $training->translateOrNew('en')->name = $request->name_en;
                // $training->translateOrNew('en')->title = $request->title_en;
                $training->translateOrNew('en')->description = $request->description_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'trainings'); // function on helper file to upload file
                $training->image = $file;
            }
            if(!$request->cost == null){
                $training->cost = $request->cost;
            }
            $training->instructor = $request->instructor;
            $training->date_from = $request->date_from;
            $training->date_to = $request->date_to;
            $training->days = $request->days;
            $training->time_started = $request->time_started;
            $training->edited_by = auth()->guard('admin')->user()->id;
            $training->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function TrainingActivate($request)
    {
        try{
            $training = $this->model->findOrFail($request->record_id);
            if($training->is_activate == 0){
                $training->update(['is_activate' => 1]);
            }else{
                $training->update(['is_activate' => 0]);
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

    public function TrainingDelete($request)
    {
        try{
            $training =  $this->model->findOrFail($request->record_id);
            if (FacadesFile::exists(public_path($training->image))) {
                FacadesFile::delete(public_path($training->image));
            }
            $training->deleteTranslations();
            $training->delete();
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

    public function TrainingGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $trainings = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $trainings = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($trainings && count($trainings) > 0){
                $all_data = $trainings;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function TrainingSearch($request)
    {
        try{
            $query = $request->get('query');
            $trainings = NULL;
            if($query != ''){
                $trainings = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhereTranslationLike('name', '%'. $query .'%')
                                                ->get();
            }else{
                $trainings = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($trainings && count($trainings) > 0){
                if( $query != '' ){
                    $trainings[0]->searchButton = 0;
                }else{
                    $trainings[0]->searchButton = 1;
                }
                return $trainings;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}