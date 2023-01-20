<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminRequests\AdminChangePasswordRequest;
use App\Http\Requests\Admin\AdminRequests\AdminStoreRequest;
use App\Http\Repository\Eloquent\AdminRepository;
use App\Models\Role;

class AdminController extends Controller
{

    public $admin;

    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
    }

    public function index(){
        try{
            $admins = $this->admin->GetAll();
            return view('admin.admins.index', compact('admins'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create(){
        try{
            return view('admin.admins.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(AdminStoreRequest $request){
        return $this->admin->AdminStore($request);
    }

    public function role($id){
        try{
            $admin = $this->admin->AdminRole($id); 
            return view('admin.admins.role', compact(['admin']));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function roleUpdate(Request $request, $id){
        return $this->admin->AdminUpdateRole($id, $request);
    }

    public function info(){
        return $this->admin->AdminInfo();
    }

    public function info_update(Request $request){
        return $this->admin->AdminUpdateInfo($request);
    }  

    public function change_password(AdminChangePasswordRequest $request){
        return $this->admin->AdminChangePassword($request);
    }

    public function activate(Request $request){
        return $this->admin->AdminActivate($request);
    }

    public function delete(Request $request){
        return $this->admin->AdminDelete($request);
    }

    public function search(Request $request){
        return $this->admin->AdminSearch($request);
    }

    public function getMore(Request $request){
        return $this->admin->AdminGetMore($request);
    }

}
