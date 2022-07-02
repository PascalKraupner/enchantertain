<div class="relative w-full" x-data="{ open: true }" 
    @click.outside="open = false" 
    @keydown.prevent.down="$focus.wrap().next()"
    @keydown.up="$focus.wrap().previous()"
>
    <input wire:model.debounce.500ms="searchTerm" type="text" 
        class="bg-zinc-700 w-full h-14 rounded-md px-4 pl-9 py-2 placeholder:text-white"
        placeholder="Search..."
        x-ref="search"
        @keydown.window.slash.prevent="$refs.search.focus()"
     
        @keydown.escape.window="
            $wire.searchTerm=''
            open = false;
            $refs.search.blur()
            "
        @keydown.shift.tab="open = false"
        @focus="open = true"
    >
    <div wire:loading class="spinner top-0 right-1/2 mt-7"></div>
    @if (strlen($searchTerm) > 2)
        <div class="z-10 absolute bg-zinc-700 rounded-md w-full mt-2" x-show="open">
            @if (count($games) > 0)
            <ul>
                @foreach ($games as $game )
                <li class="border-b border-zinc-800/20">
                    <a href="{{ route('games.index', $game->id) }}" 
                        class="flex items-center hover:bg-zinc-600 focus:bg-zinc-600 p-5"
                        @if ($loop->last) 
                        @keydown.tab="open = false"
                        @endif
                    >
                        <img class="w-10" src="{{$game->coverSmallUrl }}" alt="game cover image">
                        <span class="ml-4">{{ $game->name}} ({{$game->first_release_date}})</span> 
                    </a>
                </li>
                @endforeach
            </ul>
            @else
                <div class="p-3">No results</div>
            @endif
        @endif
    </div>
</div>
