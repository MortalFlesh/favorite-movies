<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use MF\Collection\Immutable\ITuple;

interface UniquePartInterface
{
    public function getKey(): ITuple;
}
