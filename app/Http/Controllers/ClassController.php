<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;

class ClassController extends Controller
{
    public function classesByRace(Request $request, $race_id)
    {
    	$race = Race::find($race_id);
        return $race->classes;
    }
}
