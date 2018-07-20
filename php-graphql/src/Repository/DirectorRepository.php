<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Director;

class DirectorRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Director::class;
    }
}
