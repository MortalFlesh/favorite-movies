<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\Tag;

class TagRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return Tag::class;
    }
}
