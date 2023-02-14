<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebinarTranslation extends Model {

	protected $table = 'webinar_translations';
	public $timestamps = true;
	protected $fillable = array('name', 'title', 'description', 'webinar_id');

}