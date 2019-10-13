<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    
    public function classes() {
		return $this->belongsToMany('App\Clase', 'race_class', 'race_id', 'class_id');
	}

	public function heroes() {
		return $this->hasMany('App\Hero');
	}
}
