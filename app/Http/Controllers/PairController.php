<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Models\RaceParticipant;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PairController extends Controller
{
    public function index() {
        $pairs = Pair::with('guideParticipant.user')
                ->with('athleteParticipant.user')
                ->with('guideParticipant.race')
                ->get();        
        return view('pairs.index', compact('pairs'));
    }

    public function store() {                
        
        $this->deletePair();

        $pair_id = request()->pair_id;

        $pair_user = User::find($pair_id);
        $user = auth()->user();

        if ($pair_user->runner == $user->runner) {
            // HLD
            throw new Exception('User tried to pair with a runner of the same type.');
        }

        // Check if user is registered in the race
        $registeredRace = RaceParticipant::where('user_id', $user->id)
                ->where('race_id', request()->race_id)
                ->first();
        
        // If not registered
        if (!$registeredRace) {
            // Register the user
            $registeredRace = RaceParticipant::create([
                'user_id' => $user->id,
                'race_id' => request()->race_id
            ]);
        }
        
        $pairRegisteredRace = RaceParticipant::where('user_id', $pair_user->id)
                ->where('race_id', request()->race_id)
                ->first();

        if (!$pairRegisteredRace) {
            throw new Exception('Pair user is not registered in the race.');
        } 
        
        
        if ($user->runner == 'guide') {            
            $pair = Pair::where('guide_pair', $registeredRace->id)
                ->where('athlete_pair', $pairRegisteredRace->id)
                ->first();            
            if ($pair) {
                throw new Exception('Pair already exists.');
            }            
            Pair::create([
                'guide_pair' => $registeredRace->id,
                'athlete_pair' => $pairRegisteredRace->id,            
            ]);            
        } else {            
            $pair = Pair::where('guide_pair', $pairRegisteredRace->id)
                ->where('athlete_pair', $registeredRace->id)
                ->first();
            if ($pair) {
                throw new Exception('Pair already exists.');
            }
            Pair::create([
                'guide_pair' => $pairRegisteredRace->id,
                'athlete_pair' => $registeredRace->id,            
            ]);                        
        }                
        return back();
    }

    public function delete() {
        $this->deletePair();
        
        return back();
    }

    public function deletePair() {
        $user = Auth::user();
        $race_id = request()->race_id;

        $registration = RaceParticipant::where('user_id', $user->id)
                    ->where('race_id', $race_id)
                    ->first();

        if ($registration) {
            if ($user->runner == 'guide') {
                $pair = Pair::where('guide_pair', $registration->id)
                    ->first();
            } else {
                $pair = Pair::where('athlete_pair', $registration->id)
                    ->first();
            }

            if ($pair) {
                $pair->delete();
            }
        }

    }
}
