<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements TranslatableContract 
{
	use Translatable;

	protected $table = 'settings';
	public $timestamps = true;
	protected $fillable = array('video_link', 'color_icon', 'added_by', 'edited_by');
    protected $translatedAttributes = ['title', 'second_title'];
    protected $hidden = ['translations'];

}