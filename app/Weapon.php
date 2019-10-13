<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    public function classes() {
		return $this->belongsToMany('App\Clase');
	}

	public function heroes() {
		return $this->hasMany('App\Hero');
	}
}
