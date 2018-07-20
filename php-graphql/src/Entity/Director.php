<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use MF\Collection\Immutable\ITuple;
use MF\Collection\Immutable\Tuple;

/**
 * @ORM\Entity(repositoryClass="MF\FavoriteMovies\GraphQL\Repository\DirectorRepository")
 */
class Director implements MoviePartInterface, UniquePartInterface
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $link;
    /**
     * @ORM\ManyToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Movie", inversedBy="directors")
     * @var Movie[]|Collection
     */
    private $movies;

    public function __construct(string $name, string $link)
    {
        $this->name = $name;
        $this->link = $link;
        $this->movies = new ArrayCollection();
    }

    public function getCollection(Movie $movie): Collection
    {
        return $movie->getDirectors();
    }

    public function getKey(): ITuple
    {
        return Tuple::of('link', $this->link);
    }
}
