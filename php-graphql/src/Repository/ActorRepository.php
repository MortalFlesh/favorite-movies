<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Actor;

class ActorRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Actor::class;
    }
}
