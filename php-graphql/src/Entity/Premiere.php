<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MF\FavoriteMovies\GraphQL\Repository\PremiereRepository")
 */
class Premiere implements MoviePartInterface
{
    use OneToManyMoviePartTrait;

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
    private $nation;
    /**
     * @ORM\Column(type="date_immutable")
     * @var \DateTimeImmutable
     */
    private $date;
    /**
     * @ORM\ManyToOne(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Movie", inversedBy="premieres")
     * @var Movie
     */
    private $movie;

    public function __construct(string $nation, \DateTimeImmutable $date)
    {
        $this->nation = $nation;
        $this->date = $date;
    }

    public function getCollection(Movie $movie): Collection
    {
        return $movie->getPremieres();
    }
}
