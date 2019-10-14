<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function modules() {
        return $this->belongsToMany('App\Module', 'role_module', 'module_id', 'role_id');
    }
}
