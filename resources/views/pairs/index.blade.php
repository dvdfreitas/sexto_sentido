<x-appLayout>
    <x-container>
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
            @foreach ($pairs as $pair)                
                <div>
                    <div class="font-bold">{{ $pair->guideParticipant->race->title}}</div>
                    <div>{{ $pair->guideParticipant->race->subtitle}}</div>
                    <div class="flex p-4 border-2 gap-3">                   
                        <div class="border-2 p-4">{{ $pair->guideParticipant->user->name }}</div>                    
                        <div class="border-2 p-4">{{ $pair->athleteParticipant->user->name }}</div>                                    
                    </div>
                </div>
            @endforeach
        </div>
    </x-container>
</x-appLayout>
