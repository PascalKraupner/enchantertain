<?php

namespace App\ViewModels\Game;

use Illuminate\Support\Collection;
use MarcReichel\IGDBLaravel\Models\Game;
use Spatie\ViewModels\ViewModel;

class GamesViewModel extends ViewModel
{
    use GameViewModelTrait;

    public function __construct(
        public Collection $games,
        Game $selectedGame = null
    ) {
        $this->selectedGame = $selectedGame;
    }

    public function selectedGame()
    {
        return $this->selectedGame;
    }

    public function games()
    {
        if ($this->games->isEmpty()) {
            return $this->games;
        }

        return $this->games->map(function (Game $game) {
            return $this->formatGame($game);
        });
    }
}
