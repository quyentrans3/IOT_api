<?php
namespace AppBundle\Service;
use AppBundle\Entity\Rules;
use AppBundle\Entity\Admin;
use Doctrine\ORM\EntityManager;

class RulesService
{
	const ADMIN_ENTITY_NAME = 'AppBundle:Admin';
	const RULES_ENTITY_NAME = 'AppBundle:Rules';
	const FARM_ENTITY_NAME = 'AppBundle:Farm';
	private $em;

	public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getRules($params)
    {
    	$rule = $this->em->getRepository(self::RULES_ENTITY_NAME)->findOneBy($params);
    	return $rule;
    }
    public function getList($params)
    {
    	$qb = $this->em->createQueryBuilder();
    	$qb->select('ru')
		   ->from(self::RULES_ENTITY_NAME, 'ru')
		   ->setFirstResult( $params['offset'] )
   		   ->setMaxResults( $params['limit'] )
		   ->orderBy('ru.' . $params['orderBy'], $params['order']);
		$paramsFilter = array();
    	//only get filter allow column
    	$filter = array(
    		'ruleName'
    	);
    	foreach($filter as $val){
    		if(isset($params[$val])){
    			$paramsFilter[$val] = $params[$val];
    		}
    	}
    	$qb->where('1 = 1');
		foreach($paramsFilter as $key => $val){
			$qb->andWhere($qb->expr()->like('ru.' . $key, ':' . $key));
			$qb->setParameter($key, '%'.$val.'%');
		}
    	$rules = $qb->getQuery()->getResult();
    	return $rules;
    }
    public function addRules($params)
    {
        try{
            $rule = new Rules();
            $columns = array();
            //only allow column
            $filter = array(
                'ruleName', 'minHumidity', 'maxHumidity', 'battery', 'minTemperature', 'maxTemperature', 'sms', 'email', 'push'
            );

            $params['sms'] = isset($params['sms']) && $params['sms'] == true ? 1 : 0;
            $params['email'] = isset($params['email']) && $params['email'] == true ? 1 : 0;
            $params['push'] = isset($params['push']) && $params['push'] == true ? 1 : 0;

            foreach($filter as $val){
                if(isset($params[$val])){
                    $columns[$val] = $params[$val];
                }
            }
            foreach($columns as $column => $val){
                eval("\$rule->set".ucfirst($column)."('".$val."');");
            }
            $this->em->persist($rule);
            $this->em->flush();
            return $rule;
        }catch(\Exception $ex){
            return false;
        }
    }
    public function updateRules($ruleId, $params)
    {
        try{
            $rule = $this->em->getRepository(self::RULES_ENTITY_NAME)->find($ruleId);

            if (!$rule) {
                throw $this->createNotFoundException(
                    'No Rule found for id '.$ruleId
                );
            }
            $columns = array();
            //only allow column
            $filter = array(
                'ruleName', 'minHumidity', 'maxHumidity', 'battery', 'minTemperature', 'maxTemperature', 'sms', 'email', 'push'
            );

            $params['sms'] = isset($params['sms']) && $params['sms'] == true ? 1 : 0;
            $params['email'] = isset($params['email']) && $params['email'] == true ? 1 : 0;
            $params['push'] = isset($params['push']) && $params['push'] == true ? 1 : 0;

            foreach($filter as $val){
                if(isset($params[$val])){
                    $columns[$val] = $params[$val];
                }
            }
            foreach($columns as $column => $val){
                eval("\$rule->set".ucfirst($column)."('".$val."');");
            }
            $this->em->flush();
            return $rule;
        }catch(\Exception $ex){
            return false;
        }
    }
    public function deleteRules($ruleId, $params)
    {
        try{
            $rule = $this->em->getRepository(self::RULES_ENTITY_NAME)->find($ruleId);

            if (!$rule) {
                throw $this->createNotFoundException(
                    'No Rule found for id '.$ruleId
                );
            }
            $this->em->remove($rule);
            $this->em->flush();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
}
?>