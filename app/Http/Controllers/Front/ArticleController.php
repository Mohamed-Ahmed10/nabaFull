<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ArticleController extends Controller
{
    public function articles()
    {
        try{
            $articles = Article::translatedIn(LaravelLocalization::setLocale())->active()->get();
            return view('front.articles', compact('articles'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }

    public function article($id)
    {
        try{
            $article = Article::active()->find($id);
            return view('front.article-details', compact('article'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Concatt Technical Support");
            return back();
        }
    }
}
