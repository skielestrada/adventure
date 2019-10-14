<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monster;
use Auth;

class MonsterController extends Controller
{

    public function index()
    {
         $monsters = Monster::where('user_id', '=', Auth::user()->id)
            ->get();
            
        return $monsters;
    }

    public function store(Request $request)
    {
        $monster = new Monster();
        $monster->name = $request->name;
        $monster->level = 1;
        $monster->user_id = auth()->id();
        $monster->save();

        return $monster;
    }

    public function update(Request $request, $id)
    {
        $monster = Monster::find($id);
        $monster->name = $request->name;
        $monster->save();

        return $monster;
    }

    public function destroy($id)
    {
        $monster = Monster::find($id);
        $monster->delete();
    }
}
