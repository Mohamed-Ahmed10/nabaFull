<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Airline;
use Illuminate\Validation\Rule;
use DB;

class AirlineRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Airline $model)
    {
        $this->model = $model;
    }

    public function AirlineStore($request)
    {
        try{
            // validation 
            // create new city 
            $airline = new $this->model();
            $airline->code = $request->code;
            //save image
            if (!$request->hasFile('logo') == null) {
                $file = uploadIamge( $request->file('logo'), 'airlines'); // function on helper file to upload file
                $airline->logo = $file;
            }
            $airline->is_activate = 1;
            $airline->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AirlineEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function AirlineUpdate($request, $id)
    {
        try{
            // dd($request->all());
            // validation 
            $validator = validator()->make($request->all(),[
                'code' => ['required', Rule::unique('airlines', 'code')->ignore($id, 'id')],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get city by id
            $airline = $this->model->findOrFail($id);
            $airline->code = $request->code;
            //save image
            if (!$request->hasFile('logo') == null) {
                $file = uploadIamge( $request->file('logo'), 'airlines'); // function on helper file to upload file
                $airline->logo = $file;
            }
            $airline->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AirlineActivate($id)
    {
        try{
            $airline = $this->model->findOrFail($id);
            if($airline->is_activate == 0){
                $airline->update(['is_activate' => 1]);
            }else{
                $airline->update(['is_activate' => 0]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AirlineDelete($id)
    {
        try{
            $airline =  $this->model->findOrFail($id);
            $airline->delete();
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AirlineGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $airlines = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $airlines = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $allAirline = [];
            if($airlines && count($airlines) > 0){
                foreach($airlines as $airline ){
                    $airline->urlRouteEdit = route('admin/airlines/edit', $airline->id);
                    $airline->urlRouteActivate = route('admin/airlines/activate', $airline->id);
                    $airline->urlRouteDelete = route('admin/airlines/delete', $airline->id);
                    $allAirline [] = $airline;
                }
            }
            return $allAirline;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function AirlineSearch($request)
    {
        try{
            $query = $request->get('query');
            $airlines = [];
            if($query != ''){
                $airlines = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhere('code', 'LIKE', '%'. $query .'%')
                                                ->get();
            }else{
                $airlines = $this->model->latest()->paginate(PAGINATION_COUNT);
            }
            $allAirline = [];
            if($airlines && count($airlines) > 0){
                foreach($airlines as $airline ){
                    $airline->urlRouteEdit = route('admin/airlines/edit', $airline->id);
                    $airline->urlRouteActivate = route('admin/airlines/activate', $airline->id);
                    $airline->urlRouteDelete = route('admin/airlines/delete', $airline->id);
                    if( $query != '' ){
                        $airline->searchButton = 0;
                    }else{
                        $airline->searchButton = 1;
                    }
                    $allAirline [] = $airline;
                }
            }
            return $allAirline;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}