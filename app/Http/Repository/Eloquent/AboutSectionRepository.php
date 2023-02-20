<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\AboutSection;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Session;

class AboutSectionRepository extends AbstractRepository
{
    protected $model;

    public function __construct(AboutSection $model)
    {
        $this->model = $model;
    }

    public function AboutSectionStore($request)
    {
        try{
            // validation 
            // create new about_section 
            $about_section = new $this->model();

            // about_section translation ar
            $about_section->translateOrNew('ar')->title = $request->title_ar;
            // about_section translation en
            if(!$request->title_en == null){
                $about_section->translateOrNew('en')->title = $request->title_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'about_section'); // function on helper file to upload file
                $about_section->image = $file;
            }
            $about_section->is_activate = 1; 
            $about_section->added_by = auth()->guard('admin')->user()->id;
            $about_section->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AboutSectionEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function AboutSectionUpdate($request, $id)
    {
        try{
            // dd($request->all());
            // validation 
            $validator = validator()->make($request->all(),[
                'title_ar' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get about_section by id
            $about_section = $this->model->findOrFail($id);

            // about_section translation ar
            $about_section->translateOrNew('ar')->title = $request->title_ar;
            // about_section translation en
            if(!$request->title_en == null){
                $about_section->translateOrNew('en')->title = $request->title_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'about_section'); // function on helper file to upload file
                $about_section->image = $file;
            }
            $about_section->edited_by = auth()->guard('admin')->user()->id;
            $about_section->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AboutSectionActivate($request)
    {
        try{
            $about_section = $this->model->findOrFail($request->record_id);
            if($about_section->is_activate == 0){
                $about_section->update(['is_activate' => 1]);
            }else{
                $about_section->update(['is_activate' => 0]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AboutSectionDelete($request)
    {
        try{
            $about_section =  $this->model->findOrFail($request->record_id);
            $about_section->deleteTranslations();
            $about_section->delete();
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AboutSectionGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $about_section = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $about_section = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($about_section && count($about_section) > 0){
                $all_data = $about_section;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function AboutSectionSearch($request)
    {
        try{
            $query = $request->get('query');
            $about_section = NULL;
            if($query != ''){
                $about_section = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhereTranslationLike('title', '%'. $query .'%')
                                                ->get();
            }else{
                $about_section = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($about_section && count($about_section) > 0){
                if( $query != '' ){
                    $about_section[0]->searchButton = 0;
                }else{
                    $about_section[0]->searchButton = 1;
                }
                return $about_section;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}