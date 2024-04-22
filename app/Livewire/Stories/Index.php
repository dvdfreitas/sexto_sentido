<?php

namespace App\Livewire\Stories;

use App\Models\Story;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $stories = Story::orderBy('date', 'desc')->get();        
        return view('livewire.stories.index', compact('stories'));
    }
}
