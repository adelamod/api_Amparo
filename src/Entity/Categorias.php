<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias")
 * @ORM\Entity
 */
class Categorias
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=255, nullable=false)
     */
    private $categoria;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restaurante", mappedBy="categorias")
     */
    private $restaurante = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->restaurante = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return Collection<int, Restaurante>
     */
    public function getRestaurante(): Collection
    {
        return $this->restaurante;
    }

    public function addRestaurante(Restaurante $restaurante): self
    {
        if (!$this->restaurante->contains($restaurante)) {
            $this->restaurante[] = $restaurante;
            $restaurante->addCategoria($this);
        }

        return $this;
    }

    public function removeRestaurante(Restaurante $restaurante): self
    {
        if ($this->restaurante->removeElement($restaurante)) {
            $restaurante->removeCategoria($this);
        }

        return $this;
    }

}
