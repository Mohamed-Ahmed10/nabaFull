<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SliderRequests\SliderStoreRequest;
use App\Http\Repository\Eloquent\SliderRepository;

class SlidersController extends Controller
{

    public $slider;

    public function __construct(SliderRepository $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        try{
            $sliders = $this->slider->GetAll();
            return view('admin.sliders.index', compact('sliders'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            return view('admin.sliders.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(SliderStoreRequest $request)
    {
        return $this->slider->SliderStore($request);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $slider = $this->slider->SliderEdit($id);
                return view('admin.sliders.edit', compact('slider'));
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
        return $this->slider->SliderUpdate($request, $id);
    }

    public function activate(Request $request)
    {
        return $this->slider->SliderActivate($request);
    }

    public function delete(Request $request)
    {
        return $this->slider->SliderDelete($request);
    }

    public function getMore(Request $request)
    {
        return $this->slider->SliderGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->slider->SliderSearch($request);
    }

}
