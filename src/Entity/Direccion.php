<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Direccion
 *
 * @ORM\Table(name="direccion", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_F384BE9558BC1BE0", columns={"municipio_id"}), @ORM\UniqueConstraint(name="UNIQ_F384BE95A156727D", columns={"provincias_id"})}, indexes={@ORM\Index(name="IDX_F384BE95DE734E51", columns={"cliente_id"})})
 * @ORM\Entity
 */
class Direccion
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
     * @ORM\Column(name="calle", type="string", length=255, nullable=false)
     */
    private $calle;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255, nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="puerta_piso_escalera", type="string", length=255, nullable=false)
     */
    private $puertaPisoEscalera;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_postal", type="string", length=255, nullable=false)
     */
    private $codPostal;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;

    /**
     * @var \Municipios
     *
     * @ORM\ManyToOne(targetEntity="Municipios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="municipio_id", referencedColumnName="id")
     * })
     */
    private $municipio;

    /**
     * @var \Provincias
     *
     * @ORM\ManyToOne(targetEntity="Provincias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provincias_id", referencedColumnName="id")
     * })
     */
    private $provincias;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getPuertaPisoEscalera(): ?string
    {
        return $this->puertaPisoEscalera;
    }

    public function setPuertaPisoEscalera(string $puertaPisoEscalera): self
    {
        $this->puertaPisoEscalera = $puertaPisoEscalera;

        return $this;
    }

    public function getCodPostal(): ?string
    {
        return $this->codPostal;
    }

    public function setCodPostal(string $codPostal): self
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getMunicipio(): ?Municipios
    {
        return $this->municipio;
    }

    public function setMunicipio(?Municipios $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getProvincias(): ?Provincias
    {
        return $this->provincias;
    }

    public function setProvincias(?Provincias $provincias): self
    {
        $this->provincias = $provincias;

        return $this;
    }


}
