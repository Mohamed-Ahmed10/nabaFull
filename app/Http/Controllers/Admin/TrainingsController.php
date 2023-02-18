<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TrainingRequests\TrainingStoreRequest;
use App\Http\Repository\Eloquent\TrainingRepository;

class TrainingsController extends Controller
{

    public $training;

    public function __construct(TrainingRepository $training)
    {
        $this->training = $training;
    }

    public function index()
    {
        try{
            $trainings = $this->training->GetAll();
            return view('admin.trainings.index', compact('trainings'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            return view('admin.trainings.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(TrainingStoreRequest $request)
    {
        return $this->training->TrainingStore($request);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $training = $this->training->TrainingEdit($id);
                return view('admin.trainings.edit', compact('training'));
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
        return $this->training->TrainingUpdate($request, $id);
    }

    public function activate(Request $request)
    {
        return $this->training->TrainingActivate($request);
    }

    public function delete(Request $request)
    {
        return $this->training->TrainingDelete($request);
    }

    public function getMore(Request $request)
    {
        return $this->training->TrainingGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->training->TrainingSearch($request);
    }

}
