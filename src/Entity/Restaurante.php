<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurante
 *
 * @ORM\Table(name="restaurante", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_5957C275CC8CBE46", columns={"horarios_id"})}, indexes={@ORM\Index(name="IDX_5957C2754854653A", columns={"pedido_id"})})
 * @ORM\Entity
 */
class Restaurante
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
     * @ORM\Column(name="logo_url", type="string", length=255, nullable=false)
     */
    private $logoUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen_url", type="string", length=255, nullable=false)
     */
    private $imagenUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="destacado", type="string", length=255, nullable=false)
     */
    private $destacado;

    /**
     * @var \Horario
     *
     * @ORM\ManyToOne(targetEntity="Horario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="horarios_id", referencedColumnName="id")
     * })
     */
    private $horarios;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categorias", inversedBy="restaurante")
     * @ORM\JoinTable(name="restaurante_categorias",
     *   joinColumns={
     *     @ORM\JoinColumn(name="restaurante_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="categorias_id", referencedColumnName="id")
     *   }
     * )
     */
    private $categorias = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    public function setLogoUrl(string $logoUrl): self
    {
        $this->logoUrl = $logoUrl;

        return $this;
    }

    public function getImagenUrl(): ?string
    {
        return $this->imagenUrl;
    }

    public function setImagenUrl(string $imagenUrl): self
    {
        $this->imagenUrl = $imagenUrl;

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

    public function getDestacado(): ?string
    {
        return $this->destacado;
    }

    public function setDestacado(string $destacado): self
    {
        $this->destacado = $destacado;

        return $this;
    }

    public function getHorarios(): ?Horario
    {
        return $this->horarios;
    }

    public function setHorarios(?Horario $horarios): self
    {
        $this->horarios = $horarios;

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

    /**
     * @return Collection<int, Categorias>
     */
    public function getCategorias(): Collection
    {
        return $this->categorias;
    }

    public function addCategoria(Categorias $categoria): self
    {
        if (!$this->categorias->contains($categoria)) {
            $this->categorias[] = $categoria;
        }

        return $this;
    }

    public function removeCategoria(Categorias $categoria): self
    {
        $this->categorias->removeElement($categoria);

        return $this;
    }

}
