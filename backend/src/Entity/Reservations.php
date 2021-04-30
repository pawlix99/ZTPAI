<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations", uniqueConstraints={@ORM\UniqueConstraint(name="reservations_id_reservation_uindex", columns={"id_reservation"})}, indexes={@ORM\Index(name="IDX_4DA23971CCF4C1", columns={"id_accomodation"}), @ORM\Index(name="IDX_4DA239DC47C32F", columns={"id_type_of_room"}), @ORM\Index(name="IDX_4DA2396B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class Reservations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="reservations_id_reservation_seq", allocationSize=1, initialValue=1)
     */
    private $idReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="since_when", type="date", nullable=false)
     */
    private $sinceWhen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="until_when", type="date", nullable=false)
     */
    private $untilWhen;

    /**
     * @var \Accomodations
     *
     * @ORM\ManyToOne(targetEntity="Accomodations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_accomodation", referencedColumnName="id_accomodation")
     * })
     */
    private $idAccomodation;

    /**
     * @var \TypeOfRoom
     *
     * @ORM\ManyToOne(targetEntity="TypeOfRoom")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_of_room", referencedColumnName="id_type_of_room")
     * })
     */
    private $idTypeOfRoom;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;


}
