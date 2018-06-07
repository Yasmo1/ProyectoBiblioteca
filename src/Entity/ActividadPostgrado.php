<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActividadPostgradoRepository")
 */
class ActividadPostgrado
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
     * @ORM\Column(type="datetime")
     */
    private $fechainicio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechafin;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\OrganismosPostgrado", mappedBy="actividades")
     */
    private $organismosPostgrados;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoActividadPostgrado", inversedBy="actividadPostgrados")
     */
    private $tipoactividadpostgrado;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    public function __construct()
    {
        $this->organismosPostgrados = new ArrayCollection();
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

    public function getFechainicio(): ?\DateTimeInterface
    {
        return $this->fechainicio;
    }

    public function setFechainicio(\DateTimeInterface $fechainicio): self
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    public function getFechafin(): ?\DateTimeInterface
    {
        return $this->fechafin;
    }

    public function setFechafin(\DateTimeInterface $fechafin): self
    {
        $this->fechafin = $fechafin;

        return $this;
    }

    /**
     * @return Collection|OrganismosPostgrado[]
     */
    public function getOrganismosPostgrados(): Collection
    {
        return $this->organismosPostgrados;
    }

    public function addOrganismosPostgrado(OrganismosPostgrado $organismosPostgrado): self
    {
        if (!$this->organismosPostgrados->contains($organismosPostgrado)) {
            $this->organismosPostgrados[] = $organismosPostgrado;
            $organismosPostgrado->addActividade($this);
        }

        return $this;
    }

    public function removeOrganismosPostgrado(OrganismosPostgrado $organismosPostgrado): self
    {
        if ($this->organismosPostgrados->contains($organismosPostgrado)) {
            $this->organismosPostgrados->removeElement($organismosPostgrado);
            $organismosPostgrado->removeActividade($this);
        }

        return $this;
    }

    public function getTipoactividadpostgrado(): ?TipoActividadPostgrado
    {
        return $this->tipoactividadpostgrado;
    }

    public function setTipoactividadpostgrado(?TipoActividadPostgrado $tipoactividadpostgrado): self
    {
        $this->tipoactividadpostgrado = $tipoactividadpostgrado;

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
}
