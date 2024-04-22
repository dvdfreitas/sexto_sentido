<x-appLayout>
    <x-container>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($races as $race)            
                <div class="border-2 rounded border-black px-2 py-1">
                    <a href="/races/{{ $race->id }}">
                        <x-race :race="$race"/>                                                
                        @auth
                            @if ($race->isParticipant())
                                <div class="text-green-600 text-sm">Inscrito nesta corrido</div>
                            @endif                            
                            <div>Participantes: {{ $race->participants_count }}</div>
                        @endauth
                    </a>
                </div>
            @endforeach
        </div>
    </x-container>
</x-appLayout>
