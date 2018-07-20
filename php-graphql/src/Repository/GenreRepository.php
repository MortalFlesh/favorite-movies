<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Genre;

class GenreRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Genre::class;
    }
}
