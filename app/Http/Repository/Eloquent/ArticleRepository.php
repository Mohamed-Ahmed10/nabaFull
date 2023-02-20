<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Article;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Session;

class ArticleRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function ArticleStore($request)
    {
        try{
            // validation 
            // create new article 
            $article = new $this->model();

            // article translation ar
            $article->translateOrNew('ar')->title = $request->title_ar;
            $article->translateOrNew('ar')->description = $request->description_ar;
            // article translation en
            if(!$request->title_en == null && !$request->description_en == null){
                $article->translateOrNew('en')->title = $request->title_en;
                $article->translateOrNew('en')->description = $request->description_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'articles'); // function on helper file to upload file
                $article->image = $file;
            }
            //save second image
            if (!$request->hasFile('second_image') == null) {
                $file = uploadIamge( $request->file('second_image'), 'articles'); // function on helper file to upload file
                $article->second_image = $file;
            }
            $article->is_activate = 1; 
            $article->added_by = auth()->guard('admin')->user()->id;
            $article->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ArticleEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function ArticleUpdate($request, $id)
    {
        try{
            // dd($request->all());
            // validation 
            $validator = validator()->make($request->all(),[
                'title_ar' => ['required'],
                'description_ar' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get article by id
            $article = $this->model->findOrFail($id);

            // article translation ar
            $article->translateOrNew('ar')->title = $request->title_ar;
            $article->translateOrNew('ar')->description = $request->description_ar;
            // article translation en
            if(!$request->title_en == null && !$request->description_en == null){
                $article->translateOrNew('en')->title = $request->title_en;
                $article->translateOrNew('en')->description = $request->description_en;
            }
            //save image
            if (!$request->hasFile('image') == null) {
                $file = uploadIamge( $request->file('image'), 'articles'); // function on helper file to upload file
                $article->image = $file;
            }
            //save second image
            if (!$request->hasFile('second_image') == null) {
                $file = uploadIamge( $request->file('second_image'), 'articles'); // function on helper file to upload file
                $article->second_image = $file;
            }
            $article->edited_by = auth()->guard('admin')->user()->id;
            $article->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ArticleActivate($request)
    {
        try{
            $article = $this->model->findOrFail($request->record_id);
            if($article->is_activate == 0){
                $article->update(['is_activate' => 1]);
            }else{
                $article->update(['is_activate' => 0]);
            }
            if(Session::has('nav_articles')) {
                Session::forget("nav_articles");
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ArticleDelete($request)
    {
        try{
            $article =  $this->model->findOrFail($request->record_id);
            $article->deleteTranslations();
            $article->delete();
            if(Session::has('nav_articles')) {
                Session::forget("nav_articles");
            }
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ArticleGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $articles = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $articles = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($articles && count($articles) > 0){
                $all_data = $articles;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function ArticleSearch($request)
    {
        try{
            $query = $request->get('query');
            $articles = NULL;
            if($query != ''){
                $articles = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhereTranslationLike('title', '%'. $query .'%')
                                                ->get();
            }else{
                $articles = $this->model->latest()->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($articles && count($articles) > 0){
                if( $query != '' ){
                    $articles[0]->searchButton = 0;
                }else{
                    $articles[0]->searchButton = 1;
                }
                return $articles;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}