<div>        
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($stories as $story)
            <a class="border-2 rounded hover:border-orange-400 relative" href="{{ $story->url }}">            
                <div class="px-3 py-2">
                    @if ($story->image)
                        <img class="h-56 w-full object-cover" src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}">
                    @else
                        <img class="h-56 w-full" src="/images/logo.png" alt="{{ $story->title }}">
                    @endif
                    <div class="mt-2 font-extrabold font-mono text-xl ">{{ $story->title }}</div>            
                    <div class="text-sm">{{ date('d-m-Y', strtotime($story->date)) }}</div>

                    <div class="font-mono text-balance mt-2">{{ $story->description }}</div>                
                </div>            
            </a>
        @endforeach
</div>
