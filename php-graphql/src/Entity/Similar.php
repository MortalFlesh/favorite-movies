<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MF\FavoriteMovies\GraphQL\Repository\SimilarRepository")
 * @ORM\Table(name="`similar`")
 */
class Similar implements MoviePartInterface
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
     * @ORM\Column(type="string", nullable=true)
     * @var string|null
     */
    private $type;
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $year;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $link;
    /**
     * @ORM\ManyToOne(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Movie", inversedBy="related")
     * @var Movie
     */
    private $movie;

    public function __construct(string $title, ?string $type, int $year, string $link)
    {
        $this->title = $title;
        $this->type = $type;
        $this->year = $year;
        $this->link = $link;
    }

    public function getCollection(Movie $movie): Collection
    {
        return $movie->getSimilars();
    }
}
