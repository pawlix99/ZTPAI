<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="users_id_user_uindex", columns={"id_user"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="users_id_user_seq", allocationSize=1, initialValue=1)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=5, nullable=false, options={"default"="USER"})
     */
    private $role = 'USER';

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=50, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=50, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=15, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=150, nullable=false)
     */
    private $address;


}
