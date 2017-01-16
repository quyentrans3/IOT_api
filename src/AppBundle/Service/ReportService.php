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
            $qb->innerJoin(self::SENSOR_ENTITY_NAME, 'se', 'WITH', 'se.EUI = da.EUI');
            $qb->andWhere('se.sensorID = :sensorID');
            $qb->setParameter('sensorID', $params['sensorID']);
        }
        //var_dump($qb->getQuery()->getSql());die;
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
            $qb->innerJoin(self::SENSOR_ENTITY_NAME, 'se', 'WITH', 'se.EUI = da.EUI');
            $qb->andWhere('se.sensorID = :sensorID');
            $qb->setParameter('sensorID', $params['sensorID']);
        }
        $reports = $qb->getQuery()->getResult();
        return $reports;
    }
}
?>