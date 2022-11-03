<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Plato
 *
 * @ORM\Table(name="plato", indexes={@ORM\Index(name="IDX_914B3E4538B81E49", columns={"restaurante_id"}), @ORM\Index(name="IDX_914B3E454854653A", columns={"pedido_id"})})
 * @ORM\Entity
 */
class Plato
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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255, nullable=false)
     */
    private $imageUrl;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float", precision=10, scale=0, nullable=false)
     */
    private $precio;

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
     * @var \Restaurante
     *
     * @ORM\ManyToOne(targetEntity="Restaurante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurante_id", referencedColumnName="id")
     * })
     */
    private $restaurante;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Alergenos", inversedBy="plato")
     * @ORM\JoinTable(name="plato_alergenos",
     *   joinColumns={
     *     @ORM\JoinColumn(name="plato_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="alergenos_id", referencedColumnName="id")
     *   }
     * )
     */
    private $alergenos = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alergenos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

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

    public function getRestaurante(): ?Restaurante
    {
        return $this->restaurante;
    }

    public function setRestaurante(?Restaurante $restaurante): self
    {
        $this->restaurante = $restaurante;

        return $this;
    }

    /**
     * @return Collection<int, Alergenos>
     */
    public function getAlergenos(): Collection
    {
        return $this->alergenos;
    }

    public function addAlergeno(Alergenos $alergeno): self
    {
        if (!$this->alergenos->contains($alergeno)) {
            $this->alergenos[] = $alergeno;
        }

        return $this;
    }

    public function removeAlergeno(Alergenos $alergeno): self
    {
        $this->alergenos->removeElement($alergeno);

        return $this;
    }

}
