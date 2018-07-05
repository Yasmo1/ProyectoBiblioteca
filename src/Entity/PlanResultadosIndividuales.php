<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanResultadosIndividualesRepository")
 * @Vich\Uploadable
 */
class PlanResultadosIndividuales
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="planderesultadosindividuales")
     */
    private $trabajador;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;

    /**
     * @Vich\UploadableField(mapping="documentosPRI", fileNameProperty="file")
     * @var File
     */
    private $docFile;

    public function setDocFile(File $doc = null)
    {
        $this->docFile = $doc;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($doc) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->fecha = new \DateTime('now');
        }
    }

    public function getDocFile()
    {
        return $this->docFile;
    }

    public function setFile($doc)
    {
        $this->file = $doc;
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    public function __tostring()
    {
        return (string)$this->file;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTrabajador(): ?Usuarios
    {
        return $this->trabajador;
    }

    public function setTrabajador(?Usuarios $trabajador): self
    {
        $this->trabajador = $trabajador;

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
