<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hero extends Model
{
    use SoftDeletes;

   	protected $fillable = [
        'firstName', 'lastName'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function race() {
        return $this->belongsTo('App\Race');
    }

    public function class() {
        return $this->belongsTo('App\Clase');
    }

    public function weapon() {
        return $this->belongsTo('App\Weapon');
    }
}
