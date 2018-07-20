<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Type;

class TypeRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Type::class;
    }
}
