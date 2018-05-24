<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VguiadaRepository")
 */
class Vguiada
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facultad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carrera;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidadestudiantes;

    public function __tostring()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getFacultad(): ?string
    {
        return $this->facultad;
    }

    public function setFacultad(string $facultad): self
    {
        $this->facultad = $facultad;

        return $this;
    }

    public function getCarrera(): ?string
    {
        return $this->carrera;
    }

    public function setCarrera(string $carrera): self
    {
        $this->carrera = $carrera;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getCantidadestudiantes(): ?int
    {
        return $this->cantidadestudiantes;
    }

    public function setCantidadestudiantes(int $cantidadestudiantes): self
    {
        $this->cantidadestudiantes = $cantidadestudiantes;

        return $this;
    }
}
