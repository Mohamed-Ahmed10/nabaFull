<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\ContactUs;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB as FacadesDB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;
use GuzzleHttp\Psr7\Request;

class ContactUsRepository extends AbstractRepository
{
    protected $model;

    public function __construct(ContactUs $model)
    {
        $this->model = $model;
    }

    public function ContactsUsGetMore($request)
    {
        try{
            if( isset($request->id) && $request->id > 0){
                $contacts_us = $this->model->latest()->with('sectionable')->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $contacts_us = $this->model->latest()->with('sectionable')->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($contacts_us && count($contacts_us) > 0){
                $all_data = $contacts_us;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function ContactsUsSearch($request)
    {
        try{
            $query = $request->get('query');
            $contacts_us = NULL;
            if($query != ''){
                $contacts_us = $this->model->latest()->where('id', 'LIKE', '%'. $query .'%')
                                                    ->orWhere('name', 'LIKE', '%'. $query .'%')
                                                    ->orWhere('email', 'LIKE', '%'. $query .'%')
                                                    ->orWhere('phone', 'LIKE', '%'. $query .'%')
                                                    ->orWhere('country', 'LIKE', '%'. $query .'%')
                                                    ->orWhere('company_name', 'LIKE', '%'. $query .'%')
                                                    ->with('sectionable')
                                                    ->get();
            }else{
                $contacts_us = $this->model->latest()->with('sectionable')->limit(PAGINATION_COUNT)->get();
            }
            $all_data = NULL;
            if($contacts_us && count($contacts_us) > 0){
                if( $query != '' ){
                    $contacts_us[0]->searchButton = 0;
                }else{
                    $contacts_us[0]->searchButton = 1;
                }
                return $contacts_us;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function ContactsUsFormSearch($request)
    {
        try{
            $sql = '';
            $local = '';
            if(!empty($request->section)){
                $sql .= " AND C.section_no = '". $request->section ."' ";
            }
            if(!empty($request->date_from) && !empty($request->date_to)){
                $date_to_search = date('Y-m-d', strtotime($request->date_to . ' +1 day'));
                $date_from_search = date('Y-m-d', strtotime($request->date_from));
                if($date_from_search == $date_to_search){
                    $sql .= " AND DATE(C.created_at) = '". $date_from_search ."' ";
                }else{
                    $sql .= " AND C.created_at between '". $date_from_search ."' AND '". $date_to_search ."' ";
                }
            }elseif(!empty($request->date_from) && empty($request->date_to)){
                $date_from_search = date('Y-m-d', strtotime($request->date_from));
                $sql .= " AND DATE(C.created_at) = '". $date_from_search ."' ";
            }
            $local = LaravelLocalization::setLocale();
            $contacts_us = NULL;
            if($sql != ''){
                $contacts_us = FacadesDB::select("
                    SELECT 
                        C.*,
                        (
                            CASE 
                                WHEN C.section_no = 1 THEN (SELECT PR_T.title FROM product_translations PR_T WHERE PR_T.product_id = C.sectionable_id AND PR_T.locale = '". $local ."' LIMIT 1)
                                WHEN C.section_no = 2 THEN (SELECT AR_T.title FROM article_translations AR_T WHERE AR_T.article_id = C.sectionable_id AND AR_T.locale = '". $local ."' LIMIT 1)
                                WHEN C.section_no = 3 THEN (SELECT WB_T.title FROM webinar_translations WB_T WHERE WB_T.webinar_id = C.sectionable_id AND WB_T.locale = '". $local ."' LIMIT 1)
                                WHEN C.section_no = 4 THEN (SELECT SE_T.title FROM service_translations SE_T WHERE SE_T.service_id = C.sectionable_id AND SE_T.locale = '". $local ."' LIMIT 1)
                                WHEN C.section_no = 5 THEN (SELECT TR_T.name FROM training_translations TR_T WHERE TR_T.training_id = C.sectionable_id AND TR_T.locale = '". $local ."' LIMIT 1)
                            ELSE '---'
                            END
                        ) sectionable_name
                    FROM contacts_us C 
                    WHERE C.id > 0 $sql
                    ORDER BY C.id DESC
                ");
            }
            $all_data = NULL;
            if($contacts_us && count($contacts_us) > 0){
                return $contacts_us;
            }
            return $all_data;
        }catch(\Exception $ex){
            return responseJson(0, 'error');
        }
    }

    public function ContactsUsExportExcel($request)
    {
        try{
            $sql = '';
            $local = '';
            if(!empty($request->section)){
                $sql .= " AND C.section_no = '". $request->section ."' ";
            }
            if(!empty($request->date_from) && !empty($request->date_to)){
                $date_to_search = date('Y-m-d', strtotime($request->date_to . ' +1 day'));
                $date_from_search = date('Y-m-d', strtotime($request->date_from));
                if($date_from_search == $date_to_search){
                    $sql .= " AND DATE(C.created_at) = '". $date_from_search ."' ";
                }else{
                    $sql .= " AND C.created_at between '". $date_from_search ."' AND '". $date_to_search ."' ";
                }
            }elseif(!empty($request->date_from) && empty($request->date_to)){
                $date_from_search = date('Y-m-d', strtotime($request->date_from));
                $sql .= " AND DATE(C.created_at) = '". $date_from_search ."' ";
            }
            $local = LaravelLocalization::setLocale();
            $contacts_us = NULL;
            if($sql != ''){
                $contacts_us = FacadesDB::select("
                    SELECT 
                        C.*,
                        (
                            CASE 
                                WHEN C.section_no = 1 THEN (SELECT PR_T.title FROM product_translations PR_T WHERE PR_T.product_id = C.sectionable_id AND PR_T.locale = '". $local ."' LIMIT 1)
                                WHEN C.section_no = 2 THEN (SELECT AR_T.title FROM article_translations AR_T WHERE AR_T.article_id = C.sectionable_id AND AR_T.locale = '". $local ."' LIMIT 1)
                                WHEN C.section_no = 3 THEN (SELECT WB_T.title FROM webinar_translations WB_T WHERE WB_T.webinar_id = C.sectionable_id AND WB_T.locale = '". $local ."' LIMIT 1)
                                WHEN C.section_no = 4 THEN (SELECT SE_T.title FROM service_translations SE_T WHERE SE_T.service_id = C.sectionable_id AND SE_T.locale = '". $local ."' LIMIT 1)
                                WHEN C.section_no = 5 THEN (SELECT TR_T.name FROM training_translations TR_T WHERE TR_T.training_id = C.sectionable_id AND TR_T.locale = '". $local ."' LIMIT 1)
                            ELSE '---'
                            END
                        ) sectionable_name
                    FROM contacts_us C 
                    WHERE C.id > 0 $sql
                    ORDER BY C.id DESC
                ");
            }
            return Excel::download(new ContactsExport($contacts_us), 'contacts.xlsx');
        }catch(\Exception $ex){
            return $ex;
            return responseJson(0, 'error');
        }
    }

}