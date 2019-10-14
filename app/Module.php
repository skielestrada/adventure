<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
     public function roles() {
        return $this->belongsToMany('App\Role', 'role_module', 'module_id', 'role_id');
    }
}
