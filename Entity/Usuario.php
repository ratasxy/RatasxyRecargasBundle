<?php

namespace Ratasxy\RecargasBundle\Entity;

use FOS\UserBundle\Entity\User as UsuarioBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class Usuario extends UsuarioBase
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToMany(targetEntity="Ratasxy\RecargasBundle\Entity\Grupo")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $grupos;

    /**
     * @ORM\OneToMany(targetEntity="Usuario", mappedBy="vendedor")
     */
    protected $clientes;
    
    /**
     * @ORM\OneToMany(targetEntity="Registro", mappedBy="vendedor")
     */
    protected $registros;
    
    /**
     * @ORM\OneToMany(targetEntity="Pagos", mappedBy="pagos")
     */
    protected $pagos;
    
    public function __construct()
    {
        parent::__construct();
        // tu propia lógica
    }

    public function getClientes() {
        return $this->clientes;
    }

    public function setClientes($clientes) {
        $this->clientes = $clientes;
    }

    public function getRegistros() {
        return $this->registros;
    }

    public function setRegistros($registros) {
        $this->registros = $registros;
    }
    
    public function getPagos() {
        return $this->pagos;
    }

    public function setPagos($pagos) {
        $this->pagos = $pagos;
    }




}