<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;
use DB;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Race::all();
    }

    public function popularHeroRace() {
        $popularHeroRace = DB::table('heroes')
                 ->select('race_id', DB::raw('count(*) as total'))
                 ->groupBy('race_id')
                 ->orderBy('total', 'desc')
                 ->first();

        return Race::find($popularHeroRace->race_id);
    }
}
