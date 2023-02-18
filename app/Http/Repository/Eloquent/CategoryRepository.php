<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Category;
use Illuminate\Validation\Rule;
use DB;

class CategoryRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function categoryStore($request)
    {
        try{
            // validation 
            // create new city 
            $category = new $this->model();
            // category translation ar
            $category->translateOrNew('ar')->name = $request->name_ar;
            // category translation en
            if(!$request->name_en == null){
                $category->translateOrNew('en')->name = $request->name_en;
            }
            $category->added_by = auth()->guard('admin')->user()->id;
            $category->is_activate = 1;
            $category->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function categoryEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function categoryUpdate($request, $id)
    {
        try{
            // dd($request->all());
            // validation 
            $validator = validator()->make($request->all(),[
                'name_ar' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get city by id
            $category = $this->model->findOrFail($id);
            $category->translateOrNew('ar')->name = $request->name_ar;
            // category translation en
            if(!$request->name_en == null){
                $category->translateOrNew('en')->name = $request->name_en;
            }
            $category->edited_by = auth()->guard('admin')->user()->id;
            $category->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function categoryActivate($request)
    {
        try{
            $category = $this->model->findOrFail($request->record_id);
            if($category->is_activate == 0){
                $category->update(['is_activate' => 1]);
            }else{
                $category->update(['is_activate' => 0]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function categoryDelete($request)
    {
        try{
            $category =  $this->model->findOrFail($request->record_id);
            $category->deleteTranslations();
            $category->delete();
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function categoryGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $categories = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $categories = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($categories && count($categories) > 0){
                $all_data = $categories;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function categorySearch($request)
    {
        try{
            $query = $request->get('query');
            $categories = NULL;
            if($query != ''){
                $categories = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhereTranslationLike('name', '%'. $query .'%')
                                                ->get();
            }else{
                $categories = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($categories && count($categories) > 0){
                if( $query != '' ){
                    $categories[0]->searchButton = 0;
                }else{
                    $categories[0]->searchButton = 1;
                }
                return $categories;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}