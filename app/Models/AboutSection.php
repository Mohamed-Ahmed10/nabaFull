<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'about_section';
	public $timestamps = true;
	protected $fillable = array('image', 'added_by', 'edited_by', 'is_activate');
    protected $translatedAttributes = ['title'];
    protected $hidden = ['translations'];

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

}