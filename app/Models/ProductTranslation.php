<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model {

	protected $table = 'product_translations';
	public $timestamps = true;
	protected $fillable = array('title', 'second_title', 'description', 'second_description', 'video_title', 'video_description', 'product_id');

}