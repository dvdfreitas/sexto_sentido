<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\User;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    public function getRaces() {
        $races = Race::all()->sortByDesc("date");
    
        return view('races', [
            'heading' => 'Races Page',
            'races' => Race::all()->sortByDesc("date"),
            'users' => User::all()
        ]);
    }
}
