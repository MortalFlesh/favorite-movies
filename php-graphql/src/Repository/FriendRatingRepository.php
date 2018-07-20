<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\FriendRating;

class FriendRatingRepository extends AbstractMoviePartRepository
{
    protected function getEntityClass(): string
    {
        return FriendRating::class;
    }
}
