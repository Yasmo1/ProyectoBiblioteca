<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoticiasRepository")
 */
class Noticias
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
    private $titulo;

    /**
     * @ORM\Column(type="text")
     */
    private $resumen;

    /**
     * @ORM\Column(type="text")
     */
    private $cuerpo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publica;

    /**
     * @ORM\Column(type="boolean")
     */
    private $portada;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tematica;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autor_noticia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autor_foto_portada;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $visitas;

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getResumen(): ?string
    {
        return $this->resumen;
    }

    public function setResumen(string $resumen): self
    {
        $this->resumen = $resumen;

        return $this;
    }

    public function getCuerpo(): ?string
    {
        return $this->cuerpo;
    }

    public function setCuerpo(string $cuerpo): self
    {
        $this->cuerpo = $cuerpo;

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

    public function getPortada(): ?bool
    {
        return $this->portada;
    }

    public function setPortada(bool $portada): self
    {
        $this->portada = $portada;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getTematica(): ?string
    {
        return $this->tematica;
    }

    public function setTematica(string $tematica): self
    {
        $this->tematica = $tematica;

        return $this;
    }

    public function getAutorNoticia(): ?string
    {
        return $this->autor_noticia;
    }

    public function setAutorNoticia(string $autor_noticia): self
    {
        $this->autor_noticia = $autor_noticia;

        return $this;
    }

    public function getAutorFotoPortada(): ?string
    {
        return $this->autor_foto_portada;
    }

    public function setAutorFotoPortada(?string $autor_foto_portada): self
    {
        $this->autor_foto_portada = $autor_foto_portada;

        return $this;
    }

    public function getVisitas(): ?int
    {
        return $this->visitas;
    }

    public function setVisitas(?int $visitas): self
    {
        $this->visitas = $visitas;

        return $this;
    }
}
