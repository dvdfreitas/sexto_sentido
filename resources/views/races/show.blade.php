<x-appLayout>
    
    <x-container>
        <x-race :race="$race"/>
        <div class="text-sm">Corrida inserida por {{ $race->creator->name }}</div>                                    
        @auth
            @foreach ($race->participants as $participant)
                <div class="flex">
                    <div>{{ $participant->name }}</div>
                    @if ($participant->isGuide()) 
                        <div><img src="/images/icons/guide.svg" alt="Guia" class="h-12 border-2 p-0.5"></div>
                    @else
                        <div><img src="/images/icons/athlete.svg" alt="Guia" class="h-12 border-2 p-0.5"></div>
                    @endif
                    @if (Auth::user()->runner != $participant->runner)
                        <form action="/pairs" method="POST">
                            @csrf           
                            <input type="hidden" name="pair_id" value="{{ $participant->id }}">
                            <input type="hidden" name="race_id" value="{{ $race->id }}">
                            <x-button>Emparrelhar</x-button>
                        </form>
                    @endif
                </div>
            @endforeach
        @endauth
        
        <div class="my-4">
            @auth
                @if ($race->isParticipant())                
                    <form action="/races/{{ $race->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Cancelar participação</x-button>
                    </form>
                @else                
                    <form action="/races/{{ $race->id }}" method="POST">
                        @csrf
                        <x-button>Inscrever</x-button>
                    </form>                
                @endif
            @endauth
        </div>        
    </x-container>
</x-appLayout>
