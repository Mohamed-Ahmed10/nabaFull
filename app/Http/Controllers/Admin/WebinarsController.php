<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\WebinarRequests\WebinarStoreRequest;
use App\Http\Repository\Eloquent\WebinarRepository;

class WebinarsController extends Controller
{

    public $webinar;

    public function __construct(WebinarRepository $webinar)
    {
        $this->webinar = $webinar;
    }

    public function index()
    {
        try{
            $webinars = $this->webinar->GetAll();
            return view('admin.webinars.index', compact('webinars'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            return view('admin.webinars.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(WebinarStoreRequest $request)
    {
        return $this->webinar->WebinarStore($request);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $webinar = $this->webinar->WebinarEdit($id);
                return view('admin.webinars.edit', compact('webinar'));
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
        return $this->webinar->WebinarUpdate($request, $id);
    }

    public function activate(Request $request)
    {
        return $this->webinar->WebinarActivate($request);
    }

    public function delete(Request $request)
    {
        return $this->webinar->WebinarDelete($request);
    }

    public function getMore(Request $request)
    {
        return $this->webinar->WebinarGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->webinar->WebinarSearch($request);
    }

}
