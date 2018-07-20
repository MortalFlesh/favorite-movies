<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use MF\FavoriteMovies\GraphQL\Entity\Movie;

class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    public function save(Movie $movie): void
    {
        $this->_em->persist($movie);
        $this->_em->flush();
    }

    public function exists(string $link): bool
    {
        return $this->count(['link' => $link]) > 0;
    }

    /** @return Movie[] */
    public function findFirst10(): array
    {
        return $this->createQueryBuilder('m')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
