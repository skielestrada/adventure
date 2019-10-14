<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Module;
use Auth;

class ModuleController extends Controller
{

    public function index()
    {
        $modules = Module::whereHas('roles', function (Builder $query) {
        	$roles = Auth::user()->roles()->get();
		    $query->whereIn('id',  $roles);
		})->get();
        return $modules;
    }
}
