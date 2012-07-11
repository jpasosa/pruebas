<?php 
namespace Acme\GuardaBundle\Repository;
use Doctrine\ORM\EntityRepository;

class ProductoRepository extends EntityRepository
{

	public function findAllOrderedByName() {
		return $this->getEntityManager()
											->createQuery('SELECT p FROM AcmeGuardaBundle:Producto p ORDER BY p.nombre ASC')
											->getResult();
	}


}


