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

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AsignaturaServicioPregrado", mappedBy="profesores")
     */
    private $asignaturaServicioPregrados;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Investigaciones", mappedBy="JefeProyecto")
     */
    private $investigaciones;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PII", mappedBy="JefeProyecto")
     */
    private $pIIs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SitiosWebCRAI", mappedBy="administrador")
     */
    private $sitiosWebCRAIs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tecnologias", mappedBy="especialistas")
     */
    private $tecnologias;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $EsMaster;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $EsDoctor;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $EsAdiestrado;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultados", mappedBy="JefeProyecto")
     */
    private $resultados;

    public function __construct()
    {
        $this->grupodetrabajo = new ArrayCollection();
        $this->planderesultadosindividuales = new ArrayCollection();
        $this->quienreservas = new ArrayCollection();
        $this->asignaturaServicioPregrados = new ArrayCollection();
        $this->investigaciones = new ArrayCollection();
        $this->pIIs = new ArrayCollection();
        $this->sitiosWebCRAIs = new ArrayCollection();
        $this->tecnologias = new ArrayCollection();
        $this->resultados = new ArrayCollection();
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
        return (string)$this->nombre;
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

    /**
     * @return Collection|AsignaturaServicioPregrado[]
     */
    public function getAsignaturaServicioPregrados(): Collection
    {
        return $this->asignaturaServicioPregrados;
    }

    public function addAsignaturaServicioPregrado(AsignaturaServicioPregrado $asignaturaServicioPregrado): self
    {
        if (!$this->asignaturaServicioPregrados->contains($asignaturaServicioPregrado)) {
            $this->asignaturaServicioPregrados[] = $asignaturaServicioPregrado;
            $asignaturaServicioPregrado->addProfesore($this);
        }

        return $this;
    }

    public function removeAsignaturaServicioPregrado(AsignaturaServicioPregrado $asignaturaServicioPregrado): self
    {
        if ($this->asignaturaServicioPregrados->contains($asignaturaServicioPregrado)) {
            $this->asignaturaServicioPregrados->removeElement($asignaturaServicioPregrado);
            $asignaturaServicioPregrado->removeProfesore($this);
        }

        return $this;
    }

    /**
     * @return Collection|Investigaciones[]
     */
    public function getInvestigaciones(): Collection
    {
        return $this->investigaciones;
    }

    public function addInvestigacione(Investigaciones $investigacione): self
    {
        if (!$this->investigaciones->contains($investigacione)) {
            $this->investigaciones[] = $investigacione;
            $investigacione->setJefeProyecto($this);
        }

        return $this;
    }

    public function removeInvestigacione(Investigaciones $investigacione): self
    {
        if ($this->investigaciones->contains($investigacione)) {
            $this->investigaciones->removeElement($investigacione);
            // set the owning side to null (unless already changed)
            if ($investigacione->getJefeProyecto() === $this) {
                $investigacione->setJefeProyecto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PII[]
     */
    public function getPIIs(): Collection
    {
        return $this->pIIs;
    }

    public function addPII(PII $pII): self
    {
        if (!$this->pIIs->contains($pII)) {
            $this->pIIs[] = $pII;
            $pII->setJefeProyecto($this);
        }

        return $this;
    }

    public function removePII(PII $pII): self
    {
        if ($this->pIIs->contains($pII)) {
            $this->pIIs->removeElement($pII);
            // set the owning side to null (unless already changed)
            if ($pII->getJefeProyecto() === $this) {
                $pII->setJefeProyecto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SitiosWebCRAI[]
     */
    public function getSitiosWebCRAIs(): Collection
    {
        return $this->sitiosWebCRAIs;
    }

    public function addSitiosWebCRAI(SitiosWebCRAI $sitiosWebCRAI): self
    {
        if (!$this->sitiosWebCRAIs->contains($sitiosWebCRAI)) {
            $this->sitiosWebCRAIs[] = $sitiosWebCRAI;
            $sitiosWebCRAI->setAdministrador($this);
        }

        return $this;
    }

    public function removeSitiosWebCRAI(SitiosWebCRAI $sitiosWebCRAI): self
    {
        if ($this->sitiosWebCRAIs->contains($sitiosWebCRAI)) {
            $this->sitiosWebCRAIs->removeElement($sitiosWebCRAI);
            // set the owning side to null (unless already changed)
            if ($sitiosWebCRAI->getAdministrador() === $this) {
                $sitiosWebCRAI->setAdministrador(null);
            }
        }

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
            $tecnologia->addEspecialista($this);
        }

        return $this;
    }

    public function removeTecnologia(Tecnologias $tecnologia): self
    {
        if ($this->tecnologias->contains($tecnologia)) {
            $this->tecnologias->removeElement($tecnologia);
            $tecnologia->removeEspecialista($this);
        }

        return $this;
    }

    public function getEsMaster(): ?bool
    {
        return $this->EsMaster;
    }

    public function setEsMaster(?bool $EsMaster): self
    {
        $this->EsMaster = $EsMaster;

        return $this;
    }

    public function getEsDoctor(): ?bool
    {
        return $this->EsDoctor;
    }

    public function setEsDoctor(?bool $EsDoctor): self
    {
        $this->EsDoctor = $EsDoctor;

        return $this;
    }

    public function getEsAdiestrado(): ?bool
    {
        return $this->EsAdiestrado;
    }

    public function setEsAdiestrado(?bool $EsAdiestrado): self
    {
        $this->EsAdiestrado = $EsAdiestrado;

        return $this;
    }

    /**
     * @return Collection|Resultados[]
     */
    public function getResultados(): Collection
    {
        return $this->resultados;
    }

    public function addResultado(Resultados $resultado): self
    {
        if (!$this->resultados->contains($resultado)) {
            $this->resultados[] = $resultado;
            $resultado->setJefeProyecto($this);
        }

        return $this;
    }

    public function removeResultado(Resultados $resultado): self
    {
        if ($this->resultados->contains($resultado)) {
            $this->resultados->removeElement($resultado);
            // set the owning side to null (unless already changed)
            if ($resultado->getJefeProyecto() === $this) {
                $resultado->setJefeProyecto(null);
            }
        }

        return $this;
    }


}
