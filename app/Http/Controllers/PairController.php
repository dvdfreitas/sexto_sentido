<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Models\RaceParticipant;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

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
        $data = request()->validate([
            'pair_id' => 'required',            
            'race_id' => 'required'
        ]);

        $runner = User::find($data['pair_id']);
        $user = auth()->user();

        if ($runner->runner == $user->runner) {
            // HLD
            throw new Exception('User tried to pair with a runner of the same type.');
        }

        $isRegistered = RaceParticipant::where('user_id', $user->id)
                ->where('race_id', request()->race_id)
                ->first();
        
        // Check if is null
        if (!$isRegistered) {
            $registeredRace = RaceParticipant::create([
                'user_id' => $user->id,
                'race_id' => request()->race_id
            ]);
        } else {
            $registeredRace = $isRegistered->id;
        }
        
        $pairRegistered = RaceParticipant::where('user_id', $runner->id)
                ->where('race_id', request()->race_id)
                ->first();

        if (!$pairRegistered) {
            throw new Exception('Pair is not registered in the race.');
        } else {
            if ($user->runner == 'guide') {
                Pair::create([
                    'guide_pair' => $registeredRace,
                    'athlete_pair' => $pairRegistered->id,            
                ]);
            } else {
                Pair::create([
                    'guide_pair' => $pairRegistered->id,
                    'athlete_pair' => $registeredRace,            
                ]);            
            }
        }
            
        return redirect(route('pairs.index'));
    }
}
