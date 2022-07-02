<div class="mt-8">
    <a href="{{ route('games.show', $game->id) }}">
        <div class="overflow-hidden rounded-sm">
            <img src="{{ $game->coverBigUrl }}" 
                class="hover:scale-110 hover:opacity-50 transition-all duration-500" alt="game cover image">
          </div>
    </a>
    <div class="mt-2">
        <a href="{{ route('games.show', $game->id) }}" class="text-lg mt-2 hover:text-blue-400">{{ $game->name }}</a>
        <div class="text-gray-300 text-sm">
            <div class="mt-1 p-2 w-fit text-white rounded-lg bg-{{ $game->rating_colour }}-600">{{ $game->aggregated_rating }}</div>
            <div class="mt-1 ">{{ $game->first_release_date }}</div>
            <div>
                <x-genres :genres="$game->genres" />
            </div>
        </div>
    </div>
</div>