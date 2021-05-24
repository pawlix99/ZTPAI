<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rooms
 *
 * @ORM\Table(name="rooms", uniqueConstraints={@ORM\UniqueConstraint(name="rooms_id_room_uindex", columns={"id_room"})}, indexes={@ORM\Index(name="IDX_7CA11A9671CCF4C1", columns={"id_accomodation"}), @ORM\Index(name="IDX_7CA11A96DC47C32F", columns={"id_type_of_room"})})
 * @ORM\Entity
 */
class Rooms
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_room", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rooms_id_room_seq", allocationSize=1, initialValue=1)
     */
    private $idRoom;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

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

    public function getIdRoom(): ?int
    {
        return $this->idRoom;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getIdAccomodation(): ?Accomodations
    {
        return $this->idAccomodation;
    }

    public function setIdAccomodation(?Accomodations $idAccomodation): self
    {
        $this->idAccomodation = $idAccomodation;

        return $this;
    }

    public function getIdTypeOfRoom(): ?TypeOfRoom
    {
        return $this->idTypeOfRoom;
    }

    public function setIdTypeOfRoom(?TypeOfRoom $idTypeOfRoom): self
    {
        $this->idTypeOfRoom = $idTypeOfRoom;

        return $this;
    }


}
