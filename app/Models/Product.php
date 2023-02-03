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
	protected $fillable = array('category_id', 'video_link', 'added_by', 'edited_by', 'is_activate');
    protected $translatedAttributes = ['title', 'description'];
    protected $hidden = ['translations'];

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

	public function category()
	{
        return $this->belongsTo(Category::class, 'category_id');
	}

}