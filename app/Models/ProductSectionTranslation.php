<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSectionTranslation extends Model {

	protected $table = 'product_section_translations';
	public $timestamps = true;
	protected $fillable = array('title', 'description', 'product_section_id');

}