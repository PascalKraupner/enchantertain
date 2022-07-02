<?php

namespace App\Http\Livewire;

use App\Services\GameService;
use App\ViewModels\Game\GamesViewModel;
use Livewire\Component;

class DropdownSearch extends Component
{
    public $searchTerm = '';

    public function render(GameService $gameService)
    {
        $results = collect();

        if (strlen($this->searchTerm) > 2) {
            $results = $gameService->searchForGame($this->searchTerm);
        }

        $gamesViewModel = new GamesViewModel($results);

        return view('livewire.dropdown-search', $gamesViewModel);
    }
}
