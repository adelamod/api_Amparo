<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlatoCantidad
 *
 * @ORM\Table(name="plato_cantidad", indexes={@ORM\Index(name="IDX_AD5695954854653A", columns={"pedido_id"}), @ORM\Index(name="IDX_AD569595B0DB09EF", columns={"plato_id"})})
 * @ORM\Entity
 */
class PlatoCantidad
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
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var \Pedido
     *
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     * })
     */
    private $pedido;

    /**
     * @var \Plato
     *
     * @ORM\ManyToOne(targetEntity="Plato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="plato_id", referencedColumnName="id")
     * })
     */
    private $plato;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    public function getPlato(): ?Plato
    {
        return $this->plato;
    }

    public function setPlato(?Plato $plato): self
    {
        $this->plato = $plato;

        return $this;
    }


}
