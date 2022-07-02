<?php

namespace App\Services;

use MarcReichel\IGDBLaravel\Models\Game;

class GameService
{
    public function findGame(int $id)
    {
        return Game::with(['cover' => ['image_id'], 'genres'])->find($id);
    }

    public function findSimilarGamesFromIds(array $ids)
    {
        return Game::with(['cover' => ['image_id'], 'genres'])
            ->whereIn('id', $ids)
            ->get();
    }

    public function searchForGame(string $searchTerm)
    {
        return Game::with(['cover' => ['image_id']])
            ->search($searchTerm)
            ->take(5)
            ->get();
    }
}
