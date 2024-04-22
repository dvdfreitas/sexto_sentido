<?php

use App\Models\User;
use function Pest\Laravel\get;

it('shows correct options when not logged in', function() {

    get(route('races.index'))
        ->assertOk()
        ->assertSeeText('Races')
        ->assertDontSeeText('Dashboard')
        ->assertDontSeeText('Users')
        ->assertDontSee('Registrations')
        ->assertDontSee('Pairs');
});

it('shows correct options when logged in', function() {

    $user = User::factory()->create();

    $this->actingAs($user);

    get(route('races.index'))
        ->assertOk()
        ->assertSeeText('Races')
        ->assertSeeText('Dashboard')
        ->assertSeeText('Users')
        ->assertSee('Registrations')
        ->assertSee('Pairs');
});

it('includes login in if not logged in', function() {
    get(route('welcome'))
        ->assertOk()
        ->assertSeeText('Log in')
        ->assertSee(route('login'));
});

it('includes logout if logged in', function() {

    $user = User::factory()->create();
    $this->actingAs($user);

    get(route('races.index'))
        ->assertOk()
        ->assertSeeText('Log Out')
        ->assertSee(route('logout'));
});