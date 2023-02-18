<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ServiceRequests\ServiceStoreRequest;
use App\Http\Repository\Eloquent\ServiceRepository;

class ServicesController extends Controller
{

    public $service;

    public function __construct(ServiceRepository $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try{
            $services = $this->service->GetAll();
            return view('admin.services.index', compact('services'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            return view('admin.services.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(ServiceStoreRequest $request)
    {
        return $this->service->ServiceStore($request);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $service = $this->service->ServiceEdit($id);
                return view('admin.services.edit', compact('service'));
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
        return $this->service->ServiceUpdate($request, $id);
    }

    public function activate(Request $request)
    {
        return $this->service->ServiceActivate($request);
    }

    public function delete(Request $request)
    {
        return $this->service->ServiceDelete($request);
    }

    public function getMore(Request $request)
    {
        return $this->service->ServiceGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->service->ServiceSearch($request);
    }

}
