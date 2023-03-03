<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

class ContactsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $contacts;

    public function __construct(array $contacts){
        $this->contacts = $contacts;
    }

    public function view() :view
    {
        $contacts = $this->contacts;
        return view('admin.contacts_us.excel', compact('contacts'));
    }
}