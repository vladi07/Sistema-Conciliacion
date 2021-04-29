<?php

namespace App\Entity;

use App\Repository\UsuarioExternoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioExternoRepository::class)
 */
class UsuarioExterno
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $tipoUsuario;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $tipoDocumento;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $ordenJudicial;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    private $autoridadEmite;

    /**
     * @ORM\Column(type="date", length=200, nullable=true)
     */
    private $fechaEmision;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $creadoPor;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaCreacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoUsuario(): ?string
    {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario(?string $tipoUsuario): self
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }

    public function getTipoDocumento(): ?string
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(?string $tipoDocumento): self
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getOrdenJudicial(): ?string
    {
        return $this->ordenJudicial;
    }

    public function setOrdenJudicial(?string $ordenJudicial): self
    {
        $this->ordenJudicial = $ordenJudicial;

        return $this;
    }

    public function getAutoridadEmite(): ?string
    {
        return $this->autoridadEmite;
    }

    public function setAutoridadEmite(?string $autoridadEmite): self
    {
        $this->autoridadEmite = $autoridadEmite;

        return $this;
    }

    public function getFechaEmision(): ?string
    {
        return $this->fechaEmision;
    }

    public function setFechaEmision(?string $fechaEmision): self
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    public function getCreadoPor(): ?string
    {
        return $this->creadoPor;
    }

    public function setCreadoPor(?string $creadoPor): self
    {
        $this->creadoPor = $creadoPor;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(?\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }
}
