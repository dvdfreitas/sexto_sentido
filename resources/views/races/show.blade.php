<x-appLayout>
    
    <x-container>
        <x-race :race="$race"/>
        <div class="text-sm">Corrida inserida por {{ $race->creator->name }}</div>                                    
        @auth
            @foreach ($race->participants as $participant)
                @if ($participant->id != Auth::user()->id)
                    <div class="flex">
                        <div>{{ $participant->name }}</div>
                        @if ($participant->isGuide()) 
                            <div><img src="/images/icons/guide.svg" alt="Guia" class="h-12 border-2 p-0.5"></div>
                        @else
                            <div><img src="/images/icons/athlete.svg" alt="Guia" class="h-12 border-2 p-0.5"></div>
                        @endif
                                                
                        @if ($participant->id == Auth::user()->userPaired($race))
                            <form action="{{ route('pairs.delete') }}" method="POST">
                                @csrf
                                @method('DELETE')                                
                                <input type="hidden" name="race_id" value="{{ $race->id }}">
                                <x-button type="submit">Cancelar emparrelhamento</x-button>
                            </form>      
                        @elseif (Auth::user()->runner != $participant->runner)
                            <form action="{{ route('pairs.store') }}" method="POST">
                                @csrf           
                                <input type="hidden" name="pair_id" value="{{ $participant->id }}">
                                <input type="hidden" name="race_id" value="{{ $race->id }}">                                
                                @if ($race->isPaired())
                                    <x-button type="submit">Mudar emparrelhamento</x-button>
                                @else
                                    <x-button type="submit">Emparrelhar</x-button>
                                @endif
                            </form>
                        @endif
                    </div>
                @endif
            @endforeach
        @endauth
        
        <div class="my-4">
            @auth
                @if ($race->isParticipant())                
                    {{-- HLD: Route name --}}
                    <form action="{{ route('races.show', $race->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Cancelar participação</x-button>
                    </form>
                @else                
                    {{-- HLD: Route name --}}
                    <form action="{{ route('races.show', $race->id) }}" method="POST">
                        @csrf
                        <x-button>Inscrever</x-button>
                    </form>                
                @endif
            @endauth
        </div>        
    </x-container>
</x-appLayout>
