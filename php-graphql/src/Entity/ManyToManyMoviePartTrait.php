<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Assert\Assertion;

trait ManyToManyMoviePartTrait
{
    final public function addMovie(Movie $movie): void
    {
        Assertion::propertyExists($this, 'movies', sprintf('Class "%s" does not have "movies".', get_class($this)));
        Assertion::notNull($this->movies, sprintf('Class "%s" does not have "movies" instantiated.', get_class($this)));

        if (!$this->movies->contains($movie)) {
            $this->movies->add($movie);
            $movie->addItem($this->getCollection($movie), $this);
        }
    }
}
