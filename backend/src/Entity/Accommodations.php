<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Accommodations
 *
 * @ORM\Table(name="accommodations", uniqueConstraints={@ORM\UniqueConstraint(name="accommodations_id_accommodation_uindex", columns={"id_accommodation"})})
 * @ORM\Entity
 * @ApiResource
 */
class Accommodations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_accommodation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="accommodations_id_accommodation_seq", allocationSize=1, initialValue=1)
     */
    private $idAccommodation;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    public $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    public $address;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_rooms", type="integer", nullable=false)
     */
    private $numberOfRooms;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    public $image;

    public function getIdAccommodation(): ?int
    {
        return $this->idAccommodation;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getNumberOfRooms(): ?int
    {
        return $this->numberOfRooms;
    }

    public function setNumberOfRooms(int $numberOfRooms): self
    {
        $this->numberOfRooms = $numberOfRooms;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
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
