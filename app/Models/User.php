<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'runner',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function races() {
        return $this->belongsToMany(Race::class, 'race_participants', 'race_id', 'user_id');
    }

    public function isGuide() {
        return $this->runner === 'guide';
    }

    public function userPaired($race) {
        
        $user_paired = null;

        // Return the user paired with the current user in the race
        $registration = RaceParticipant::where('user_id', $this->id)
            ->where('race_id', $race->id)
            ->first();
        
        if (!$registration) return null;

        if ($this->runner == 'guide') {
            $user_paired = Pair::where('guide_pair', $registration->id)
                ->first();            
            if ($user_paired) $user_paired = $user_paired->athlete_pair;
        } else { 
            $user_paired = Pair::where('athlete_pair', $registration->id)
                ->first();
            if ($user_paired) $user_paired = $user_paired->guide_pair;
        }
                    
        if ($user_paired)
            $user_paired = RaceParticipant::find($user_paired)->user_id;

        return $user_paired;

    }
}
