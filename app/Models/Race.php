<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Race extends Model
{
    use HasFactory;

    public function creator() {
        return $this->belongsTo(User::class);
    }

    public function participants() {        
        return $this->belongsToMany(User::class, 'race_participants', 'race_id', 'user_id');
    }

    public function isParticipant() {
        return $this->participants->contains(Auth::user()->id);
    }
}
