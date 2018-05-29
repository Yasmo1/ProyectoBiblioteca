<?php
// src/AppBundle/Entity/User.php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Usuarios", cascade={"persist", "remove"})
     */
    private $trabajador;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getTrabajador(): ?Usuarios
    {
        return $this->trabajador;
    }

    public function setTrabajador(?Usuarios $trabajador): self
    {
        $this->trabajador = $trabajador;

        return $this;
    }
}