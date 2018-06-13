<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SitiosWebCRAIRepository")
 * @Vich\Uploadable
 */
class SitiosWebCRAI
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
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="sitiosWebCRAIs")
     */
    private $administrador;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tecnologiautilizada;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ipmontadoservicio;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imagenportada;

    /**
     * @Vich\UploadableField(mapping="imagesSitiosWeb", fileNameProperty="imagenportada")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaentradosistema;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tecnologias", inversedBy="sitiosWebCRAIs")
     */
    private $tecnologias;

    public function __construct()
    {
        $this->tecnologias = new ArrayCollection();
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->fechaentradosistema = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImagenportada()
    {
        return $this->imagenportada;
    }

    public function setImagenportada($imagenportada)
    {
        $this->imagenportada = $imagenportada;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAdministrador(): ?Usuarios
    {
        return $this->administrador;
    }

    public function setAdministrador(?Usuarios $administrador): self
    {
        $this->administrador = $administrador;

        return $this;
    }

    public function getTecnologiautilizada(): ?string
    {
        return $this->tecnologiautilizada;
    }

    public function setTecnologiautilizada(?string $tecnologiautilizada): self
    {
        $this->tecnologiautilizada = $tecnologiautilizada;

        return $this;
    }

    public function getIpmontadoservicio(): ?string
    {
        return $this->ipmontadoservicio;
    }

    public function setIpmontadoservicio(string $ipmontadoservicio): self
    {
        $this->ipmontadoservicio = $ipmontadoservicio;

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

    public function getFechaentradosistema(): ?\DateTimeInterface
    {
        return $this->fechaentradosistema;
    }

    public function setFechaentradosistema(?\DateTimeInterface $fechaentradosistema): self
    {
        $this->fechaentradosistema = $fechaentradosistema;

        return $this;
    }

    /**
     * @return Collection|Tecnologias[]
     */
    public function getTecnologias(): Collection
    {
        return $this->tecnologias;
    }

    public function addTecnologia(Tecnologias $tecnologia): self
    {
        if (!$this->tecnologias->contains($tecnologia)) {
            $this->tecnologias[] = $tecnologia;
        }

        return $this;
    }

    public function removeTecnologia(Tecnologias $tecnologia): self
    {
        if ($this->tecnologias->contains($tecnologia)) {
            $this->tecnologias->removeElement($tecnologia);
        }

        return $this;
    }


}
