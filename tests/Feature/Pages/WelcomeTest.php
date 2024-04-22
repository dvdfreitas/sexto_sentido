<?php

use App\Models\Story;
use Livewire\Livewire;

use function Pest\Laravel\get;

it('loads the stories', function() {

    Story::factory()->create([
        'title' => 'Story A'
    ]);

    Story::factory()->create([
        'title' => 'Story B'
    ]);
    
    get(route('welcome'))
        ->assertOK()
        ->assertSeeText('Story A')    
        ->assertSeeText('Story B');    

    //Livewire::test(\App\Livewire\Stories\Index::class)->
    //    assertSee('Story A')->
    //    assertSee('Story B');
});