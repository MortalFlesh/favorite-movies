<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Premiere;

class PremiereRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Premiere::class;
    }
}
