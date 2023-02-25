<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'webinars';
	public $timestamps = true;
	protected $fillable = array('image', 'date', 'time_started', 'hours', 'cost', 'is_activate');
    protected $translatedAttributes = ['name', 'title', 'description'];
    protected $hidden = ['translations'];

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

	public function views()
	{
		return $this->morphMany(View::class, 'viewable');
	}
}