<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use MF\FavoriteMovies\GraphQL\Entity\UniquePartInterface;

abstract class AbstractMoviePartRepository extends ServiceEntityRepository implements MoviePartRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->getEntityClass());
    }

    abstract protected function getEntityClass(): string;

    public function findByKey(UniquePartInterface $item): UniquePartInterface
    {
        [$field, $value] = $item->getKey();
        $existingItem = $this->findOneBy([$field => $value]);

        return $existingItem ?? $item;
    }
}
