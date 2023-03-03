<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repository\Eloquent\ContactUsRepository;

class ContactUsController extends Controller
{

    public $contacts_us;

    public function __construct(ContactUsRepository $contacts_us)
    {
        $this->contacts_us = $contacts_us;
    }

    public function index()
    {
        try{
            $contacts_us = $this->contacts_us->GetAll();
            return view('admin.contacts_us.index', compact('contacts_us'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function getMore(Request $request)
    {
        return $this->contacts_us->ContactsUsGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->contacts_us->ContactsUsSearch($request);
    }

    public function form_search(Request $request)
    {
        return $this->contacts_us->ContactsUsFormSearch($request);
    }

    public function export_excel(Request $request)
    {
        return $this->contacts_us->ContactsUsExportExcel($request);
    }


}
