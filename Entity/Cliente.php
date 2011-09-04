<?php

namespace Ratasxy\RecargasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ratasxy\RecargasBundle\Entity\Cliente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ratasxy\RecargasBundle\Entity\ClienteRepository")
 */
class Cliente
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
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string $direccion
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string $telefono
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var float $porcentaje
     *
     * @ORM\Column(name="porcentaje", type="float")
     */
    private $porcentaje;

    /**
     * @ORM\OneToMany(targetEntity="Registro", mappedBy="usuario")
     */
    private $registros;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="clientes")
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
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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
    
    public function getRegistros() {
        return $this->registros;
    }

    public function setRegistros($registros) {
        $this->registros = $registros;
    }

    public function __toString() {
        return $this->getNombre();
    }
    
    public function getVendedor() {
        return $this->vendedor;
    }

    public function setVendedor($vendedor) {
        $this->vendedor = $vendedor;
    }




}