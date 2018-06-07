<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PIIRepository")
 */
class PII
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
    private $Alias;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="pIIs")
     */
    private $JefeProyecto;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    public function getId()
    {
        return $this->id;
    }

    public function __tostring()
    {
        return (string)$this->nombre;
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

    public function getAlias(): ?string
    {
        return $this->Alias;
    }

    public function setAlias(string $Alias): self
    {
        $this->Alias = $Alias;

        return $this;
    }

    public function getJefeProyecto(): ?Usuarios
    {
        return $this->JefeProyecto;
    }

    public function setJefeProyecto(?Usuarios $JefeProyecto): self
    {
        $this->JefeProyecto = $JefeProyecto;

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

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}
