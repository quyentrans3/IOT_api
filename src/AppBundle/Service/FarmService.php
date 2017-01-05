<?php
namespace AppBundle\Service;
use AppBundle\Entity\Farm;
use Doctrine\ORM\EntityManager;

class FarmService
{
	const FARM_ENTITY_NAME = 'AppBundle:Farm';

	private $em;

	public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getFarm($params)
    {
    	$user = $this->em->getRepository(self::FARM_ENTITY_NAME)->findOneBy($params);
    	return $user;
    }
    public function getList($params)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('u,ad')
           ->from(self::FARM_ENTITY_NAME, 'u')
           ->innerJoin('u.admin','ad')
           ->setFirstResult( $params['offset'] )
           ->setMaxResults( $params['limit'] )
           ->orderBy('u.' . $params['orderBy'], $params['order']);
        $paramsFilter = array();
        //only get filter allow column
        $filter = array(
            'farmName', 'farmPhone', 'farmAdress', 'farmAdress2', 'farmZip', 'farmCity', 'farmState', 'farmCountry', 'adminID'
        );
        foreach($filter as $val){
            if(isset($params[$val])){
                $paramsFilter[$val] = $params[$val];
            }
        }
        $qb->where('1 = 1');
        foreach($paramsFilter as $key => $val){
            $qb->andWhere($qb->expr()->like('u.' . $key, ':' . $key));
            $qb->setParameter($key, '%'.$val.'%');
        }
        $user = $qb->getQuery()->getArrayResult();
        return $user;
    }
}
?>