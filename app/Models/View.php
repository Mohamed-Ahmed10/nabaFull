<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{

	protected $table = 'views';
	public $timestamps = true;
	protected $fillable = array('viewable_id', 'viewable_type', 'ip', 'country_name', 'country_code', 'city_name', 'latitude', 'longitude', 'timezone', 'hour', 'section_no');

	public function viewable()
    {
        return $this->morphTo();
    }
}