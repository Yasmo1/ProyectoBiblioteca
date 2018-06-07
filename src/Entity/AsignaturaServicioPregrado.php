<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AsignaturaServicioPregradoRepository")
 */
class AsignaturaServicioPregrado
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Usuarios", inversedBy="asignaturaServicioPregrados")
     */
    private $profesores;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Carrera", mappedBy="asignaturas")
     */
    private $carreras;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Semestre", mappedBy="asignaturas")
     */
    private $semestres;

    public function __construct()
    {
        $this->profesores = new ArrayCollection();
        $this->carreras = new ArrayCollection();
        $this->semestres = new ArrayCollection();
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

    /**
     * @return Collection|Usuarios[]
     */
    public function getProfesores(): Collection
    {
        return $this->profesores;
    }

    public function addProfesore(Usuarios $profesore): self
    {
        if (!$this->profesores->contains($profesore)) {
            $this->profesores[] = $profesore;
        }

        return $this;
    }

    public function removeProfesore(Usuarios $profesore): self
    {
        if ($this->profesores->contains($profesore)) {
            $this->profesores->removeElement($profesore);
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
     * @return Collection|Carrera[]
     */
    public function getCarreras(): Collection
    {
        return $this->carreras;
    }

    public function addCarrera(Carrera $carrera): self
    {
        if (!$this->carreras->contains($carrera)) {
            $this->carreras[] = $carrera;
            $carrera->addAsignatura($this);
        }

        return $this;
    }

    public function removeCarrera(Carrera $carrera): self
    {
        if ($this->carreras->contains($carrera)) {
            $this->carreras->removeElement($carrera);
            $carrera->removeAsignatura($this);
        }

        return $this;
    }

    /**
     * @return Collection|Semestre[]
     */
    public function getSemestres(): Collection
    {
        return $this->semestres;
    }

    public function addSemestre(Semestre $semestre): self
    {
        if (!$this->semestres->contains($semestre)) {
            $this->semestres[] = $semestre;
            $semestre->addAsignatura($this);
        }

        return $this;
    }

    public function removeSemestre(Semestre $semestre): self
    {
        if ($this->semestres->contains($semestre)) {
            $this->semestres->removeElement($semestre);
            $semestre->removeAsignatura($this);
        }

        return $this;
    }
}
