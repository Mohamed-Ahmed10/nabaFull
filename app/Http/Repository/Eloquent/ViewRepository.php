<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\View;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Validation\Rule;

class ViewRepository extends AbstractRepository
{
    protected $model;

    public function __construct(View $model)
    {
        $this->model = $model;
    }

    public function ViewsSearch($request)
    {
        try{
            $sql = '';
            $sql_group = '';
            $sql_select = '';
            $sql_fill_sections = 0;
            if(!empty($request->peak_time)){
                $sql_group .= ", V.hour";
                $sql_select .= ", V.hour, COUNT(V.hour) fill_views ";
            }
            if(!empty($request->countries)){
                $sql_group .= ", V.country_name";
                $sql_select .= ", V.country_name, COUNT(V.country_name) fill_views ";
            }
            if(!empty($request->pages)){
                $sql_fill_sections = 1;
            }
            if(!empty($request->country_name)){
                $sql .= " AND V.country_name = '". $request->country_name ."' ";
            }
            if(!empty($request->section)){
                $sql .= " AND V.section_no = '". $request->section ."' ";
            }
            if(!empty($request->date_from) && !empty($request->date_to)){
                $date_to_search = date('Y-m-d', strtotime($request->date_to));
                $date_from_search = date('Y-m-d', strtotime($request->date_from));
                if($date_from_search == $date_to_search){
                    $sql .= " AND DATE(V.created_at) = '". $date_from_search ."' ";
                }else{
                    $sql .= " AND V.created_at between '". $date_from_search ."' AND '". $date_to_search ."' ";
                }
            }elseif(!empty($request->date_from) && empty($request->date_to)){
                $date_from_search = date('Y-m-d', strtotime($request->date_from));
                $sql .= " AND DATE(V.created_at) = '". $date_from_search ."' ";
            }

            $views = NULL;
            if($sql != '' || $sql_group != '' || $sql_fill_sections > 0){
                $views = FacadesDB::select("SELECT V.section_no, COUNT(V.section_no) count_ids $sql_select FROM views V WHERE V.id > 0 $sql GROUP BY V.section_no $sql_group");
                // $views = FacadesDB::select("SELECT DISTINCT V.section_no, V.country_name, V.viewable_type, V.hour, (SELECT COUNT(Su_V.id) FROM views Su_V WHERE Su_V.id > 0 AND V.section_no = Su_V.section_no $sql_sub ) count_ids FROM views V WHERE V.id > 0 $sql");
            }else{
                $views = FacadesDB::select("SELECT COUNT(V.id) count_ids FROM views V WHERE V.id > 0");
            }

            if($views && count($views) > 0){
                if( !isset($views[0]->country_name) ){
                    if(!empty($request->country_name)){
                        $views[0]->country_name = $request->country_name;
                    }else{
                        $views[0]->country_name = "";
                    }
                }
                return $views;
            }
            return $views;
        }catch(\Exception $ex){
            return $ex;
            return responseJson(0, 'error');
        }
    }

}