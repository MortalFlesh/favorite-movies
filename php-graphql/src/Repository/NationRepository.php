<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Nation;

class NationRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Nation::class;
    }
}
