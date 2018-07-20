<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Other;

class OtherRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Other::class;
    }
}
