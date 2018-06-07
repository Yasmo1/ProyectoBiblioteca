<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoticiasRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $publica;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $portada;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comentarios", mappedBy="noticia_id")
     */
    private $comentarios;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TematicaNoticia", inversedBy="noticias")
     */
    private $categoria;

    public function __construct()
    {
        $this->comentarios = new ArrayCollection();
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->fecha = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }


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

    /**
     * @return Collection|Comentarios[]
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function addComentario(Comentarios $comentario): self
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios[] = $comentario;
            $comentario->setNoticiaId($this);
        }

        return $this;
    }

    public function removeComentario(Comentarios $comentario): self
    {
        if ($this->comentarios->contains($comentario)) {
            $this->comentarios->removeElement($comentario);
            // set the owning side to null (unless already changed)
            if ($comentario->getNoticiaId() === $this) {
                $comentario->setNoticiaId(null);
            }
        }

        return $this;
    }

    public function __tostring()
    {
        return (string)$this->titulo;
    }

    public function getCategoria(): ?TematicaNoticia
    {
        return $this->categoria;
    }

    public function setCategoria(?TematicaNoticia $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }


}
