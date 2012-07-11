<?php

namespace Acme\LearnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\LearnBundle\Entity\Comments;
use Acme\LearnBundle\Entity\Articles;

class CommentsController extends Controller
{
	
	public function listarAction() {
		echo 'hola';
		echo 'hoola';


		printf(hol);



	}

	public function crearAction() {
		$comentario = new Comments();
		$hola = new holasss();

		$comentario->setAuthor('Juan Pablo Sosa');
		$comentario->setContent('kja hsdkja hsdja hskjd hsajd hsajdhsakjd kjsa hdkjsahdkja skdhsad');
// 		$articulo->setCategory('ejemplo');
		$comentario->setArticle(1);
		$comentario->setReplyTo(2);
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($comentario);
		$em->flush();
		return $this->render('AcmeLearnBundle:Comentarios:comentario.html.twig', array('comentario' => $comentario));
	}

	public function editarAction($id) {

	}

	public function borrarAction($id) {

	}
	


}