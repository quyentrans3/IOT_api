<?php
namespace AppBundle\Service;
use AppBundle\Entity\Sensor;
use Doctrine\ORM\EntityManager;

class SensorService
{
	const SENSOR_ENTITY_NAME = 'AppBundle:Sensor';

	private $em;

	public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getSensor($params)
    {
    	$user = $this->em->getRepository(self::SENSOR_ENTITY_NAME)->findOneBy($params);
    	return $user;
    }
    public function getList($params)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('u,ru,fa')
           ->from(self::SENSOR_ENTITY_NAME, 'u')
           ->innerJoin('u.rules','ru')
           ->innerJoin('u.farm','fa')
           ->setFirstResult( $params['offset'] )
           ->setMaxResults( $params['limit'] )
           ->orderBy('u.' . $params['orderBy'], $params['order']);
        $paramsFilter = array();
        //only get filter allow column
        $filter = array(
            'sensorName', 'sensorPosition', 'EUI', 'farmID', 'ruleID'
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