<?php
// src/Acme/GuardaBundle/Entity/Producto.php
namespace Acme\GuardaBundle\Entity;

class Producto {
	protected $nombre;
	protected $precio;
	protected $descripcion;


	
		/**
     * @var integer $id
     */
    private $id;


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
     * Set precio
     *
     * @param decimal $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * Get precio
     *
     * @return decimal 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param text $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get descripcion
     *
     * @return text 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    /**
    * @ORM\ManyToOne(targetEntity="Categsdfsfsdfsdforia", inversedBy="productos")
    * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
    */
    protected $categoria;
    
    
    
    
    
    
    /**
     * @var Acme\GuardaBundle\Entity\Category
     */
    private $category;


    /**
     * Set category
     *
     * @param Acme\GuardaBundle\Entity\Category $category
     */
    public function setCategory(\Acme\GuardaBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Acme\GuardaBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set categoria
     *
     * @param Acme\GuardaBundle\Entity\Categoria $categoria
     */
    public function setCategoria(\Acme\GuardaBundle\Entity\Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Get categoria
     *
     * @return Acme\GuardaBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}