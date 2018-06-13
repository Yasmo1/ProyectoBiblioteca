<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TecnologiasRepository")
 */
class Tecnologias
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Usuarios", inversedBy="tecnologias")
     */
    private $especialistas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SitiosWebCRAI", mappedBy="tecnologias")
     */
    private $sitiosWebCRAIs;

    public function __construct()
    {
        $this->especialistas = new ArrayCollection();
        $this->sitiosWebCRAIs = new ArrayCollection();
    }

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

    /**
     * @return Collection|Usuarios[]
     */
    public function getEspecialistas(): Collection
    {
        return $this->especialistas;
    }

    public function addEspecialista(Usuarios $especialista): self
    {
        if (!$this->especialistas->contains($especialista)) {
            $this->especialistas[] = $especialista;
        }

        return $this;
    }

    public function removeEspecialista(Usuarios $especialista): self
    {
        if ($this->especialistas->contains($especialista)) {
            $this->especialistas->removeElement($especialista);
        }

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
     * @return Collection|SitiosWebCRAI[]
     */
    public function getSitiosWebCRAIs(): Collection
    {
        return $this->sitiosWebCRAIs;
    }

    public function addSitiosWebCRAI(SitiosWebCRAI $sitiosWebCRAI): self
    {
        if (!$this->sitiosWebCRAIs->contains($sitiosWebCRAI)) {
            $this->sitiosWebCRAIs[] = $sitiosWebCRAI;
            $sitiosWebCRAI->addTecnologia($this);
        }

        return $this;
    }

    public function removeSitiosWebCRAI(SitiosWebCRAI $sitiosWebCRAI): self
    {
        if ($this->sitiosWebCRAIs->contains($sitiosWebCRAI)) {
            $this->sitiosWebCRAIs->removeElement($sitiosWebCRAI);
            $sitiosWebCRAI->removeTecnologia($this);
        }

        return $this;
    }
}
