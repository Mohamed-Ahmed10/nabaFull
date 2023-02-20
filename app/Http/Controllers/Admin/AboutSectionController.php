<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AboutSectionRequests\AboutSectionStoreRequest;
use App\Http\Repository\Eloquent\AboutSectionRepository;

class AboutSectionController extends Controller
{

    public $about_section;

    public function __construct(AboutSectionRepository $about_section)
    {
        $this->about_section = $about_section;
    }

    public function index()
    {
        try{
            $about_section = $this->about_section->GetAll();
            return view('admin.about_section.index', compact('about_section'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            return view('admin.about_section.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(AboutSectionStoreRequest $request)
    {
        return $this->about_section->AboutSectionStore($request);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $about_section = $this->about_section->AboutSectionEdit($id);
                return view('admin.about_section.edit', compact('about_section'));
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
        return $this->about_section->AboutSectionUpdate($request, $id);
    }

    public function activate(Request $request)
    {
        return $this->about_section->AboutSectionActivate($request);
    }

    public function delete(Request $request)
    {
        return $this->about_section->AboutSectionDelete($request);
    }

    public function getMore(Request $request)
    {
        return $this->about_section->AboutSectionGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->about_section->AboutSectionSearch($request);
    }

}
