<?php

namespace App\ViewModels\Game;

use Carbon\Carbon;
use MarcReichel\IGDBLaravel\Models\Game;

trait GameViewModelTrait
{
    private function formatDate(Carbon|null $date)
    {
        if (! is_null($date)) {
            return $date->format('Y');
        }

        return 'N/A';
    }

    private function ratingColour(float|null $rating)
    {
        return match (true) {
            is_null($rating) => 'gray',
            $rating > 60 => 'green',
            $rating > 39 => 'yellow',
            $rating <= 39 => 'red',
        };
    }

    private function roundRating(float|null $rating)
    {
        if (! is_null($rating)) {
            return ceil($rating);
        }

        return 'N/A';
    }

    private function buildBigImageUrl(Game $game)
    {
        if (! is_null($game->cover)) {
            return 'https://images.igdb.com/igdb/image/upload/t_720p/'.
                $game->cover['image_id'].
                '.jpg';
        }

        return url('/').'/images/placeholder.jpg';
    }

    private function buildSmallImageUrl(Game $game)
    {
        if (! is_null($game->cover)) {
            return 'https://images.igdb.com/igdb/image/upload/t_cover_small/'.
                $game->cover['image_id'].
                '.jpg';
        }

        return url('/').'/images/placeholder_small.jpg';
    }

    private function formatGenres(array|null $genres)
    {
        return ! is_null($genres) ? $genres : [];
    }

    private function formatGame(Game $game)
    {
        $game->first_release_date = $this->formatDate(
            $game->first_release_date
        );
        $game->rating_colour = $this->ratingColour($game->aggregated_rating);
        $game->aggregated_rating = $this->roundRating($game->aggregated_rating);
        $game->coverBigUrl = $this->buildBigImageUrl($game);
        $game->coverSmallUrl = $this->buildSmallImageUrl($game);
        $game->genres = $this->formatGenres($game->genres);

        return $game;
    }
}
