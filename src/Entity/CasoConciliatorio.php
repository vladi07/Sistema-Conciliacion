<?php

namespace App\Entity;

use App\Repository\CasoConciliatorioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CasoConciliatorioRepository::class)
 */
class CasoConciliatorio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $idioma;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motivoRechazo;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $registroAsistencia;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $detalleAsistencia;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $etapa;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Centro", inversedBy="casoConciliatorio")
     */
    private $centro;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documentacion", mappedBy="casoConciliatorio")
     */
    private $documentacion;

    /**
     * @ORM\ManyToMany(targetEntity=Usuarios::class, mappedBy="casoConciliatorio")
     */
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getIdioma(): ?string
    {
        return $this->idioma;
    }

    public function setIdioma(?string $idioma): self
    {
        $this->idioma = $idioma;

        return $this;
    }

    public function getMotivoRechazo(): ?string
    {
        return $this->motivoRechazo;
    }

    public function setMotivoRechazo(?string $motivoRechazo): self
    {
        $this->motivoRechazo = $motivoRechazo;

        return $this;
    }

    public function getRegistroAsistencia(): ?\DateTimeInterface
    {
        return $this->registroAsistencia;
    }

    public function setRegistroAsistencia(?\DateTimeInterface $registroAsistencia): self
    {
        $this->registroAsistencia = $registroAsistencia;

        return $this;
    }

    public function getDetalleAsistencia(): ?string
    {
        return $this->detalleAsistencia;
    }

    public function setDetalleAsistencia(?string $detalleAsistencia): self
    {
        $this->detalleAsistencia = $detalleAsistencia;

        return $this;
    }

    public function getEtapa(): ?string
    {
        return $this->etapa;
    }

    public function setEtapa(?string $etapa): self
    {
        $this->etapa = $etapa;

        return $this;
    }

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Usuarios[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(Usuarios $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios[] = $usuario;
            $usuario->addCasoConciliatorio($this);
        }

        return $this;
    }

    public function removeUsuario(Usuarios $usuario): self
    {
        if ($this->usuarios->removeElement($usuario)) {
            $usuario->removeCasoConciliatorio($this);
        }

        return $this;
    }
}
