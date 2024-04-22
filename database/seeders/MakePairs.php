<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pair;
use App\Models\Race;
use App\Models\RaceParticipant;


class MakePairs extends Seeder {

    public function run(): void
    {    
        $races = Race::with('participants')->get();

        foreach ($races as $race) {        
            $id_athletes = [];
            $id_guides = [];        
            
            foreach ($race->participants as $participant) {            
                if ($participant->runner == "athlete") {                
                    if ($id_guides != []) {
                        $guide_id = array_pop($id_guides);
                        $guide_participation_id = RaceParticipant::where('user_id', $guide_id)
                            ->where('race_id', $race->id)->first();                    
                        $athlete_participation_id = RaceParticipant::where('user_id', $participant->id)
                            ->where('race_id', $race->id)->first();                                            
                        Pair::create([
                            'guide_pair' => $guide_participation_id->id,
                            'athlete_pair' => $athlete_participation_id->id,                        
                        ]);
                    } else {
                        $id_athletes[] += $participant->id; 
                    }
                } elseif ($participant->runner == "guide") {                
                    if ($id_athletes != []) {
                        $athlete_id = array_pop($id_athletes);
                        $guide_participation_id = RaceParticipant::where('user_id', $participant->id)
                            ->where('race_id', $race->id)->first();                    
                        $athlete_participation_id = RaceParticipant::where('user_id', $athlete_id)
                            ->where('race_id', $race->id)->first();                                            
                        Pair::create([
                            'guide_pair' => $guide_participation_id->id,
                            'athlete_pair' => $athlete_participation_id->id,                        
                        ]);
                    } else {
                        $id_guides[] += $participant->id; 
                    }
                }
            }
        }
    }
}
