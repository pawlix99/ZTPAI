<?php


namespace App\Repository;


use App\Entity\Accommodations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AccommodationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Accommodations::class);
    }

    public function findAccommodationsByPlace(string $place)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            "SELECT a
            FROM App\Entity\Accommodations a
            WHERE a.address LIKE '%$place%'"
        );

        return $query->getResult();
    }
}