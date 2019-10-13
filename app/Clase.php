<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'classes';

    public function races() {
	    return $this->belongsToMany('App\Race', 'race_class', 'race_id', 'class_id');
	}

	public function weapons() {
	    return $this->belongsToMany('App\Weapon', 'class_weapon', 'class_id', 'weapon_id');
	}

	public function heroes() {
		return $this->hasMany('App\Hero');
	}
}


