<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accomodations
 *
 * @ORM\Table(name="accomodations", uniqueConstraints={@ORM\UniqueConstraint(name="accomodations_id_accomodation_uindex", columns={"id_accomodation"})})
 * @ORM\Entity
 */
class Accomodations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_accomodation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="accomodations_id_accomodation_seq", allocationSize=1, initialValue=1)
     */
    private $idAccomodation;

    /**
     * @var int
     *
     * @ORM\Column(name="name", type="integer", nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=200, nullable=false)
     */
    private $address;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_rooms", type="integer", nullable=false)
     */
    private $numberOfRooms;

    /**
     * @var int|null
     *
     * @ORM\Column(name="total_stars", type="integer", nullable=true)
     */
    private $totalStars;

    /**
     * @var int|null
     *
     * @ORM\Column(name="total_votes", type="integer", nullable=true)
     */
    private $totalVotes;

    public function getIdAccomodation(): ?int
    {
        return $this->idAccomodation;
    }

    public function getName(): ?int
    {
        return $this->name;
    }

    public function setName(int $name): self
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

    public function getTotalStars(): ?int
    {
        return $this->totalStars;
    }

    public function setTotalStars(?int $totalStars): self
    {
        $this->totalStars = $totalStars;

        return $this;
    }

    public function getTotalVotes(): ?int
    {
        return $this->totalVotes;
    }

    public function setTotalVotes(?int $totalVotes): self
    {
        $this->totalVotes = $totalVotes;

        return $this;
    }


}
