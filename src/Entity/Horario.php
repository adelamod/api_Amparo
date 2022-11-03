<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horario
 *
 * @ORM\Table(name="horario")
 * @ORM\Entity
 */
class Horario
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
     * @var int
     *
     * @ORM\Column(name="dia", type="integer", nullable=false)
     */
    private $dia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="apertura", type="time", nullable=false)
     */
    private $apertura;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDia(): ?int
    {
        return $this->dia;
    }

    public function setDia(int $dia): self
    {
        $this->dia = $dia;

        return $this;
    }

    public function getApertura(): ?\DateTimeInterface
    {
        return $this->apertura;
    }

    public function setApertura(\DateTimeInterface $apertura): self
    {
        $this->apertura = $apertura;

        return $this;
    }


}
