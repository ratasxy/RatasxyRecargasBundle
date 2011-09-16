<?php

namespace Ratasxy\RecargasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ratasxy\RecargasBundle\Entity\Pagos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ratasxy\RecargasBundle\Entity\PagosRepository")
 */
class Pagos
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float $monto
     *
     * @ORM\Column(name="monto", type="float")
     */
    private $monto;

    /**
     * @var integer $tipo
     *
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @var string $codigo
     *
     * @ORM\Column(name="codigo", type="string", length=255)
     */
    private $codigo;

    /**
     * @var integer $estado
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;

    /**
     * @var date $fecha
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set monto
     *
     * @param float $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * Get monto
     *
     * @return float 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="pagos")
     * @ORM\JoinColumn(name="vendedor_id", referencedColumnName="id")
     */
    private $vendedor;
    
    /**
     * Set fecha
     *
     * @param date $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return date 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    public function getVendedor() {
        return $this->vendedor;
    }

    public function setVendedor($vendedor) {
        $this->vendedor = $vendedor;
    }


}