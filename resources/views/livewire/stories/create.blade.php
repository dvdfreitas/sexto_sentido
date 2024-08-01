<div>
    {{--<x-validation-errors class="mb-4" />--}}
    
    <form wire:submit="store">
        @csrf

        <div class="mt-4">
            <x-label for="title" value="{{ __('Title') }}" />
            <x-input wire:model.live="title" id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            
            @error('title')<p class="text-red-800 text-xs">{{ $message }}</p>@enderror 
            
        </div>

        <div class="mt-4">
            <x-label for="subtitle" value="{{ __('Subtitle') }}" />
            <x-input wire:model.live="subtitle" id="subtitle" class="block mt-1 w-full" type="text" name="subtitle" :value="old('subtitle')" autofocus autocomplete="subtitle" />
            <div>
                @error('subtitle') <span class="error">{{ $message }}</span> @enderror 
            </div>
        </div>        

        <div class="mt-4">
            <x-label for="description" value="{{ __('Description') }}" />
            <textarea wire:model.live="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
            <div>
                @error('description') <span class="error">{{ $message }}</span> @enderror 
            </div>
        </div>        
        
        <div class="mt-4">
            <x-label for="url" value="{{ __('Url') }}" />
            <x-input wire:model.live="url" id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" required autofocus autocomplete="url" />
            <div>
                @error('url') <span class="error">{{ $message }}</span> @enderror 
            </div>
        </div>        

        <div class="mt-4">
            <input type="file" wire:model.live="image_upload">
            @error('image_upload') <span class="error">{{ $message }}</span> @enderror            
        </div>

        <div class="flex items-center justify-end mt-4">        
            <x-button class="ms-4">
                {{ __('Create') }}
            </x-button>
        </div>
    </form>
</div>
