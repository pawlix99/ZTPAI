<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeOfRoom
 *
 * @ORM\Table(name="type_of_room", uniqueConstraints={@ORM\UniqueConstraint(name="type_of_room_id_type_of_room_uindex", columns={"id_type_of_room"})})
 * @ORM\Entity
 */
class TypeOfRoom
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_of_room", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="type_of_room_id_type_of_room_seq", allocationSize=1, initialValue=1)
     */
    private $idTypeOfRoom;

    /**
     * @var int
     *
     * @ORM\Column(name="type_of_room", type="integer", nullable=false)
     */
    private $typeOfRoom;


}
