<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiciosBibliotecaRepository")
 */
class ServiciosBiblioteca
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Biblioteca", mappedBy="servicios")
     */
    private $bibliotecas;

    public function __construct()
    {
        $this->bibliotecas = new ArrayCollection();
    }

    public function __tostring()
    {
        return (string)$this->nombre;
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
     * @return Collection|Biblioteca[]
     */
    public function getBibliotecas(): Collection
    {
        return $this->bibliotecas;
    }

    public function addBiblioteca(Biblioteca $biblioteca): self
    {
        if (!$this->bibliotecas->contains($biblioteca)) {
            $this->bibliotecas[] = $biblioteca;
            $biblioteca->addServicio($this);
        }

        return $this;
    }

    public function removeBiblioteca(Biblioteca $biblioteca): self
    {
        if ($this->bibliotecas->contains($biblioteca)) {
            $this->bibliotecas->removeElement($biblioteca);
            $biblioteca->removeServicio($this);
        }

        return $this;
    }
}
