<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\Admin;
use DB;
use Hash;
use Illuminate\Validation\Rule;

class AdminRepository extends AbstractRepository
{

    protected $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    public function AdminStore($request)
    {
        try{
            // validation 
            // hash password
            $request->merge(['password' => bcrypt($request->password)]);
            //create admin
            $admin = new $this->model();
            $admin->is_activate = 1;
            $admin->name = $request->name;
            $admin->email = $request->email; 
            $admin->phone = $request->phone; 
            $admin->password = $request->password; 
            $admin->role_id = $request->role_id;
            //save image
            if (!$request->hasFile('photo') == null) {
                $file = uploadIamge( $request->file('photo'), 'admins'); // function on helper file to upload file
                $admin->photo = $file;
            }
            $admin->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AdminRole($id)
    {
        return $this->model->find($id); 
    }

    public function AdminUpdateRole($id, $request)
    {
        try{
            // validation 
            $validator = validator()->make($request->all(),[
                'role_id' => 'required|exists:roles,id',
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get admin
            $admin = $this->model->findOrFail($id);
            if(!$admin){
                flash()->error("There IS Somrthing Wrong");
                return back();
            }
            // updaet information 
            $admin->role_id = $request->role_id;
            $admin->save();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AdminInfo()
    {
        try{
            $admin = auth()->guard('admin')->user();
            return view('admin.admins.info', compact('admin'));
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AdminUpdateInfo($request)
    {
        try{
            // get admin
            $admin = auth()->guard('admin')->user();
            if(!$admin){
                flash()->error("There IS Somrthing Wrong");
                return back();
            }
            // validation 
            $validator = validator()->make($request->all(),[
                'email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($admin->id,'id')],
                'name' => 'required',
                'phone' => ['required', Rule::unique('admins', 'phone')->ignore($admin->id,'id')],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // updaet information 
            $admin->email = $request->email;
            $admin->name = $request->name;
            $admin->phone = $request->phone;
            // save image
            if(!$request->hasFile('photo') == null){
                $file = uploadIamge( $request->file('photo'), 'admins'); // function on helper file to upload file
                $admin->photo = $file;
            }
            $admin->save();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AdminChangePassword($request)
    {
        try{
            // validation 
            // get admin
            $admin = auth()->guard('admin')->user();
            if(!$admin){
                flash()->error("There IS Somrthing Wrong");
                return back();
            }
            // check old password
            if(!Hash::check($request->input('old_password'), $admin->password)){
                flash()->error("There IS Something Wrong");
                return back();
            }
            // update password
            $admin->password = bcrypt($request->input('password'));
            $admin->save();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AdminActivate($request)
    {
        try{
            $admin = $this->model->findOrFail($request->record_id);
            if($admin->is_activate == 1){
                $admin->update(['is_activate' => 0]);
            }else{
                $admin->update(['is_activate' => 1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function AdminDelete($request)
    {
        try{
            $admin = $this->model->findOrFail($request->record_id);
            $admin->delete();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function AdminGetMore($request)
    {
        try{
            if(isset($request->id) && $request->id > 0){
                $admins = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $admins = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $alladmins = [];
            if($admins && count($admins) > 0){
                foreach($admins as $admin ){
                    $admin->photo = asset($admin->photo);
                    $alladmins [] = $admin;
                }
            }
            return $alladmins;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function AdminSearch($request)
    {
        try{
            $query = $request->get('query');
            $admins = [];
            if($query != ''){
                $admins = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhere('email', 'LIKE', '%'. $query .'%')
                                                ->orWhere('name', 'LIKE', '%'. $query .'%')
                                                ->get();
            }else{
                $admins = $this->model->latest()->paginate(PAGINATION_COUNT);
            }
            $alladmins = [];
            if($admins && count($admins) > 0){
                foreach($admins as $admin ){
                    $admin->photo = asset($admin->photo);
                    if( $query != '' ){
                        $admin->searchButton = 0;
                    }else{
                        $admin->searchButton = 1;
                    }
                    $alladmins [] = $admin;
                }
            }
            return $alladmins;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

}