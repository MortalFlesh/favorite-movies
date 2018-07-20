<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use MF\Collection\Immutable\ITuple;
use MF\Collection\Immutable\Tuple;

/**
 * @ORM\Entity(repositoryClass="MF\FavoriteMovies\GraphQL\Repository\GenreRepository")
 */
class Genre implements MoviePartInterface, UniquePartInterface
{
    use ManyToManyMoviePartTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int|null
     */
    private $id;
    /**
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $name;
    /**
     * @ORM\ManyToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Movie", inversedBy="genres")
     * @var Movie[]|Collection
     */
    private $movies;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->movies = new ArrayCollection();
    }

    public function getCollection(Movie $movie): Collection
    {
        return $movie->getGenres();
    }

    public function getKey(): ITuple
    {
        return Tuple::of('name', $this->name);
    }
}
