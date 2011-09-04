<?php

namespace Ratasxy\RecargasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ratasxy\RecargasBundle\Entity\Registro
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ratasxy\RecargasBundle\Entity\RegistroRepository")
 */
class Registro
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
     * @var float $paquete
     *
     * @ORM\Column(name="paquete", type="float")
     */
    private $paquete;

    /**
     * @var float $compra
     *
     * @ORM\Column(name="compra", type="float")
     */
    private $compra;

    /**
     * @var float $venta
     *
     * @ORM\Column(name="venta", type="float")
     */
    private $venta;

    /**
     * @var float $porcentaje
     *
     * @ORM\Column(name="porcentaje", type="float")
     */
    private $porcentaje;

    /**
     * @var float $ganacia
     *
     * @ORM\Column(name="ganacia", type="float")
     */
    private $ganacia;

    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="registros")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @var date $fecha
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;
    
    /**
     * @var integer $fecha
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="registros")
     * @ORM\JoinColumn(name="vendedor_id", referencedColumnName="id")
     */
    private $vendedor;

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
     * Set paquete
     *
     * @param float $paquete
     */
    public function setPaquete($paquete)
    {
        $this->paquete = $paquete;
    }

    /**
     * Get paquete
     *
     * @return float 
     */
    public function getPaquete()
    {
        return $this->paquete;
    }

    /**
     * Set compra
     *
     * @param float $compra
     */
    public function setCompra($compra)
    {
        $this->compra = $compra;
    }

    /**
     * Get compra
     *
     * @return float 
     */
    public function getCompra()
    {
        return $this->compra;
    }

    /**
     * Set venta
     *
     * @param float $venta
     */
    public function setVenta($venta)
    {
        $this->venta = $venta;
    }

    /**
     * Get venta
     *
     * @return float 
     */
    public function getVenta()
    {
        return $this->venta;
    }

    /**
     * Set porcentaje
     *
     * @param float $porcentaje
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;
    }

    /**
     * Get porcentaje
     *
     * @return float 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set ganacia
     *
     * @param float $ganacia
     */
    public function setGanacia($ganacia)
    {
        $this->ganacia = $ganacia;
    }

    /**
     * Get ganacia
     *
     * @return float 
     */
    public function getGanacia()
    {
        return $this->ganacia;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     *
     * @return integer 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

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
    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getVendedor() {
        return $this->vendedor;
    }

    public function setVendedor($vendedor) {
        $this->vendedor = $vendedor;
    }


}