<?php

use App\Models\User;
use function Pest\Laravel\get;

it('shows users', function() {

    $user = User::factory()->create([
        'name' => 'Test',
        'email' => 'test@gmail.com',
        'runner' => 'athlete',
        'username' => 'test',
    ]);

    $this->actingAs($user);

    User::factory()->create([
        'name' => 'John Doe',
        'email' => 'johndoe@gmail.com',
        'runner' => 'athlete',
        'username' => 'johndoe',
    ]);

    User::factory()->create([
        'name' => 'Jane Doe',
        'email' => 'janedoe@gmail.com',
        'runner' => 'guide',
        'username' => 'janedoe',
    ]);

    get(route('users.index'))
        ->assertOK()
        ->assertSee('John Doe')
        ->assertSee('Jane Doe');
});