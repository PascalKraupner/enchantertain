@extends('layouts.default')

@section('content')
<div>
    <div class="flex items-center md:mt-0 mt-3">
        <livewire:dropdown-search />
    </div>

    @if (!$games->count())
    <section class="text-white py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to Enchantertain</h1>
            <p class="text-lg">Your magical portal to discovering and enjoying captivating entertainment tailored just for you.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-12 mx-4">
            <div class="bg-zinc-800 text-white p-6 rounded-md shadow-md flex gap-3 flex-col justify-start">
                <i class="fa fa-gamepad text-white text-5xl self-center"></i>
                <h2 class="text-xl font-semibold mt-4 text-center">Game Galore</h2>
                <p class="mt-2">Discover exciting games that will keep you entertained for hours on end.</p>
            </div>

            <div class="bg-zinc-800 text-white p-6 rounded-md shadow-md flex gap-3 flex-col justify-start">
                <i class="fa fa-film text-white text-5xl self-center"></i>
                <h2 class="text-xl font-semibold mt-4 text-center">Movie Magic</h2>
                <p class="mt-2">Explore a world of enchanting films that match your taste and preferences.</p>
                <p class="mt-2 text-sm text-center text-zinc-400">(Coming Soon)</p>
            </div>


            <div class="bg-zinc-800 text-white p-6 rounded-md shadow-md flex gap-3 flex-col justify-start">
                <i class="fa fa-television text-white text-5xl self-center"></i>
                <h2 class="text-xl font-semibold mt-4 text-center">Showtime Spectacle</h2>
                <p class="mt-2">Enjoy an array of TV shows and series that suit your viewing habits.</p>
                <p class="mt-2 text-sm text-center text-zinc-400 justify-self-end">(Coming Soon)</p>
            </div>

            <div class="bg-zinc-800 text-white p-6 rounded-md shadow-md flex gap-3 flex-col justify-start">
                <i class="fa fa-lightbulb text-white text-5xl self-center"></i>
                <h2 class="text-xl font-semibold mt-4 text-center">Idea Infusion</h2>
                <p class="mt-2">Get personalized recommendations and enlightening insights for your entertainment journey.</p>
                <p class="mt-2 text-sm text-center text-zinc-400 justify-self-end">(Coming Soon)</p>
            </div>
        </div>
    </section>
    @endif
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
