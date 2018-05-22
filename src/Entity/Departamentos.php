<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartamentosRepository")
 */
class Departamentos
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuarios", mappedBy="departamento")
     */
    private $trabajadores;

    public function __construct()
    {
        $this->trabajadores = new ArrayCollection();
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Usuarios[]
     */
    public function getTrabajadores(): Collection
    {
        return $this->trabajadores;
    }

    public function addTrabajadore(Usuarios $trabajadore): self
    {
        if (!$this->trabajadores->contains($trabajadore)) {
            $this->trabajadores[] = $trabajadore;
            $trabajadore->setDepartamento($this);
        }

        return $this;
    }

    public function removeTrabajadore(Usuarios $trabajadore): self
    {
        if ($this->trabajadores->contains($trabajadore)) {
            $this->trabajadores->removeElement($trabajadore);
            // set the owning side to null (unless already changed)
            if ($trabajadore->getDepartamento() === $this) {
                $trabajadore->setDepartamento(null);
            }
        }

        return $this;
    }

    public function __tostring()
    {
        return $this->nombre;
    }
}
