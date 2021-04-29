<?php

namespace App\Entity;

use App\Repository\AgendaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgendaRepository::class)
 */
class Agenda
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(
     *     type="string",
     *     length=100,
     *     nullable=true)
     */
    private $usuario;

    /**
     * @ORM\Column(
     *     type="string",
     *     length=120,
     *     nullable=true)
     */
    private $materia;

    /**
     * @ORM\Column(
     *     type="date",
     *     nullable=true)
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;

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
