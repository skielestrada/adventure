<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase;

class WeaponController extends Controller
{
	public function weaponsByClass(Request $request, $class_id)
    {
    	$class = Clase::find($class_id);
        return $class->weapons;
    }
}
