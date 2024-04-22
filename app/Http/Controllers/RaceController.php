<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\RaceParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RaceController extends Controller
{
    public function index()
    {                        
        $races = Race::with('creator')->get();
        if (Auth::check())
            $races->loadCount('participants');
        return view('races.index', compact('races'));
    }

    public function show($id) {        
        $race = Race::with('creator')->with('participants')->find($id);
        return view('races.show', compact('race'));
    }

    public function store($race_id) {

        $user_id = auth()->id();
        $exists = RaceParticipant::where('user_id', $user_id)
                ->where('race_id', $race_id)
                ->exists();
        
        if (!$exists) {
            RaceParticipant::create([
                'user_id' => $user_id,
                'race_id' => $race_id
            ]);

            session()->flash('flash.banner', 'Inscrição efetuada com sucesso.');
            session()->flash('flash.bannerStyle', 'success');
        } 
        return back();                
    }

    public function delete($race_id) {
        $user_id = auth()->id();
        $raceParticipant = RaceParticipant::where('user_id', $user_id)
                ->where('race_id', $race_id)->first();

        if ($raceParticipant)     
            $raceParticipant->delete();
        
        session()->flash('flash.banner', 'Inscrição cancelada com sucesso.');
        session()->flash('flash.bannerStyle', 'success');

        return back();
    }
}
