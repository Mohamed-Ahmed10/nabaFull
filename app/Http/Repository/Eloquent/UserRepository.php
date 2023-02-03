<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Validation\Rule;

class UserRepository extends AbstractRepository
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function GetUsers()
    {
        return $this->model->latest()->Users()->paginate(PAGINATION_COUNT);
    }

    public function UserStore($request)
    {
        try{
            // validation 
            // hash password
            $request->merge(['password' => bcrypt($request->password)]);
            // create Advertiser
            $user = new $this->model();
            $user->is_activate = 1;
            $user->name = $request->name;
            $user->email = $request->email; 
            $user->phone = $request->phone;
            $user->password = $request->password;
            $user->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function UserActivate($id)
    {
        try{
            $user = $this->model->findOrFail($id);
            if($user->is_activate == 1){
                $user->update(['is_activate' => 0]);
            }else{
                $user->update(['is_activate' => 1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong ,  Please Contact Technical Support");
            return back();
        }
    }

    public function UserDelete($id)
    {
        try{
            $user = $this->model->findOrFail($id);
            // if(count($user->advertisings)){
            //     flash()->error("لا يمكن حذف هذا العضو ...لان هناك اعلانات تنتمي اليه");
            //     return back();
            // }
            $user->delete();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function UserGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $users = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $users = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = [];
            if($users && count($users) > 0){
                foreach($users as $user ){
                    $user->urlRouteActivate = route('admin/users/activate', $user->id);
                    $user->urlRouteDelete = route('admin/users/delete', $user->id);
                    $all_data [] = $user;
                }
            }
            return $all_data;
        }catch(\Exception $ex){
            return response()->json("Error");
        }
    }

    public function UserSearch($request)
    {
        try{
            $query = $request->get('query');
            $users = [];
            if($query != ''){
                $users = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                ->orWhere('phone', 'LIKE', '%'. $query .'%')
                                                ->orWhere('email', 'LIKE', '%'. $query .'%')
                                                ->orWhere('name', 'LIKE', '%'. $query .'%')
                                                ->get();
            }else{
                $users = $this->model->latest()->paginate(PAGINATION_COUNT);
            }
            $all_data = [];
            if($users && count($users) > 0){
                foreach($users as $user ){
                    $user->urlRouteActivate = route('admin/users/activate', $user->id);
                    $user->urlRouteDelete = route('admin/users/delete', $user->id);
                    if( $query != '' ){
                        $user->searchButton = 0;
                    }else{
                        $user->searchButton = 1;
                    }
                    $all_data [] = $user;
                }
            }
            return $all_data;
        }catch(\Exception $ex){
            return response()->json("Error");
        }
    }

}