<?php

namespace App\Entity;

use App\Repository\CentroRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CentroRepository::class)
 */
class Centro
{
    const REGISTRO_EXITOSO = 'Se ha registrado un CENTRO exitosamente';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $nombre;

    /**
     * @ORM\Column(type="text")
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $matricula;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $tipo;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $departamento;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuarios", mappedBy="centro")
     */
    private $usuarios;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CasoConciliatorio", mappedBy="centro")
     */
    private $casoConciliatorio;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Salas", mappedBy="centro")
     */
    private $sala;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Actividad", mappedBy="centro")
     */
    private $actividad;


    public function getId(): ?int
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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(?string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getDepartamento(): ?string
    {
        return $this->departamento;
    }

    public function setDepartamento(string $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
    * @return mixed
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * @param mixed $usuarios
     */
    public function setUsuarios($usuarios): void
    {
        $this->usuarios = $usuarios;
    }

    /**
     * @return mixed
     */
    public function getCasoConciliatorio()
    {
        return $this->casoConciliatorio;
    }

    /**
     * @param mixed $casoConciliatorio
     */
    public function setCasoConciliatorio($casoConciliatorio): void
    {
        $this->casoConciliatorio = $casoConciliatorio;
    }

    /**
     * @return mixed
     */
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * @param mixed $sala
     */
    public function setSala($sala): void
    {
        $this->sala = $sala;
    }

    /**
     * @return mixed
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * @param mixed $actividad
     */
    public function setActividad($actividad): void
    {
        $this->actividad = $actividad;
    }
}
