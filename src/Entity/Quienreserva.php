<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuienreservaRepository")
 */
class Quienreserva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $departamento;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $correo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $horainicio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $horafin;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidadparticipantes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Objetivo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="quienreservas")
     */
    private $quienautoriza;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publica;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salas", inversedBy="reservasala")
     */
    private $sala;

    public function __tostring()
    {
        return $this->nombre;
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

    public function getDepartamento(): ?string
    {
        return $this->departamento;
    }

    public function setDepartamento(string $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getHorainicio(): ?\DateTimeInterface
    {
        return $this->horainicio;
    }

    public function setHorainicio(\DateTimeInterface $horainicio): self
    {
        $this->horainicio = $horainicio;

        return $this;
    }

    public function getHorafin(): ?\DateTimeInterface
    {
        return $this->horafin;
    }

    public function setHorafin(\DateTimeInterface $horafin): self
    {
        $this->horafin = $horafin;

        return $this;
    }

    public function getCantidadparticipantes(): ?int
    {
        return $this->cantidadparticipantes;
    }

    public function setCantidadparticipantes(int $cantidadparticipantes): self
    {
        $this->cantidadparticipantes = $cantidadparticipantes;

        return $this;
    }

    public function getObjetivo(): ?string
    {
        return $this->Objetivo;
    }

    public function setObjetivo(?string $Objetivo): self
    {
        $this->Objetivo = $Objetivo;

        return $this;
    }

    public function getQuienautoriza(): ?Usuarios
    {
        return $this->quienautoriza;
    }

    public function setQuienautoriza(?Usuarios $quienautoriza): self
    {
        $this->quienautoriza = $quienautoriza;

        return $this;
    }

    public function getPublica(): ?bool
    {
        return $this->publica;
    }

    public function setPublica(bool $publica): self
    {
        $this->publica = $publica;

        return $this;
    }

    public function getSala(): ?Salas
    {
        return $this->sala;
    }

    public function setSala(?Salas $sala): self
    {
        $this->sala = $sala;

        return $this;
    }
}
