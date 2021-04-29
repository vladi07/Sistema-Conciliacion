<?php

namespace App\Entity;

use App\Repository\SolicitudConciliacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitudConciliacionRepository::class)
 */
class SolicitudConciliacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $materia;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $tipoConciliacion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMateria(): ?string
    {
        return $this->materia;
    }

    public function setMateria(?string $materia): self
    {
        $this->materia = $materia;

        return $this;
    }

    public function getTipoConciliacion(): ?string
    {
        return $this->tipoConciliacion;
    }

    public function setTipoConciliacion(?string $tipoConciliacion): self
    {
        $this->tipoConciliacion = $tipoConciliacion;

        return $this;
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
}
