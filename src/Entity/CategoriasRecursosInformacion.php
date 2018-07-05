<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriasRecursosInformacionRepository")
 */
class CategoriasRecursosInformacion
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
     * @ORM\OneToMany(targetEntity="App\Entity\RecursosInformacion", mappedBy="categoria")
     */
    private $recursosInformacions;

    public function __construct()
    {
        $this->recursosInformacions = new ArrayCollection();
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
     * @return Collection|RecursosInformacion[]
     */
    public function getRecursosInformacions(): Collection
    {
        return $this->recursosInformacions;
    }

    public function addRecursosInformacion(RecursosInformacion $recursosInformacion): self
    {
        if (!$this->recursosInformacions->contains($recursosInformacion)) {
            $this->recursosInformacions[] = $recursosInformacion;
            $recursosInformacion->setCategoria($this);
        }

        return $this;
    }

    public function removeRecursosInformacion(RecursosInformacion $recursosInformacion): self
    {
        if ($this->recursosInformacions->contains($recursosInformacion)) {
            $this->recursosInformacions->removeElement($recursosInformacion);
            // set the owning side to null (unless already changed)
            if ($recursosInformacion->getCategoria() === $this) {
                $recursosInformacion->setCategoria(null);
            }
        }

        return $this;
    }
    public function __tostring()
    {
        return (string)$this->nombre;
    }
}
