<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'categories';
	public $timestamps = true;
	protected $fillable = array('added_by', 'edited_by', 'is_activate');
    protected $translatedAttributes = ['name'];
    protected $hidden = ['translations'];

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

}