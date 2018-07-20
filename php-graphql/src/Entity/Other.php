<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MF\FavoriteMovies\GraphQL\Repository\OtherRepository")
 */
class Other implements MoviePartInterface
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
    private $value;
    /**
     * @ORM\ManyToOne(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Movie", inversedBy="others")
     * @var Movie
     */
    private $movie;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getCollection(Movie $movie): Collection
    {
        return $movie->getOthers();
    }
}
