<?php

namespace App\View\Components\GamesGrid;

use Illuminate\View\Component;
use MarcReichel\IGDBLaravel\Models\Game;

class Item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Game $game)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.games-grid.item');
    }
}
