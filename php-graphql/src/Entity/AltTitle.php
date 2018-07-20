<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MF\FavoriteMovies\GraphQL\Repository\AltTitleRepository")
 */
class AltTitle implements MoviePartInterface
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
    private $title;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $flag;
    /**
     * @ORM\ManyToOne(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Movie", inversedBy="altTitles")
     * @var Movie
     */
    private $movie;

    public function __construct(string $title, string $flag)
    {
        $this->title = $title;
        $this->flag = $flag;
    }

    public function getCollection(Movie $movie): Collection
    {
        return $movie->getAltTitles();
    }
}
