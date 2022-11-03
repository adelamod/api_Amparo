<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Alergenos
 *
 * @ORM\Table(name="alergenos")
 * @ORM\Entity
 */
class Alergenos
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
     * @ORM\Column(name="alergenos", type="string", length=255, nullable=false)
     */
    private $alergenos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plato", mappedBy="alergenos")
     */
    private $plato = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plato = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlergenos(): ?string
    {
        return $this->alergenos;
    }

    public function setAlergenos(string $alergenos): self
    {
        $this->alergenos = $alergenos;

        return $this;
    }

    /**
     * @return Collection<int, Plato>
     */
    public function getPlato(): Collection
    {
        return $this->plato;
    }

    public function addPlato(Plato $plato): self
    {
        if (!$this->plato->contains($plato)) {
            $this->plato[] = $plato;
            $plato->addAlergeno($this);
        }

        return $this;
    }

    public function removePlato(Plato $plato): self
    {
        if ($this->plato->removeElement($plato)) {
            $plato->removeAlergeno($this);
        }

        return $this;
    }

}
