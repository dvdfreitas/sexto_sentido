<x-appLayout>
    <x-container>        
        @if ($users)
            @foreach ($users as $user)                            
                {{--<a href="{{ route('pairs.show', ['username' => $user->username]) }}">--}}
                    <div class="flex">
                        <div>{{ $user->id }}</div>
                        <div class="mx-4"> | </div>
                        <div>{{ $user->name }}</div>
                        <div class="mx-4"> | </div>
                        <div>{{ $user->runner }}</div>                    
                        <div class="mx-4"> | </div>
                        <div>{{ $user->email }}</div>                
                    </div>            
                {{--</a>--}}
            @endforeach
        @else
            <div>Não há utilizadores registados.</div>
        @endif
    </x-container>
</x-appLayout>