<?php

namespace Database\Seeders;

use App\Models\Race;
use App\Models\RaceParticipant;
use App\Models\Story;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $model = RaceParticipant::class;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            StorySeeder::class,
            RaceSeeder::class,            
            HeroSeeder::class,

        ]);

        $guides = User::factory(1)->create(['runner' => 'guide']);
        $athletes = User::factory(3)->create(['runner' => 'athlete']);
        $users = $guides->concat($athletes);
        $races = Race::factory(5)->recycle($users)->create();
        for ($i=0; $i<10; $i++)
            RaceParticipant::factory()->create();

        //$this->call(MakePairs::class);
    }
}
