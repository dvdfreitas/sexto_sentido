<x-appLayout>
    <x-container>
        
        @foreach ($registrations as $registration)     
            <div class="border-2 rounded px-2 py-1 flex my-2 gap-2">
                <div>{{ $registration->user->name }}</div>
                <div>{{ $registration->race->title }}</div>
            </div>
        @endforeach

    </x-container>
</x-appLayout>