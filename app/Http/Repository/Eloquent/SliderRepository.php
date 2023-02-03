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
            // slider translation ar
            $slider->translateOrNew('ar')->title = $request->title_ar;
            $slider->translateOrNew('ar')->description = $request->description_ar;
            // slider translation en
            if(!$request->title_en == null && !$request->description_en == null){
                $slider->translateOrNew('en')->title = $request->title_en;
                $slider->translateOrNew('en')->description = $request->description_en;
            }
            $slider->link = $request->link;
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
                'title_ar' => ['required'],
                'link' => ['required'],
                'description_ar' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get city by id
            $slider = $this->model->findOrFail($id);
            $slider->translateOrNew('ar')->title = $request->title_ar;
            $slider->translateOrNew('ar')->description = $request->description_ar;
            // slider translation en
            if(!$request->title_en == null && !$request->description_en == null){
                $slider->translateOrNew('en')->title = $request->title_en;
                $slider->translateOrNew('en')->description = $request->description_en;
            }
            $slider->link = $request->link;
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
            $all_data = NULL;
            if($sliders && count($sliders) > 0){
                $all_data = $sliders;
            }
            return $all_data;
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
                                                ->orWhereTranslationLike('title', '%'. $query .'%')
                                                ->get();
            }else{
                $sliders = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($sliders && count($sliders) > 0){
                if( $query != '' ){
                    $sliders[0]->searchButton = 0;
                }else{
                    $sliders[0]->searchButton = 1;
                }
                return $sliders;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}