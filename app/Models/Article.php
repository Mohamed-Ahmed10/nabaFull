<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'articles';
	public $timestamps = true;
	protected $fillable = array('image', 'second_image', 'description', 'added_by', 'edited_by', 'is_activate');
    protected $translatedAttributes = ['title', 'description'];
    protected $hidden = ['translations'];

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

	public function views()
	{
		return $this->morphMany(View::class, 'viewable');
	}
}