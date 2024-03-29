<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert race
        $raceId = DB::table('races')->insertGetId([
            'name' => 'race_1',
            'title' => 'Corrida Da República',
            'description' => 'Na manhã ensolarada do Dia da República, a cidade se transforma em um mar de cores patrióticas com a "Corrida Republicana".

Os participantes, vestidos com as cores da bandeira nacional, correm em sintonia, manifestando seu orgulho e compromisso com os valores fundamentais da nação. 

O percurso não é apenas uma corrida, mas uma expressão coletiva de liberdade, igualdade e fraternidade, encapsulando o espírito do país.',
            'image_path' => 'https://i.imgur.com/0l5iiR7.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert race edition
        $raceEditionId = DB::table('race_edition')->insertGetId([
            'race_id' => $raceId,
            'edition' => '2024',
            'district' => 'porto',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert race details
        DB::table('race_details')->insert([
            'race_id' => $raceId,
            'race_edition_id' => $raceEditionId,
            'type' => 'kids',
            'minimum_condition' => 'beginner',
            'start_time' => '16:00',
            'end_time' => '18:00',
            'date' => '2024-10-05',
            'has_accessibility' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('race_details')->insert([
            'race_id' => $raceId,
            'race_edition_id' => $raceEditionId,
            'type' => 'adults',
            'minimum_condition' => 'advanced',
            'start_time' => '16:00',
            'end_time' => '18:00',
            'date' => '2024-10-05',
            'has_accessibility' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('race_details')->insert([
            'race_id' => $raceId,
            'race_edition_id' => $raceEditionId,
            'type' => 'seniors',
            'minimum_condition' => 'beginner',
            'start_time' => '16:00',
            'end_time' => '18:00',
            'date' => '2024-10-05',
            'has_accessibility' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 

        // Insert race
        $raceId2 = DB::table('races')->insertGetId([
            'name' => 'race_2',
            'title' => 'Corrida dos Imigrantes',
            'description' => 'Nas ruas movimentadas da cidade, a "Corrida da Diversidade" é mais do que uma competição atlética, é uma celebração vibrante da riqueza cultural dos imigrantes.
            
Corredores de todas as origens se alinham, seus passos ecoando histórias de perseverança e sucesso. 

As cores das bandeiras de diferentes nações tremulam no ar, enquanto o pulsar da diversidade cria uma atmosfera única de união e respeito.',
            'image_path' => 'images/races/race_image_race_65cb824c3f0c9.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert race edition
        $raceEditionId2 = DB::table('race_edition')->insertGetId([
            'race_id' => $raceId2,
            'edition' => '2024',
            'district' => 'faro',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('race_details')->insert([
            'race_id' => $raceId2,
            'race_edition_id' => $raceEditionId2,
            'type' => 'adults',
            'minimum_condition' => 'advanced',
            'start_time' => '16:00',
            'end_time' => '18:00',
            'date' => '2024-10-05',
            'has_accessibility' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
