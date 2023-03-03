<?php

namespace App\Models;
 
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'sliders';
	public $timestamps = true;
	protected $fillable = array('image', 'image_phone', 'link', 'is_activate');
    protected $translatedAttributes = ['title', 'description'];
    protected $hidden = ['translations'];

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

}