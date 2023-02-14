<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'products';
	public $timestamps = true;
	protected $fillable = array('category_id', 'video_link', 'image', 'added_by', 'edited_by', 'is_activate');
    protected $translatedAttributes = ['title', 'second_title', 'description', 'second_description', 'video_title', 'video_description'];
    protected $hidden = ['translations'];

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

	public function category()
	{
        return $this->belongsTo(Category::class, 'category_id');
	}

	public function options_section_one()
	{
		return $this->hasMany(ProductSection::class, 'product_id')->where('section_no', 1);
	}

	public function options_section_two()
	{
		return $this->hasMany(ProductSection::class, 'product_id')->where('section_no', 2);
	}

}