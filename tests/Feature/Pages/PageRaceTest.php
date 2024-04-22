<?php

use App\Models\Race;
use function Pest\Laravel\get;


it('shows races', function() {
    
    Race::factory()->create([
        'title' => 'Race A'
    ]);
    
    Race::factory()->create([
        'title' => 'Race B'
    ]);        

    get(route('races.index'))->assertOK();

    //     ->assertSeeText('Race A')
    //     ->assertSeeText('Race B');        
});

// it('shows only my races', function() {
    
    // Race::factory()->create([
    //     'title' => 'Race A'
    // ]);

    // Race::factory()->create([
    //     'title' => 'Race B'
    // ]);    

    // get(route('races.index'))
    //     ->assertSee('Race A')
    //     ->assertDontSee('Race B');
// });
