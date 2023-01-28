<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model {

	protected $table = 'article_translations';
	public $timestamps = true;
	protected $fillable = array('title', 'description', 'article_id');

}