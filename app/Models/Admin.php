<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable 
{

	protected $table = 'admins';
	public $timestamps = true;
	protected $fillable = array('name', 'email', 'password', 'photo', 'phone', 'role_id', 'is_activate', 'is_teacher');

	public function scopeActive($query){
		return $query->where('is_activate', 1);
	}

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}