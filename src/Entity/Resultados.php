<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultadosRepository")
 */
class Resultados
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechainicio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechafin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $proyecto;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Resultado;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tiporesultado;

    /**
     * @ORM\Column(type="text")
     */
    private $relevancia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lineainvestigacion;

    public function getId()
    {
        return $this->id;
    }

    public function __tostring()
    {
        return (string)$this->Resultado;
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

    public function getProyecto(): ?string
    {
        return $this->proyecto;
    }

    public function setProyecto(string $proyecto): self
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    public function getResultado(): ?string
    {
        return $this->Resultado;
    }

    public function setResultado(?string $Resultado): self
    {
        $this->Resultado = $Resultado;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getTiporesultado(): ?string
    {
        return $this->tiporesultado;
    }

    public function setTiporesultado(string $tiporesultado): self
    {
        $this->tiporesultado = $tiporesultado;

        return $this;
    }

    public function getRelevancia(): ?string
    {
        return $this->relevancia;
    }

    public function setRelevancia(string $relevancia): self
    {
        $this->relevancia = $relevancia;

        return $this;
    }

    public function getLineainvestigacion(): ?string
    {
        return $this->lineainvestigacion;
    }

    public function setLineainvestigacion(string $lineainvestigacion): self
    {
        $this->lineainvestigacion = $lineainvestigacion;

        return $this;
    }
}
