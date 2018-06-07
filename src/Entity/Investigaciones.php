<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InvestigacionesRepository")
 */
class Investigaciones
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
    private $Tipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Tema;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="investigaciones")
     */
    private $JefeProyecto;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechainicio;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechafin;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    public function getId()
    {
        return $this->id;
    }

    public function __tostring()
    {
        return (string)$this->Tema;
    }

    public function getTipo(): ?string
    {
        return $this->Tipo;
    }

    public function setTipo(string $Tipo): self
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    public function getTema(): ?string
    {
        return $this->Tema;
    }

    public function setTema(string $Tema): self
    {
        $this->Tema = $Tema;

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

    public function getFechainicio(): ?\DateTimeInterface
    {
        return $this->fechainicio;
    }

    public function setFechainicio(?\DateTimeInterface $fechainicio): self
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    public function getFechafin(): ?\DateTimeInterface
    {
        return $this->fechafin;
    }

    public function setFechafin(?\DateTimeInterface $fechafin): self
    {
        $this->fechafin = $fechafin;

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
