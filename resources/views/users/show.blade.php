<x-appLayout>
    <x-container>        

        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-36 w-36 object-cover my-2">
        <div class="text-xl font-semibold">{{ $user->name }}</div>
        <div>{{ $user->username }}</div>
        <div>{{ $user->email }}</div>
        @if ($user->runner == "guide")
            <img src="/images/icons/guide.svg" alt="Guia" class="h-8 w-8 my-2">
        @elseif ($user->runner == "athlete")
            <img src="/images/icons/athlete.svg" alt="Atleta" class="h-8 w-8 my-2">
        @endif                            

        @if ($user->linkedin) <a target="_blank" href="https://www.linkedin.com/in/{{ $user->linkedin }}"><img src="/images/icons/linkedin.svg" class="h-6 inline-block"></a>@endif
        @if ($user->facebook)<a target="_blank" href="https://www.facebook.com/{{ $user->facebook }}"><img src="/images/icons/facebook.svg" class="h-6 inline-block"></a>@endif
        @if ($user->instagram)<a target="_blank" href="https://www.instagram.com/{{ $user->instagram }}"><img src="/images/icons/instagram.svg" class="h-6 inline-block"></a>@endif
    </x-container>
</x-appLayout>