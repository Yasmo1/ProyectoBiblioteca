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
    private $tiporesultado;

    /**
     * @ORM\Column(type="text")
     */
    private $relevancia;

    /**
     * @ORM\Column(type="integer")
     */
    private $anno;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="resultados")
     */
    private $JefeProyecto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Liniainvestigacion", inversedBy="resultados")
     */
    private $lineaI;

    public function getId()
    {
        return $this->id;
    }

    public function __tostring()
    {
        return (string)$this->Resultado;
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

    public function getAnno(): ?int
    {
        return $this->anno;
    }

    public function setAnno(int $anno): self
    {
        $this->anno = $anno;

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

    public function getLineaI(): ?Liniainvestigacion
    {
        return $this->lineaI;
    }

    public function setLineaI(?Liniainvestigacion $lineaI): self
    {
        $this->lineaI = $lineaI;

        return $this;
    }
}
