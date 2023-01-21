<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $table = 'articles';
	public $timestamps = true;
	protected $fillable = array('title', 'image', 'description', 'is_activate');

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

}