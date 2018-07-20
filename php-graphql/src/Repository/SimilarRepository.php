<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Similar;

class SimilarRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Similar::class;
    }
}
