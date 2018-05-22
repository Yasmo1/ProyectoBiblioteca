<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComentariosRepository")
 */
class Comentarios
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
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $cuerpo_comen;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publicado;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Noticias", inversedBy="comentarios")
     */
    private $noticia_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RespuestaComentario", mappedBy="comentario")
     */
    private $respuesta;

    public function __construct()
    {
        $this->respuesta = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCuerpoComen(): ?string
    {
        return $this->cuerpo_comen;
    }

    public function setCuerpoComen(string $cuerpo_comen): self
    {
        $this->cuerpo_comen = $cuerpo_comen;

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

    public function getPublicado(): ?bool
    {
        return $this->publicado;
    }

    public function setPublicado(bool $publicado): self
    {
        $this->publicado = $publicado;

        return $this;
    }

    public function getNoticiaId(): ?Noticias
    {
        return $this->noticia_id;
    }

    public function setNoticiaId(?Noticias $noticia_id): self
    {
        $this->noticia_id = $noticia_id;

        return $this;
    }

    /**
     * @return Collection|RespuestaComentario[]
     */
    public function getRespuesta(): Collection
    {
        return $this->respuesta;
    }

    public function addRespuestum(RespuestaComentario $respuestum): self
    {
        if (!$this->respuesta->contains($respuestum)) {
            $this->respuesta[] = $respuestum;
            $respuestum->setComentario($this);
        }

        return $this;
    }

    public function removeRespuestum(RespuestaComentario $respuestum): self
    {
        if ($this->respuesta->contains($respuestum)) {
            $this->respuesta->removeElement($respuestum);
            // set the owning side to null (unless already changed)
            if ($respuestum->getComentario() === $this) {
                $respuestum->setComentario(null);
            }
        }

        return $this;
    }

    public function __tostring()
    {
        return $this->nombre;
    }
}
