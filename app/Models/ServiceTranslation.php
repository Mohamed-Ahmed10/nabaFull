<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model {

	protected $table = 'service_translations';
	public $timestamps = true;
	protected $fillable = array('title', 'description', 'service_id');

}