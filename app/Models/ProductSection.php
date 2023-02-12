<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'product_sections';
	public $timestamps = true;
	protected $fillable = array('icon', 'section_no', 'added_by', 'edited_by', 'product_id', 'is_activate');
    protected $translatedAttributes = ['title', 'description'];
    protected $hidden = ['translations'];

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'product_id');
	}

}