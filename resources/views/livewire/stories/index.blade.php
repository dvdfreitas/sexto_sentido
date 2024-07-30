<div>        
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($stories as $story)
        <a class="border-2 rounded hover:border-orange-400 relative" href="{{ $story->link }}">            
            <div class="px-3 py-2 space-y-1">
                <img class="h-56 w-full object-cover" src="{{ $story->image }}" alt="{{ $story->title }}">
                <div class="font-bold text-xl">{{ $story->title }}</div>            
                <div class="text-sm">{{ date('d-m-Y', strtotime($story->date)) }}</div>

                <div>{{ $story->description }}</div>                
            </div>            
        </a>
        @endforeach
</div>
