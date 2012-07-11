<?php

namespace Acme\GuardaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Acme\GuardaBundle\Entity\Categoria
 */
class Categoria
{
	
	/**
	* @ORM\OneToMany(targetEntity="Producto", mappedBy="categoria")
	*/
	protected $productos;
	public function __construct() {
		$this->productos = new ArrayCollection();
	}
	
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nombre
     */
    private $nombre;


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
     * @var Acme\GuardaBundle\Entity\Product
     */
    private $products;


    /**
     * Add products
     *
     * @param Acme\GuardaBundle\Entity\Product $products
     */
    public function addProduct(\Acme\GuardaBundle\Entity\Product $products)
    {
        $this->products[] = $products;
    }

    /**
     * Get products
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add productos
     *
     * @param Acme\GuardaBundle\Entity\Producto $productos
     */
    public function addProducto(\Acme\GuardaBundle\Entity\Producto $productos)
    {
        $this->productos[] = $productos;
    }

    /**
     * Get productos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }
}