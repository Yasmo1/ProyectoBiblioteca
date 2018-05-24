<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuariosRepository")
 * @Vich\Uploadable
 */
class Usuarios
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cargo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $funcion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="imagesfotostrabajadores", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $direccionparticular;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $DNI;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $numerocelular;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EstadoCivil;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $categoriadocente;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $CategoriaCientifica;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Departamentos", inversedBy="trabajadores")
     */
    private $departamento;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\GruposDeTrabajo", inversedBy="trabajadores")
     */
    private $grupodetrabajo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $EsDocente;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlanResultadosIndividuales", mappedBy="trabajador")
     */
    private $planderesultadosindividuales;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Quienreserva", mappedBy="quienautoriza")
     */
    private $quienreservas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nivelescolar;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechanacimiento;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaentradosistema;

    public function __construct()
    {
        $this->grupodetrabajo = new ArrayCollection();
        $this->planderesultadosindividuales = new ArrayCollection();
        $this->quienreservas = new ArrayCollection();
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(?string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getFuncion(): ?string
    {
        return $this->funcion;
    }

    public function setFuncion(?string $funcion): self
    {
        $this->funcion = $funcion;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getDireccionparticular(): ?string
    {
        return $this->direccionparticular;
    }

    public function setDireccionparticular(?string $direccionparticular): self
    {
        $this->direccionparticular = $direccionparticular;

        return $this;
    }

    public function getDNI(): ?string
    {
        return $this->DNI;
    }

    public function setDNI(?string $DNI): self
    {
        $this->DNI = $DNI;

        return $this;
    }

    public function getNumerocelular(): ?string
    {
        return $this->numerocelular;
    }

    public function setNumerocelular(?string $numerocelular): self
    {
        $this->numerocelular = $numerocelular;

        return $this;
    }

    public function getEstadoCivil(): ?string
    {
        return $this->EstadoCivil;
    }

    public function setEstadoCivil(?string $EstadoCivil): self
    {
        $this->EstadoCivil = $EstadoCivil;

        return $this;
    }

    public function getCategoriadocente(): ?string
    {
        return $this->categoriadocente;
    }

    public function setCategoriadocente(?string $categoriadocente): self
    {
        $this->categoriadocente = $categoriadocente;

        return $this;
    }

    public function getCategoriaCientifica(): ?string
    {
        return $this->CategoriaCientifica;
    }

    public function setCategoriaCientifica(?string $CategoriaCientifica): self
    {
        $this->CategoriaCientifica = $CategoriaCientifica;

        return $this;
    }

    public function getDepartamento(): ?Departamentos
    {
        return $this->departamento;
    }

    public function setDepartamento(?Departamentos $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * @return Collection|GruposDeTrabajo[]
     */
    public function getGrupodetrabajo(): Collection
    {
        return $this->grupodetrabajo;
    }

    public function addGrupodetrabajo(GruposDeTrabajo $grupodetrabajo): self
    {
        if (!$this->grupodetrabajo->contains($grupodetrabajo)) {
            $this->grupodetrabajo[] = $grupodetrabajo;
        }

        return $this;
    }

    public function removeGrupodetrabajo(GruposDeTrabajo $grupodetrabajo): self
    {
        if ($this->grupodetrabajo->contains($grupodetrabajo)) {
            $this->grupodetrabajo->removeElement($grupodetrabajo);
        }

        return $this;
    }

    public function getEsDocente(): ?bool
    {
        return $this->EsDocente;
    }

    public function setEsDocente(bool $EsDocente): self
    {
        $this->EsDocente = $EsDocente;

        return $this;
    }

    /**
     * @return Collection|PlanResultadosIndividuales[]
     */
    public function getPlanderesultadosindividuales(): Collection
    {
        return $this->planderesultadosindividuales;
    }

    public function addPlanderesultadosindividuale(PlanResultadosIndividuales $planderesultadosindividuale): self
    {
        if (!$this->planderesultadosindividuales->contains($planderesultadosindividuale)) {
            $this->planderesultadosindividuales[] = $planderesultadosindividuale;
            $planderesultadosindividuale->setTrabajador($this);
        }

        return $this;
    }

    public function removePlanderesultadosindividuale(PlanResultadosIndividuales $planderesultadosindividuale): self
    {
        if ($this->planderesultadosindividuales->contains($planderesultadosindividuale)) {
            $this->planderesultadosindividuales->removeElement($planderesultadosindividuale);
            // set the owning side to null (unless already changed)
            if ($planderesultadosindividuale->getTrabajador() === $this) {
                $planderesultadosindividuale->setTrabajador(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Quienreserva[]
     */
    public function getQuienreservas(): Collection
    {
        return $this->quienreservas;
    }

    public function addQuienreserva(Quienreserva $quienreserva): self
    {
        if (!$this->quienreservas->contains($quienreserva)) {
            $this->quienreservas[] = $quienreserva;
            $quienreserva->setQuienautoriza($this);
        }

        return $this;
    }

    public function removeQuienreserva(Quienreserva $quienreserva): self
    {
        if ($this->quienreservas->contains($quienreserva)) {
            $this->quienreservas->removeElement($quienreserva);
            // set the owning side to null (unless already changed)
            if ($quienreserva->getQuienautoriza() === $this) {
                $quienreserva->setQuienautoriza(null);
            }
        }

        return $this;
    }

    public function __tostring()
    {
        return $this->nombre;
    }

    public function getNivelescolar(): ?string
    {
        return $this->nivelescolar;
    }

    public function setNivelescolar(string $nivelescolar): self
    {
        $this->nivelescolar = $nivelescolar;

        return $this;
    }

    public function getFechanacimiento(): ?\DateTimeInterface
    {
        return $this->fechanacimiento;
    }

    public function setFechanacimiento(\DateTimeInterface $fechanacimiento): self
    {
        $this->fechanacimiento = $fechanacimiento;

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


}
