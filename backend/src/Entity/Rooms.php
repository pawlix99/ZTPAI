<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Rooms
 *
 * @ORM\Table(name="rooms", uniqueConstraints={@ORM\UniqueConstraint(name="rooms_id_room_uindex", columns={"id_room"})}, indexes={@ORM\Index(name="IDX_7CA11A9671CCF4C1", columns={"id_accommodation"})})
 * @ORM\Entity
 * @ApiResource
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
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    public $price;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_people", type="integer", nullable=false)
     */
    public $numberOfPeople;

    /**
     * @var \Accommodations
     *
     * @ORM\ManyToOne(targetEntity="Accommodations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_accommodation", referencedColumnName="id_accommodation")
     * })
     */
    private $idAccommodation;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

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

    public function getNumberOfPeople(): ?int
    {
        return $this->numberOfPeople;
    }

    public function setNumberOfPeople(int $numberOfPeople): self
    {
        $this->numberOfPeople = $numberOfPeople;

        return $this;
    }

    public function getIdAccommodation(): ?Accommodations
    {
        return $this->idAccommodation;
    }

    public function setIdAccommodation(?Accommodations $idAccommodation): self
    {
        $this->idAccommodation = $idAccommodation;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }


}
