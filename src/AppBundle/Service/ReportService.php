<?php
namespace AppBundle\Service;
use AppBundle\Entity\Rules;
use AppBundle\Entity\Admin;
use Doctrine\ORM\EntityManager;

class ReportService
{
    const SENSOR_ENTITY_NAME = 'AppBundle:Sensor';
	const DATAS_ENTITY_NAME = 'AppBundle:Datas';
	const DATASCELL2_ENTITY_NAME = 'AppBundle:DatasCell2';
	private $em;

	public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getReportDatas($params)
    {
    	$qb = $this->em->createQueryBuilder();
    	$qb->select('da')
		   ->from(self::DATAS_ENTITY_NAME, 'da')
		   ->orderBy('da.dateLastUpdate', 'asc');
		$paramsFilter = array();
    	//only get filter allow column
    	$qb->where('1 = 1');
        if(isset($params['start_date'])){
            $qb->andWhere('da.dateLastUpdate >= :dateLastUpdate');
            $qb->setParameter('dateLastUpdate', $params['start_date']);
        }
        if(isset($params['end_date'])){
            $qb->andWhere('da.dateLastUpdate <= :dateLastUpdate_end');
            $qb->setParameter('dateLastUpdate_end', $params['end_date']);
        }
        if(isset($params['sensorID'])){
            $sensor = $this->em->getRepository(self::SENSOR_ENTITY_NAME)->findOneBy(array('sensorID'=>$params));
            if(!$sensor){
                throw new \Exception("Sensor not found");
            }
            $qb->andWhere('da.EUI = :EUI');
            $qb->setParameter('EUI', $sensor->getEUI());
        }
    	$reports = $qb->getQuery()->getResult();
    	return $reports;
    }
    public function getReportDatasCells($params)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('da')
           ->from(self::DATASCELL2_ENTITY_NAME, 'da')
           ->orderBy('da.dateLastUpdate', 'asc');
        $paramsFilter = array();
        //only get filter allow column
        $qb->where('1 = 1');
        if(isset($params['start_date'])){
            $qb->andWhere('da.dateLastUpdate >= :dateLastUpdate');
            $qb->setParameter('dateLastUpdate', $params['start_date']);
        }
        if(isset($params['end_date'])){
            $qb->andWhere('da.dateLastUpdate <= :dateLastUpdate_end');
            $qb->setParameter('dateLastUpdate_end', $params['end_date']);
        }
        if(isset($params['sensorID'])){
            $sensor = $this->em->getRepository(self::SENSOR_ENTITY_NAME)->findOneBy(array('sensorID'=>$params));
            if(!$sensor){
                throw new \Exception("Sensor not found");
            }
            $qb->andWhere('da.EUI = :EUI');
            $qb->setParameter('EUI', $sensor->getEUI());
        }
        $reports = $qb->getQuery()->getResult();
        return $reports;
    }
}
?>