<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalasRepository")
 */
class Salas
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
    private $Nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $Capacidad;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Usuarios", cascade={"persist", "remove"})
     */
    private $responsable;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Quienreserva", mappedBy="sala")
     */
    private $reservasala;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Biblioteca", inversedBy="salas")
     */
    private $biblioteca;

    public function __construct()
    {
        $this->reservasala = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getCapacidad(): ?int
    {
        return $this->Capacidad;
    }

    public function setCapacidad(int $Capacidad): self
    {
        $this->Capacidad = $Capacidad;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getResponsable(): ?Usuarios
    {
        return $this->responsable;
    }

    public function setResponsable(?Usuarios $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * @return Collection|Quienreserva[]
     */
    public function getReservasala(): Collection
    {
        return $this->reservasala;
    }

    public function addReservasala(Quienreserva $reservasala): self
    {
        if (!$this->reservasala->contains($reservasala)) {
            $this->reservasala[] = $reservasala;
            $reservasala->setSala($this);
        }

        return $this;
    }

    public function removeReservasala(Quienreserva $reservasala): self
    {
        if ($this->reservasala->contains($reservasala)) {
            $this->reservasala->removeElement($reservasala);
            // set the owning side to null (unless already changed)
            if ($reservasala->getSala() === $this) {
                $reservasala->setSala(null);
            }
        }

        return $this;
    }

    public function __tostring()
    {
        return (string)$this->Nombre;
    }

    public function getBiblioteca(): ?Biblioteca
    {
        return $this->biblioteca;
    }

    public function setBiblioteca(?Biblioteca $biblioteca): self
    {
        $this->biblioteca = $biblioteca;

        return $this;
    }
}
