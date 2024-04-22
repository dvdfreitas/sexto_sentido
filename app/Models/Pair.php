<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function guideParticipant()
    {
        return $this->belongsTo(RaceParticipant::class, 'guide_pair');
    }

    public function athleteParticipant()
    {
        return $this->belongsTo(RaceParticipant::class, 'athlete_pair');
    }
    
}
