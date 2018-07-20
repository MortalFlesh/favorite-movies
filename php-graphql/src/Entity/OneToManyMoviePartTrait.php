<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

trait OneToManyMoviePartTrait
{
    final public function addMovie(Movie $movie): void
    {
        $this->movie = $movie;
    }
}
