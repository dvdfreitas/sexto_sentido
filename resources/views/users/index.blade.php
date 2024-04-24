<x-appLayout>
    <x-container>        
        @if ($users)
            <x-grid>
                @foreach ($users as $user)                            
                    <a href="{{ route('users.show', $user->username) }}" class="m-auto border hover:shadow-md w-full p-4 rounded">
                        <div class="m-auto">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-36 w-36 object-cover m-auto my-2">                        
                            <div class="text-xl font-semibold text-center">{{ $user->name }}</div>
                            @if ($user->runner == "guide")
                                <img src="/images/icons/guide.svg" alt="Guia" class="h-8 w-8 m-auto my-2">
                            @elseif ($user->runner == "athlete")
                                <img src="/images/icons/athlete.svg" alt="Atleta" class="h-8 w-8 m-auto my-2">
                            @endif                            
                        </div>            
                    </a>
                @endforeach
            </x-grid>
        @else
            <div>Não há utilizadores registados.</div>
        @endif
    </x-container>
</x-appLayout>