<?php

namespace Database\Factories;

use App\Models\Race;
use App\Models\RaceParticipant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RaceParticipant>
 */
class RaceParticipantFactory extends Factory
{
    protected $model = RaceParticipant::class;

    public function definition()
    {
        $raceIds = Race::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        $raceId = $this->faker->randomElement($raceIds);
        $userId = $this->faker->randomElement($userIds);

        // Check if the combination already exists
        $existingCombination = RaceParticipant::where('race_id', $raceId)
            ->where('user_id', $userId)
            ->exists();

        // Retry with a different combination if it already exists
        while ($existingCombination) {
            $raceId = $this->faker->randomElement($raceIds);
            $userId = $this->faker->randomElement($userIds);

            $existingCombination = RaceParticipant::where('race_id', $raceId)
                ->where('user_id', $userId)
                ->exists();
        }

        return [
            'race_id' => $raceId,
            'user_id' => $userId,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
