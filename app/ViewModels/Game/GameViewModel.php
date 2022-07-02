<?php

namespace App\ViewModels\Game;

use Spatie\ViewModels\ViewModel;

class GameViewModel extends ViewModel
{
    use GameViewModelTrait;

    public $game;

    public function __construct($game = null)
    {
        $this->game = $game;
    }

    public function game()
    {
        if (is_null($this->game)) {
            return $this->game;
        }

        return $this->formatGame($this->game);
    }
}
