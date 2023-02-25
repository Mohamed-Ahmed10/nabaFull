<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'services';
	public $timestamps = true;
	protected $fillable = array('image', 'is_activate');
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