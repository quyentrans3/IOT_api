<?php
namespace AppBundle\Service;
use AppBundle\Entity\VirtualSensor;
use Doctrine\ORM\EntityManager;

class VirtualSensorService
{
	const VIRTUAL_SENSOR_ENTITY_NAME = 'AppBundle:VirtualSensor';

	private $em;

	public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getVirtualSensor($params)
    {
    	$user = $this->em->getRepository(self::VIRTUAL_SENSOR_ENTITY_NAME)->findOneBy($params);
    	return $user;
    }
    public function getList($params)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('u,ru,fa')
           ->from(self::VIRTUAL_SENSOR_ENTITY_NAME, 'u')
           ->innerJoin('u.rules','ru')
           ->innerJoin('u.farm','fa')
           ->setFirstResult( $params['offset'] )
           ->setMaxResults( $params['limit'] )
           ->orderBy('u.' . $params['orderBy'], $params['order']);
        $paramsFilter = array();
        //only get filter allow column
        $filter = array(
            'virtualName', 'virtualEUI', 'virtualPosition', 'farmID', 'ruleID'
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