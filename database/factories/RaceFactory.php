<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Race>
 */
class RaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $districts = [
            'aveiro', 'beja', 'braga', 'bragança', 'castelo_branco', 'coimbra',
            'evora', 'faro', 'guarda', 'leiria', 'lisboa', 'portalegre', 'porto',
            'santarem', 'setubal', 'viana_do_castelo', 'vila_real', 'viseu'
        ];

        return [
            'title' => str($this->faker->sentence)->beforeLast('.')->title(),
            'subtitle' => str($this->faker->realText(50))->beforeLast('.'),
            'district' => $this->faker->randomElement($districts),
            'creator_id' => User::factory(),
            'description' => $this->faker->paragraph,
            'date' => $this->faker->date('Y-m-d'),
            'time' => $this->faker->time(),
            'distance' => $this->faker->numberBetween(10, 420)*100,
        ];
    }
}
