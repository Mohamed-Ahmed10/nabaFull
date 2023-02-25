<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repository\Eloquent\ViewRepository;

class ViewsController extends Controller
{

    public $view;

    public function __construct(ViewRepository $view)
    {
        $this->view = $view;
    }

    public function index()
    {
        try{
            $views = [];
            return view('admin.views.index', compact('views'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function search(Request $request)
    {
        return $this->view->ViewsSearch($request);
    }

}
