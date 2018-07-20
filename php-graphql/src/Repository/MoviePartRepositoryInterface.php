<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use MF\FavoriteMovies\GraphQL\Entity\UniquePartInterface;

interface MoviePartRepositoryInterface
{
    public function findByKey(UniquePartInterface $item): UniquePartInterface;
}
