<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{

	protected $table = 'contacts_us';
	public $timestamps = true;
	protected $fillable = array('sectionable_id', 'sectionable_type', 'name', 'company_name', 'email', 'country', 'phone', 'notes');


	public function sectionable()
    {
        return $this->morphTo();
    }

}