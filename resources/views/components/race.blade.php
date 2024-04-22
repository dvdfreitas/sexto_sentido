{{--<div class="@if ($race->isPaired()) bg-green-200 @elseif ($race->isRegistered()) bg-blue-200 @endif">--}}
<div>    
    <div>{{ $race->title }}</div>       
    <div class="text-sm">{{ $race->date }} | {{ $race->time }}</div>    
    <div class="text-sm">Distrito: {{ $race->district }}</div>
    <div class="text-sm">Distância: {{ $race->distance }} m</div>
    {{--@if ($race->isRegistered()) <div class="text-sm">Inscrito</div>  @endif--}}
    
    {{--        
        <div class="text-sm">Atletas: {{ $race->countAthletes() }}</div>
        <div class="text-sm">Guias: {{ $race->countGuides() }}</div>
    --}}    
</div>