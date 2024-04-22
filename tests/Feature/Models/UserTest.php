<?php

use App\Models\Race;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('has races', function() {

    $user = User::factory()->has(Race::factory()->count(3))->create();

    expect($user->races)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(Race::class);

});
