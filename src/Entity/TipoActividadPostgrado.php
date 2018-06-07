<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoActividadPostgradoRepository")
 */
class TipoActividadPostgrado
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
     * @ORM\OneToMany(targetEntity="App\Entity\ActividadPostgrado", mappedBy="tipoactividadpostgrado")
     */
    private $actividadPostgrados;

    public function __construct()
    {
        $this->actividadPostgrados = new ArrayCollection();
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
     * @return Collection|ActividadPostgrado[]
     */
    public function getActividadPostgrados(): Collection
    {
        return $this->actividadPostgrados;
    }

    public function addActividadPostgrado(ActividadPostgrado $actividadPostgrado): self
    {
        if (!$this->actividadPostgrados->contains($actividadPostgrado)) {
            $this->actividadPostgrados[] = $actividadPostgrado;
            $actividadPostgrado->setTipoactividadpostgrado($this);
        }

        return $this;
    }

    public function removeActividadPostgrado(ActividadPostgrado $actividadPostgrado): self
    {
        if ($this->actividadPostgrados->contains($actividadPostgrado)) {
            $this->actividadPostgrados->removeElement($actividadPostgrado);
            // set the owning side to null (unless already changed)
            if ($actividadPostgrado->getTipoactividadpostgrado() === $this) {
                $actividadPostgrado->setTipoactividadpostgrado(null);
            }
        }

        return $this;
    }
}
