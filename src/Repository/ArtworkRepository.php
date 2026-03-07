<?php

namespace App\Repository;

use App\Entity\Artwork;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artwork>
 */
class ArtworkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artwork::class);
    }

    public function findByArtist(int $artistId): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.artist = :artistId')
            ->setParameter('artistId', $artistId)
            ->getQuery()
            ->getResult();
    }

    
    public function findAllSortedByDate(string $order = 'ASC'): array
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.creationDate', $order)
            ->getQuery()
            ->getResult();
    }

    public function findByTitle(string $keyword): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.title LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->getQuery()
            ->getResult();
    }
}
