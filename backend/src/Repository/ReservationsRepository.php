<?php


namespace App\Repository;


use App\Entity\Reservations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReservationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservations::class);
    }

    public function findUserReservations(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $qb = $entityManager->createQueryBuilder();
        $qb
            ->select('res', 'r', 'a')
            ->from('App\Entity\Reservations', 'res')
            ->leftJoin(
                'App\Entity\Rooms',
                'r',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'res.idRoom = r.idRoom'
            )
            ->leftJoin(
                'App\Entity\Accommodations',
                'a',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'r.idAccommodation = a.idAccommodation'
            )
            ->where('res.idUser = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getResult();

    }
}