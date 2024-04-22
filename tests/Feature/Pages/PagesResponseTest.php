<?php

namespace Tests\Feature\Livewire;

use function Pest\Laravel\get;

it('gives back successful response for home page', function() {
    get(route('welcome'))->assertOK();    
});

it('gives back successful response for races', function() {
    get(route('races.index'))
        ->assertOK();
});


