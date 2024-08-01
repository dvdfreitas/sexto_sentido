<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-3">
                    <a href="/stories/create">
                        <div class="grid place-items-center text-center bg-orange-600 h-48 text-white text-2xl rounded">Criar histórias</div>
                    </a>

                    {{--<a href="{{ route('pairs.index') }}">--}}
                        <div class="grid">
                            <div class="grid rounded-t place-items-center text-center bg-orange-400 h-24 text-white text-2xl">Pares</div>
                            <div class="grid rounded-b place-items-center text-center bg-orange-600 h-24 text-white text-2xl">Temporariamente indisponível</div>
                        </div>
                    {{--</a>--}}

                    {{--<a href="{{ route('registrations.index') }}">--}}
                    <div class="grid">                        
                        <div class="grid rounded-t place-items-center text-center bg-orange-600 h-24 text-white text-2xl">{{ __('Registrations') }}</div>
                        <div class="grid rounded-b place-items-center text-center bg-orange-400 h-24 text-white text-2xl">Temporariamente indisponível</div>
                    </div>
                    {{--</a>--}}
                </div>
                


            </div>
        </div>
    </div>
</x-app-layout>
