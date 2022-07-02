@extends('layouts.default')

@section('content')
    <div>
        <div class="flex items-center md:mt-0 mt-3">
            <livewire:dropdown-search />
        </div>
        @if ($games->count())
            <h2 class="uppercase tracking-wider text-blue-400 text-lg font-bold mt-5">
                Similar games for "{{ $selectedGame->name }}" 
            </h2>
            <x-games-grid>
                @foreach ($games as $game )
                    <x-games-grid.item :game="$game" />
                @endforeach
            </x-games-grid>
        @elseif (request()->route('game'))
            <h2 class="text-lg md:text-2xl font-bold text-center mt-5">No similar games not found! </h2>
        @endif
        
    </div>
@endsection   