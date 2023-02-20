<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model {

	protected $table = 'setting_translations';
	public $timestamps = true;
	protected $fillable = array('title', 'second_title', 'setting_id');

}