<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MF\FavoriteMovies\GraphQL\Repository\FriendRatingRepository")
 */
class FriendRating implements MoviePartInterface
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
    private $name;
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $stars;
    /**
     * @ORM\ManyToOne(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Movie", inversedBy="friendRatings")
     * @var Movie
     */
    private $movie;

    public function __construct(string $name, int $stars)
    {
        $this->name = $name;
        $this->stars = $stars;
    }

    public function getCollection(Movie $movie): Collection
    {
        return $movie->getFriendRatings();
    }
}
