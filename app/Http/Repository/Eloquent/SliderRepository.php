<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Slider;
use Illuminate\Validation\Rule;
use DB;

class SliderRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Slider $model)
    {
        $this->model = $model;
    }

    public function SliderStore($request)
    {
        try{
            // validation 
            // create new city 
            $slider = new $this->model();
            $slider->title = $request->title;
            $slider->link = $request->link;
            $slider->description = $request->description;
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'sliders'); // function on helper file to upload file
                $slider->image = $file;
            }
            $slider->is_activate = 1;
            $slider->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function SliderEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function SliderUpdate($request, $id)
    {
        try{
            // dd($request->all());
            // validation 
            $validator = validator()->make($request->all(),[
                'title' => ['required'],
                'link' => ['required'],
                'description' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get city by id
            $slider = $this->model->findOrFail($id);
            $slider->title = $request->title;
            $slider->link = $request->link;
            $slider->description = $request->description;
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'sliders'); // function on helper file to upload file
                $slider->image = $file;
            }
            $slider->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function SliderActivate($request)
    {
        try{
            $slider = $this->model->findOrFail($request->record_id);
            if($slider->is_activate == 0){
                $slider->update(['is_activate' => 1]);
            }else{
                $slider->update(['is_activate' => 0]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function SliderDelete($request)
    {
        try{
            $slider =  $this->model->findOrFail($request->record_id);
            $slider->delete();
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function SliderGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $sliders = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $sliders = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $allSliders = NULL;
            if($sliders && count($sliders) > 0){
                $allSliders = $sliders;
            }
            return $allSliders;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function SliderSearch($request)
    {
        try{
            $query = $request->get('query');
            $sliders = NULL;
            if($query != ''){
                $sliders = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhere('title', 'LIKE', '%'. $query .'%')
                                                ->get();
            }else{
                $sliders = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $allSliders = NULL;
            if($sliders && count($sliders) > 0){
                if( $query != '' ){
                    $sliders[0]->searchButton = 0;
                }else{
                    $sliders[0]->searchButton = 1;
                }
                return $sliders;
            }
            return $allSliders;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}