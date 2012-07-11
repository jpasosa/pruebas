<?php

namespace Acme\LearnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\LearnBundle\Entity\Articles;
use Acme\LearnBundle\Entity\Comments;
use Acme\LearnBundle\Form\ArticleType;

class ArticulosController extends Controller
{

  public function listar_unoAction() {
    $em = $this->getDoctrine()->getEntityManager();
    $articulo = $em->getRepository('AcmeLearnBundle:Articles')->findOneBySlug('articulo-de-ejemplo-2');
    $comentarios = $articulo->getComments();
    return $this->render('AcmeLearnBundle:Articulos:listar_uno.html.twig', array(
    																'articulo' => $articulo,
    																'comentarios' => $comentarios));
  }
	
	public function listarAction() {
		$em = $this->getDoctrine()->getEntityManager();
		$articulos = $em->getRepository('AcmeLearnBundle:Articles')->findAll();
		return $this->render('AcmeLearnBundle:Articulos:listar.html.twig', array('articulos' => $articulos));
	}

	public function crearAction() {
		$articulo = new Articles();
		$articulo->setTitle('Articulo de ejemplo 1');
		$articulo->setAuthor('John Doe');
		$articulo->setContent('Contenido');
		$articulo->setTags('ejemplo');
		$articulo->setCreated(new \DateTime());
		$articulo->setUpdated(new \DateTime());
		$articulo->setSlug('articulo-de-ejemplo-1');
		$articulo->setCategory('ejemplo');
    $errores = $this->get('validator')->validate($articulo);  
    if(!empty($errores)):
      foreach($errores as $error)
        echo $error->getMessage();
      return new Response();
    endif;
    // $comentario = new Comments();
		// $comentario->setContent('este es el contenido de un comentario');
		// $comentario->setAuthor('autor');
		// $articulo->addComments($comentario);
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($articulo);
		$em->flush();
		return $this->render('AcmeLearnBundle:Articulos:articulo.html.twig', array('articulo' => $articulo));
	}

	public function editarAction($id) {
		$em = $this->getDoctrine()->getEntityManager();
		
		$articulo = $em->getRepository('AcmeLearnBundle:Articles')->find($id);
		
		$articulo->setTitle('Articulo de ejemplo 1 - modificado');
		$articulo->setUpdated(new \DateTime());
		
		$em->persist($articulo);
		$em->flush();
		
		return $this->render('AcmeLearnBundle:Articulos:articulo.html.twig', array('articulo' => $articulo));
	}

	public function borrarAction($id) {
		$em = $this->getDoctrine()->getEntityManager();
		$articulo = $em->getRepository('AcmeLearnBundle:Articles')->find($id);
		$em->remove($articulo);
		$em->flush();
		return $this->redirect($this->generateUrl('articulo_listar')
		);

	}
	
	public function consultasAction($choice) {
		$em = $this->getDoctrine()->getEntityManager();
		switch($choice) {
      case 1: // 
        $help = 'Obtenemos todos los artículos de la tabla ';
        $text_query = '$em->getRepository(\'AcmeLearnBundle:Articles\')->findAll();';
        $articulos = $em->getRepository('AcmeLearnBundle:Articles')
                          ->findAll();
        break;
      case 2:
        $help = 'Obtenemos el artículo con el id = 5';
        $text_query = '$articulo = $em->getRepository(\'AcmeLearnBundle:Articles\')->find(5);';
        $articulos = $em->getRepository('AcmeLearnBundle:Articles')->findBy(array(
                                                                'author' => 'John Doe',
                                                          'category' => 'ejemplo'));
        break;
      case 3:
        $help = 'Obtenemos el artículo con el id = 5';
        $text_query = '$articulo = $em->getRepository(\'AcmeLearnBundle:Articles\')->find(5);';
        $articulos = $em->getRepository('AcmeLearnBundle:Articles')->findBy(array('id' => 5));
      case 4:
        break;
      case 5:
        break;
      case 6:
        break;
      case 7:
        break;
      default:
        break;  
    }
    // echo '<pre>';
    // var_dump($articulos);
    // echo '</pre>';
    // die();
    return $this->render('AcmeLearnBundle:Articulos:consultas.html.twig',
                              array('articulos' => $articulos,
                                    'help' => $help,
                                    'text_query' => $text_query));
	
	}
	
public function newAction() {
    //-- Obtenemos el request que contendrá los datos
    $request = $this->getRequest();
    $articulo = new Articles();
    $form = $this->createForm(new ArticleType(), $articulo);
    if($request->getMethod() == 'POST'):
        $form->bindRequest($request);
        if($form->isValid()):
            $em = $this->getDoctrine()->getEntityManager();
            var_dump($form->getData());
            $em->persist($articulo_obtenido);
            $em->flush();
            return $this->redirect($this->generateURL('articulos'));
        endif;
    endif;
    return $this->render('AcmeLearnBundle:Articulos:new.html.twig', array(
        'form' => $form->createView(),
    ));
}

}