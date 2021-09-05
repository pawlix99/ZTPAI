<?php


namespace App\Repository;


use App\Entity\Rooms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rooms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rooms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rooms[]    findAll()
 * @method Rooms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rooms::class);
    }

    /**
     * @param int $id
     * @param string $begin
     * @param string $end
     * @return Rooms[]
     */
    public function findAvailableRooms(int $id, string $begin, string $end): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\Rooms r
            WHERE r.idAccommodation = :id AND r.idRoom NOT IN
            (SELECT res
            FROM App\Entity\Reservations res
            WHERE (:begin >= res.sinceWhen AND :begin < res.untilWhen)
             OR (:end > res.sinceWhen AND :end <= res.untilWhen)
             OR (:begin < res.sinceWhen AND :end > res.untilWhen))'
        )->setParameters(new ArrayCollection([
            new Parameter('id', $id),
            new Parameter('begin', $begin),
            new Parameter('end', $end)
        ]));

        // returns an array of Product objects
        return $query->getResult();
    }

    public function findAllRooms(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\Rooms r
            WHERE r.idAccommodation = :id'
        )->setParameter('id', $id);

        return $query->getResult();

    }

    public function findRoom(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\Rooms r
            WHERE r.idRoom = :id'
        )->setParameter('id', $id);

        return $query->getResult();

    }

}