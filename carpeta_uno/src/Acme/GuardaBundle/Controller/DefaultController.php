<?php

namespace Acme\GuardaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\GuardaBundle\Entity\Producto;
use Acme\GuardaBundle\Entity\Categoria;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    
    public function indexAction() {
        
    	return $this->render('AcmeGuardaBundle:Default:index.html.twig', array('id_azar' => rand(1,10)));
    }
    
    
    
    public function createAction() {
    	$producto = new Producto();
    	$producto->setNombre('A Foo Bar');
    	$producto->setPrecio('19.99');
    	$producto->setDescripcion('Lorem ipsum dolor');
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$em->persist($producto);
    	$em->flush();
    	return $this->render('AcmeGuardaBundle:Default:createProducto.html.twig', array('producto_id' => $producto->getId(), 'id_azar' => rand(1,10)));
    }
    
    public function showAction($id) {
    	$producto = $this->getDoctrine()
    										->getRepository('AcmeGuardaBundle:Producto')
    										->findOneBy(array('id' => $id));
    	if (!$producto) {
    		throw $this->createNotFoundException('Ningún producto encontrado con id '.$id);
    	}
    return $this->render('AcmeGuardaBundle:Default:showProducto.html.twig', array('producto' => $producto, 'id_azar' => rand(1,10)));    
    }
    
    public function updateAction($id) {
    	$em = $this->getDoctrine()->getEntityManager();
    	$producto = $em->getRepository('AcmeGuardaBundle:Producto')->find($id);
    	$old_id_producto = $producto->getId();
    	$old_nombre_producto = $producto->getNombre();
    	if (!$producto) {
    		throw $this->createNotFoundException('Ningún producto encontrado con id '.$id);
    	}
    	$producto->setNombre('¡Nuevo nombre de producto!');
    	$em->flush();
    	return $this->render('AcmeGuardaBundle:Default:updateProducto.html.twig',
    																											 array('producto' => $producto,
    																															'id_azar' => rand(1,10),
    																															'old_id_producto' => $old_id_producto,
    																															'old_nombre_producto' => $old_nombre_producto));
//     	return $this->redirect($this->generateUrl('_homepage'));
    }
    
    public function consultAction() {
//			hecho con DQL
//     	$em = $this->getDoctrine()->getEntityManager();
// 			$consulta = $em->createQuery(
// 				'SELECT p FROM AcmeGuardaBundle:Producto p WHERE p.precio > :precio ORDER BY p.precio ASC'
// 																		)->setParameter('precio', '18.99');
// 			$productos = $consulta->getResult();
//     	foreach($productos as $pr):
//     		echo 'ID: ' .    $pr->getId();
//     		echo ' NOMBRE:' . $pr->getNombre().'<br />';
    	
//     	endforeach;
    	// Consulta por el generador de Consultas de Doctrine
    	$repositorio = $this->getDoctrine()->getRepository('AcmeGuardaBundle:Producto');
    	$consulta = $repositorio->createQueryBuilder('p')
														    	->where('p.precio > :precio')
														    	->setParameter('precio', '18.99')
														    	->orderBy('p.precio', 'ASC')
														    	->getQuery();
    	$productos = $consulta->getResult();
    	return $this->render('AcmeGuardaBundle:Default:consultProducto.html.twig',
    																		array('productos' => $productos,
        																			'id_azar' => rand(1,10)));
    	//     	return $this->redirect($this->generateUrl('_homepage'));
    }
    
    public function saverelationAction() {
			
    	$categoria = new Categoria();
    	$categoria->setNombre('Productos principales');
			$producto = new Producto();
			$producto->setNombre('Foo');
			$producto->setDescripcion('pongo algo aqui de la descripcion');
			$producto->setPrecio(19.99);
			// relaciona este producto con la categoría
			$producto->setCategoria($categoria);
			$em = $this->getDoctrine()->getEntityManager();
			$em->persist($categoria);
			$em->persist($producto);
			$em->flush();
// 			return new Response(
// 				'Producto con id: '.$producto->getId().' e id de categoría: '.$categoria->getId());
    	
    	return $this->render('AcmeGuardaBundle:Default:saverelationProducto.html.twig',
        																		array('producto' => $producto,
        																					'categoria' => $categoria,
            																			'id_azar' => rand(1,10)));
//     	//     	return $this->redirect($this->generateUrl('_homepage'));
    }
    
    public function loadrelationAction($id) {
    	$producto = $this->getDoctrine()
    											->getRepository('AcmeGuardaBundle:Producto')
    											->find($id);
//     	    	echo "<pre> ";
//     	    	print_r($producto);
//     	    	echo "</pre> ";
    	    	echo 'nombre de la categoria: ' .$producto->getCategorias()->getNombre();
    	    	
    	    	die();
    	   
    	
    	
//     	$producto = $this->getDoctrine()->getRepository('AcmeGuardaBundle:Producto')
// 													->findById($id);
//     	echo print_r($producto);die();
//     	echo var_dump($producto);die();	
//     	echo 'Nombre: '. $producto->getNombre();
//     		die();
//     	$nombreCategoria = $producto->getCategoria();
//     	echo $nombreCategoria;die();
//     	dump_array($nombreCategoria);die();
    	$categoryName = $producto->getCategoria()->getNombre();
    	
    	return $this->render('AcmeGuardaBundle:Default:loadrelationProducto.html.twig',
    																							array('producto' => $producto,
    	        																					'categoria' => $nombreCategoria,
    	            																			'id_azar' => rand(1,10)));
    	 
    
    }
    
        
}
