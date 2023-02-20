<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\ContactUs;
use Illuminate\Validation\Rule;

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
                $contacts_us = $this->model->latest()->skip($request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $contacts_us = $this->model->latest()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
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
                                                    ->get();
            }else{
                $contacts_us = $this->model->latest()->limit(PAGINATION_COUNT)->get();
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

}