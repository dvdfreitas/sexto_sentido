<div>        
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($stories as $story)
        <a class="hover:shadow-xl border" href="{{ $story->link }}">            
            <div class="px-3 py-2">
                <img class="h-56 w-full object-cover" src="{{ $story->image }}" alt="{{ $story->title }}">
                <div class="font-bold text-xl">{{ $story->title }}</div>
                <div class="text-sm">{{ $story->date }}</div>
                <div>{{ $story->description }}</div>
                <div class="text-orange-400 text-xs my-2">LER MAIS</div>
            </div>            
        </a>
    @endforeach
</div>
