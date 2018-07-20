<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MF\FavoriteMovies\GraphQL\Repository\MovieRepository")
 */
class Movie
{
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
     * @ORM\Column(type="integer")
     * @var int
     */
    private $rating;
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $ratingsCount;
    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     * @var \DateTimeImmutable|null
     */
    private $premiereDate;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $link;
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $year;
    /**
     * Minutes
     *
     * @ORM\Column(type="integer")
     * @var int
     */
    private $duration;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string|null
     */
    private $privateMessage;
    /**
     * Stars (0 - 5)
     *
     * @ORM\Column(type="integer", nullable=true)
     * @var int|null
     */
    private $myStars;
    /**
     * @ORM\OneToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\AltTitle", mappedBy="movie", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var AltTitle[]|Collection
     */
    private $altTitles;
    /**
     * @ORM\ManyToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Nation", mappedBy="movies", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Nation[]|Collection
     */
    private $nations;
    /**
     * @ORM\ManyToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Director", mappedBy="movies", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Director[]|Collection
     */
    private $directors;
    /**
     * @ORM\ManyToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Actor", mappedBy="movies", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Actor[]|Collection
     */
    private $actors;
    /**
     * @ORM\OneToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\FriendRating", mappedBy="movie", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var FriendRating[]|Collection
     */
    private $friendRatings;
    /**
     * @ORM\ManyToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Genre", mappedBy="movies", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Genre[]|Collection
     */
    private $genres;
    /**
     * @ORM\OneToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Other", mappedBy="movie", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Other[]|Collection
     */
    private $others;
    /**
     * @ORM\OneToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Premiere", mappedBy="movie", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Premiere[]|Collection
     */
    private $premieres;
    /**
     * @ORM\ManyToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Type", mappedBy="movies", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Type[]|Collection
     */
    private $types;
    /**
     * @ORM\OneToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Related", mappedBy="movie", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Related[]|Collection
     */
    private $related;
    /**
     * @ORM\OneToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Similar", mappedBy="movie", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Similar[]|Collection
     */
    private $similars;
    /**
     * @ORM\ManyToMany(targetEntity="MF\FavoriteMovies\GraphQL\Entity\Tag", mappedBy="movies", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var Tag[]|Collection
     */
    private $tags;

    /**
     * @param Collection|AltTitle[] $altTitles
     * @param Collection|Director[] $directors
     * @param Collection|Actor[] $actors
     * @param Collection|FriendRating[] $friendRatings
     * @param Collection|Genre[] $genres
     * @param Collection|Other[] $others
     * @param Collection|Premiere[] $premieres
     * @param Collection|Type[] $types
     * @param Collection|Related[] $related
     * @param Collection|Similar[] $similars
     * @param Collection|Tag[] $tagss
     */
    public function __construct(
        string $title,
        int $rating,
        int $ratingsCount,
        ?\DateTimeImmutable $premiereDate,
        string $link,
        int $year,
        int $duration,
        ?string $privateMessage,
        ?int $myStars,
        Collection $altTitles,
        Collection $nations,
        Collection $directors,
        Collection $actors,
        Collection $friendRatings,
        Collection $genres,
        Collection $others,
        Collection $premieres,
        Collection $types,
        Collection $related,
        Collection $similars,
        Collection $tags
    ) {
        $this->title = $title;
        $this->rating = $rating;
        $this->ratingsCount = $ratingsCount;
        $this->premiereDate = $premiereDate;
        $this->link = $link;
        $this->year = $year;
        $this->duration = $duration;
        $this->privateMessage = $privateMessage;
        $this->myStars = $myStars;

        $this->altTitles = new ArrayCollection();
        $this->nations = new ArrayCollection();
        $this->directors = new ArrayCollection();
        $this->actors = new ArrayCollection();
        $this->friendRatings = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->others = new ArrayCollection();
        $this->premieres = new ArrayCollection();
        $this->types = new ArrayCollection();
        $this->related = new ArrayCollection();
        $this->similars = new ArrayCollection();
        $this->tags = new ArrayCollection();

        $this->altTitles = $this->setMovieToParts($this->altTitles, $altTitles);
        $this->nations = $this->setMovieToParts($this->nations, $nations);
        $this->directors = $this->setMovieToParts($this->directors, $directors);
        $this->actors = $this->setMovieToParts($this->actors, $actors);
        $this->friendRatings = $this->setMovieToParts($this->friendRatings, $friendRatings);
        $this->genres = $this->setMovieToParts($this->genres, $genres);
        $this->others = $this->setMovieToParts($this->others, $others);
        $this->premieres = $this->setMovieToParts($this->premieres, $premieres);
        $this->types = $this->setMovieToParts($this->types, $types);
        $this->related = $this->setMovieToParts($this->related, $related);
        $this->similars = $this->setMovieToParts($this->similars, $similars);
        $this->tags = $this->setMovieToParts($this->tags, $tags);
    }

    /** @param MoviePartInterface[]|Collection $movieParts */
    private function setMovieToParts(Collection $collection, Collection $movieParts): Collection
    {
        foreach ($movieParts as $item) {
            $this->addItem($collection, $item);
        }

        return $movieParts;
    }

    public function addItem(Collection $collection, MoviePartInterface $moviePart): void
    {
        if (!$collection->contains($moviePart)) {
            $collection->add($moviePart);
            $moviePart->addMovie($this);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getRatingsCount(): int
    {
        return $this->ratingsCount;
    }

    public function getPremiereDate(): \DateTimeImmutable
    {
        return $this->premiereDate;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getPrivateMessage(): string
    {
        return $this->privateMessage;
    }

    public function getMyStars(): int
    {
        return $this->myStars;
    }

    public function getAltTitles(): Collection
    {
        return $this->altTitles;
    }

    public function getDirectors(): Collection
    {
        return $this->directors;
    }

    public function getActors(): Collection
    {
        return $this->actors;
    }

    public function getFriendRatings(): Collection
    {
        return $this->friendRatings;
    }

    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function getOthers(): Collection
    {
        return $this->others;
    }

    public function getPremieres(): Collection
    {
        return $this->premieres;
    }

    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function getRelated()
    {
        return $this->related;
    }

    public function getSimilars()
    {
        return $this->similars;
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function getNations(): Collection
    {
        return $this->nations;
    }
}
