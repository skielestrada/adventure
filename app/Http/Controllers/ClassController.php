<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase;
use App\Race;
use DB;

class ClassController extends Controller
{
    public function classesByRace(Request $request, $race_id)
    {
    	$race = Race::find($race_id);
        return $race->classes;
    }

    public function popularHeroClass() {
        $popularHeroRace = DB::table('heroes')
                 ->select('class_id', DB::raw('count(*) as total'))
                 ->groupBy('class_id')
                 ->orderBy('total', 'desc')
                 ->first();

        return Clase::find($popularHeroRace->class_id);
    }
}
