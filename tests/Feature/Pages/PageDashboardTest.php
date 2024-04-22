<?php

use App\Models\User;

use function Pest\Laravel\get;

it('cannot be accessed by guest', function() {
    get(route('dashboard'))
        ->assertRedirect(route('login'));
});

it('can be accessed by logged user', function() {
    
    $user = User::factory()->create();
    $this->actingAs($user);

    get(route('dashboard'))
        ->assertOk();
});