@extends('layouts.default')

@section('content')
    @if ($game)
        <div class="flex flex-col md:flex-row items-center">
            <img src="{{ $game->coverBigUrl }}" alt="game image" class="max-w-md w-1/2 rounded-sm">     
            <div class="md:ml-24 my-5 md:my-0 w-1/2">
                <div class="flex md:items-center items-baseline">
                    <h2 class="text-xl md:text-4xl font-semibold">{{ $game->name }} ({{ $game->first_release_date }})</h2>      
                    <div 
                        class="text-xs md:text-base font-semibold mt-1 ml-5 md:p-2 
                            p-1 w-fit h-fit text-white rounded-lg bg-{{ $game->rating_colour }}-600"
                    >
                    {{ $game->aggregated_rating }}
                    </div>
                </div>
                <div class="mt-5">
                    <p>
                        @if ($game->genres)
                        <span class="text-sm md:text-base font-bold">Genres:</span>
                        <x-genres :genres="$game->genres" />
                        @endif
                    </p>
                    <p class="mt-5">
                    {{ $game->summary }}
                    </p>
                </div>
            
            </div>
        </div>
    @else
        <h2 class="text-lg md:text-2xl font-bold text-center">Game not found!</h2>
    @endif
@endsection