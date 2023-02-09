<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ArticleRequests\ArticleStoreRequest;
use App\Http\Repository\Eloquent\ArticleRepository;

class ArticlesController extends Controller
{

    public $article;

    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        try{
            $articles = $this->article->GetAll();
            return view('admin.articles.index', compact('articles'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            return view('admin.articles.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(ArticleStoreRequest $request)
    {
        return $this->article->ArticleStore($request);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $article = $this->article->ArticleEdit($id);
                return view('admin.articles.edit', compact('article'));
            }else{
                flash()->error("There Is Something Wrong , Please Contact Technical Support");
                return back();
            }
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        return $this->article->ArticleUpdate($request, $id);
    }

    public function activate(Request $request)
    {
        return $this->article->ArticleActivate($request);
    }

    public function delete(Request $request)
    {
        return $this->article->ArticleDelete($request);
    }

    public function getMore(Request $request)
    {
        return $this->article->ArticleGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->article->ArticleSearch($request);
    }

}
