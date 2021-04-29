<?php

namespace App\Entity;

use App\Repository\DocumentacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentacionRepository::class)
 */
class Documentacion
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
     *     length=200,
     *     nullable=true)
     */
    private $tipoDocumento;

    /**
     * @ORM\Column(
     *     type="text",
     *     nullable=true)
     */
    private $ruta;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRuta(): ?string
    {
        return $this->ruta;
    }

    public function setRuta(?string $ruta): self
    {
        $this->ruta = $ruta;
        return $this;
    }
}
