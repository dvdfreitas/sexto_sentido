<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceParticipant extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'race_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function race() {
        return $this->belongsTo(Race::class);
    }
}
