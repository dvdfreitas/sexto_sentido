<?php

namespace App\Livewire\Stories;

use App\Models\Story;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required|min:5')]
    public $title;

    public $subtitle;
    
    public $description;
    
    #[Validate('url')]
    public $url;

    #[Validate('required|image|max:2048')]
    public $image_upload;


    public function render()
    {
        return view('livewire.stories.create');
    }

    public function store()
    {
        $date = now();

        $this->validate();            

        $imagePath = $this->image_upload->store('images/stories', 'public');

        Story::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'url' => $this->url,
            'description' => $this->description,
            'date' => $date,
            'image' => $imagePath,
        ]);        


        session()->flash('flash.banner', 'História criada com sucesso.');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('stories.create');
    }
}
