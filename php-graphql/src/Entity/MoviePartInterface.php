<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\Collection;

interface MoviePartInterface
{
    public function addMovie(Movie $movie): void;

    public function getCollection(Movie $movie): Collection;
}
