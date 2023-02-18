<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingTranslation extends Model {

	protected $table = 'training_translations';
	public $timestamps = true;
	protected $fillable = array('name', 'title', 'description', 'training_id');

}