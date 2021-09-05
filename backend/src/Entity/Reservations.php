<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations", uniqueConstraints={@ORM\UniqueConstraint(name="reservations_id_reservation_uindex", columns={"id_reservation"})}, indexes={@ORM\Index(name="IDX_4DA2396B3CA4B", columns={"id_user"}), @ORM\Index(name="IDX_4DA239F9BF4D99", columns={"id_room"})})
 * @ORM\Entity
 * @ApiResource
 */
class Reservations
{
    /**
     * @var int
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
    public $sinceWhen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="until_when", type="date", nullable=false)
     */
    public $untilWhen;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="idUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    /**
     * @var \Rooms
     *
     * @ORM\ManyToOne(targetEntity="Rooms")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_room", referencedColumnName="id_room")
     * })
     */
    public $idRoom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservation_date", type="date", nullable=false)
     */
    private $reservationDate;

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
    }

    public function getSinceWhen(): ?\DateTime
    {
        return $this->sinceWhen;
    }

    public function setSinceWhen(\DateTime $sinceWhen): self
    {
        $this->sinceWhen = $sinceWhen;

        return $this;
    }

    public function getUntilWhen(): ?\DateTime
    {
        return $this->untilWhen;
    }

    public function setUntilWhen(\DateTime $untilWhen): self
    {
        $this->untilWhen = $untilWhen;

        return $this;
    }

    public function getIdUser(): ?Users
    {
        return $this->idUser;
    }

    public function setIdUser(?Users $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdRoom(): ?Rooms
    {
        return $this->idRoom;
    }

    public function setIdRoom(?Rooms $idRoom): self
    {
        $this->idRoom = $idRoom;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getReservationDate(): \DateTime
    {
        return $this->reservationDate;
    }

    /**
     * @param \DateTime $reservationDate
     */
    public function setReservationDate(\DateTime $reservationDate): void
    {
        $this->reservationDate = $reservationDate;
    }


}
