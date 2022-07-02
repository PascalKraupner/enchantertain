<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use App\ViewModels\Game\GamesViewModel;
use App\ViewModels\Game\GameViewModel;

class GameController extends Controller
{
    private GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id = null)
    {
        $similarGames = collect();
        $selectedGame = null;

        if ($id) {
            $selectedGame = $this->gameService->findGame($id);
            $similarGameIds = $selectedGame?->similar_games;

            if ($similarGameIds) {
                $similarGames = $this->gameService->findSimilarGamesFromIds(
                    $similarGameIds
                );
            }
        }

        $gamesViewModel = new GamesViewModel($similarGames, $selectedGame);

        return view('pages.index', $gamesViewModel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $game = $this->gameService->findGame($id);
        $gameViewModel = new GameViewModel($game);

        return view('pages.show', $gameViewModel);
    }
}
