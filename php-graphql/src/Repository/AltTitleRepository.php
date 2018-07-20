<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\AltTitle;

class AltTitleRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return AltTitle::class;
    }
}
