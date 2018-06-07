<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BibliotecaRepository")
 */
class Biblioteca
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
    private $horario;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ServiciosBiblioteca", inversedBy="bibliotecas")
     */
    private $servicios;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Salas", mappedBy="biblioteca")
     */
    private $salas;

    public function __construct()
    {
        $this->servicios = new ArrayCollection();
        $this->salas = new ArrayCollection();
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

    public function getHorario(): ?string
    {
        return $this->horario;
    }

    public function setHorario(string $horario): self
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * @return Collection|ServiciosBiblioteca[]
     */
    public function getServicios(): Collection
    {
        return $this->servicios;
    }

    public function addServicio(ServiciosBiblioteca $servicio): self
    {
        if (!$this->servicios->contains($servicio)) {
            $this->servicios[] = $servicio;
        }

        return $this;
    }

    public function removeServicio(ServiciosBiblioteca $servicio): self
    {
        if ($this->servicios->contains($servicio)) {
            $this->servicios->removeElement($servicio);
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
     * @return Collection|Salas[]
     */
    public function getSalas(): Collection
    {
        return $this->salas;
    }

    public function addSala(Salas $sala): self
    {
        if (!$this->salas->contains($sala)) {
            $this->salas[] = $sala;
            $sala->setBiblioteca($this);
        }

        return $this;
    }

    public function removeSala(Salas $sala): self
    {
        if ($this->salas->contains($sala)) {
            $this->salas->removeElement($sala);
            // set the owning side to null (unless already changed)
            if ($sala->getBiblioteca() === $this) {
                $sala->setBiblioteca(null);
            }
        }

        return $this;
    }
}
