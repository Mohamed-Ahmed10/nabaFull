<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSectionTranslation extends Model {

	protected $table = 'about_section_translations';
	public $timestamps = true;
	protected $fillable = array('title', 'about_section_id');

}