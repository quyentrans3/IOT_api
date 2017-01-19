<?php
namespace AppBundle\Service;
use AppBundle\Entity\User;
use AppBundle\Entity\Admin;
use Doctrine\ORM\EntityManager;

class UserService
{
	const ADMIN_ENTITY_NAME = 'AppBundle:Admin';
	const USER_ENTITY_NAME = 'AppBundle:User';
	const FARM_ENTITY_NAME = 'AppBundle:Farm';
	const SUPER_USER_ENTITY_NAME = 'AppBundle:SuperUser';
	private $em;

	public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getUser($params)
    {
    	$user = $this->em->getRepository(self::USER_ENTITY_NAME)->findOneBy($params);
    	return $user;
    }
    public function updateToken($userId, $token)
    {
        try{
            $user = $this->em->getRepository(self::USER_ENTITY_NAME)->find($userId);

            if (!$userId) {
                throw $this->createNotFoundException(
                    'No User found for id '.$userId
                );
            }

            $user->setApiKey($token);
            $this->em->flush();

            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
    public function updateValidCode($userId, $validCode)
    {
        try{
            $user = $this->em->getRepository(self::USER_ENTITY_NAME)->find($userId);

            if (!$userId) {
                throw $this->createNotFoundException(
                    'No User found for id '.$userId
                );
            }

            $user->setValidCode($validCode);
            $this->em->flush();

            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
    public function getList($params)
    {
    	$qb = $this->em->createQueryBuilder();
    	$qb->select('u,su,fa')
		   ->from(self::USER_ENTITY_NAME, 'u')
		   ->innerJoin('u.superuser','su')
		   ->innerJoin('u.farm','fa')
		   ->setFirstResult( $params['offset'] )
   		   ->setMaxResults( $params['limit'] )
		   ->orderBy('u.' . $params['orderBy'], $params['order']);
		$paramsFilter = array();
    	//only get filter allow column
    	$filter = array(
    		'userName', 'userFirstName', 'userPhone', 'farmID', 'superUserID'
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
    public function updateUser($userId, $params)
    {
        try{
            $user = $this->em->getRepository(self::USER_ENTITY_NAME)->find($userId);

            if (!$userId) {
                throw $this->createNotFoundException(
                    'No User found for id '.$userId
                );
            }
            $columns = array();
            //only allow column
            $filter = array(
                'userName', 'userFirstName', 'userPhone'
            );
            foreach($filter as $val){
                if(isset($params[$val])){
                    $columns[$val] = $params[$val];
                }
            }
            foreach($columns as $column => $val){
                eval("\$user->set".ucfirst($column)."('".$val."');");
            }
            $this->em->flush();
            return $user;
        }catch(\Exception $ex){
            var_dump($ex->getMessage());die;
            return false;
        }
    }
    public function updateAllUser($userId, $params)
    {
        try{
            $user = $this->em->getRepository(self::USER_ENTITY_NAME)->find($userId);

            if (!$userId) {
                throw $this->createNotFoundException(
                    'No User found for id '.$userId
                );
            }
            $columns = array();
            //only allow column
            $filter = array(
                'userName', 'userFirstName', 'userPhone', 'userPassword', 'apiKey', 'validCode', 'deviceID', 'deviceOS'
            );
            foreach($filter as $val){
                if(isset($params[$val])){
                    $columns[$val] = $params[$val];
                }
            }
            foreach($columns as $column => $val){
                eval("\$user->set".ucfirst($column)."('".$val."');");
            }
            $this->em->flush();
            return $user;
        }catch(\Exception $ex){
            var_dump($ex->getMessage());die;
            return false;
        }
    }
}
?>