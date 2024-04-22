<?php

use App\Models\Race;
use App\Models\RaceParticipant;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('a logged user can cancel a registration in a race', function() {
        
    $csrfToken = csrf_token();

    $user = User::factory()->create();
    $race = Race::factory()->create();
    $race_participant = RaceParticipant::create([
        'user_id' => $user->id,
        'race_id' => $race->id
    ]);
        
    actingAs($user);

    $this->assertEquals($user->id, $race_participant->id);

    get(route('races.show', $race->id))
        ->assertOk();
    
    delete(route('races.delete', $race->id), [], ['X-CSRF-TOKEN' => $csrfToken,])
        ->assertStatus(302)
        ->assertRedirect(route('races.show', $race->id));
        
    $this->assertDatabaseMissing('race_participants', ['id' => $race_participant->id]);

    get(route('races.show', $race->id))
        ->assertOk()
        ->assertSeeText('Inscrição cancelada com sucesso.');
});

test('a logged user can register in a race', function() {
        
    
    $user = User::factory()->create();    
    $race = Race::factory()->create();

    actingAs($user);    
    
    get(route('races.show', $race->id))
        ->assertOk();
    
    $csrfToken = csrf_token();
    
    post(route('races.store', $race->id), [], ['X-CSRF-TOKEN' => $csrfToken,])
        ->assertStatus(302)
        ->assertRedirect(route('races.show', $race->id));
            
//    $this->assertDatabaseHas('race_participants', ['user_id' => $user->id, 'race_id' => $race->id]);    

    get(route('races.show', $race->id))
        ->assertOk();
});

it('joins a guide with an athlete in race registration', function () {
    $guide = User::factory()->create(['runner' => 'guide']);    
    $athlete = User::factory()->create(['runner' => 'athlete']);    
    $race = Race::factory()->create();

    actingAs($guide);    
    
    get(route('races.show', $race->id))
        ->assertOk();
    
    $csrfToken = csrf_token();
    
    post(route('pairs.store', $race->id), [], ['X-CSRF-TOKEN' => $csrfToken,])
        ->assertStatus(302)
        ->assertRedirect(route('races.show', $race->id));
    
});
