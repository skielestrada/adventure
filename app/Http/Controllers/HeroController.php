<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;
use Auth;

class HeroController extends Controller
{

    public function index()
    {
        $heros = Hero::with(['race', 'class', 'weapon'])
            ->where('user_id', '=', Auth::user()->id)
            ->get();
            
        return $heros;
    }

    public function store(Request $request)
    {
        $hero = new Hero();
        $hero->firstName = $request->firstName;
        $hero->lastName = $request->lastName;
        $hero->race_id = $request->race_id;
        $hero->class_id = $request->class_id;
        $hero->weapon_id = $request->weapon_id;
        $hero->user_id = auth()->id();
        $hero->save();

        return $hero;
    }

    public function update(Request $request, $id)
    {
        $hero = Hero::find($id);
        $hero->firstName = $request->firstName;
        $hero->lastName = $request->lastName;
        $hero->race_id = $request->race_id;
        $hero->class_id = $request->class_id;
        $hero->weapon_id = $request->weapon_id;
        $hero->save();

        return $hero;
    }

    public function destroy($id)
    {
        $hero = Hero::find($id);
        $hero->delete();
    }

    public function availableHeroes() {
        $heroes = Hero::all();
        return $heroes->count();
    }
}
