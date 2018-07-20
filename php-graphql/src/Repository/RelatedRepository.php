<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Related;

class RelatedRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Related::class;
    }
}
