<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 */
class Usuarios implements UserInterface
{
    const REGISTRO_EXITOSO = 'Se ha registrado exitosamente';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $creadoPor;

    /**
     * @ORM\Column(
     *     type="datetime",
     *     nullable=true
     * )
     */
    private $fechaCreacion;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Funciones", mappedBy="usuarios")
     */
    private $funciones;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Persona", inversedBy="usuarios")
     */
    private $persona;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Centro", inversedBy="usuarios")
     */
    private $centro;

    /**
     * @ORM\ManyToMany(targetEntity=CasoConciliatorio::class, inversedBy="usuarios")
     */
    private $casoConciliatorio;

    public function __construct()
    {
        $this->casoConciliatorio = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getCreadoPor()
    {
        return $this->creadoPor;
    }

    /**
     * @param mixed $creadoPor
     */
    public function setCreadoPor($creadoPor): void
    {
        $this->creadoPor = $creadoPor;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param mixed $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion): void
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return Collection|CasoConciliatorio[]
     */
    public function getCasoConciliatorio(): Collection
    {
        return $this->casoConciliatorio;
    }

    public function addCasoConciliatorio(CasoConciliatorio $casoConciliatorio): self
    {
        if (!$this->casoConciliatorio->contains($casoConciliatorio)) {
            $this->casoConciliatorio[] = $casoConciliatorio;
        }

        return $this;
    }

    public function removeCasoConciliatorio(CasoConciliatorio $casoConciliatorio): self
    {
        $this->casoConciliatorio->removeElement($casoConciliatorio);

        return $this;
    }



}
