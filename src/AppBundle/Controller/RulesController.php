<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Utility\Constants;

class RulesController extends Controller
{
    public function getAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$email = $request->get("ruleID");
	    	if(!$email){
	    		throw new \Exception("Rule ID is required");	    		
	    	}
	    	$rulesService = $this->get('rules.services');
	    	$serializer = $this->get('serializer');

	    	$rule = $rulesService->getRules($request->query->all());
	    	if(!$rule){
    			throw new \Exception("Rule not exists");
    		}
			$response->setData(array(
				'status' => 200,
				'message' => 'Get Data Rule success',
			    'data' => json_decode($serializer->serialize($rule, 'json'))
			));
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage()
			));
    	}
		return $response;
    }

    public function getListAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
	    	$rulesService = $this->get('rules.services');
	    	$serializer = $this->get('serializer');
	    	$params = $request->query->all();
	    	$params['limit'] = $request->get('limit') ? $request->get('limit') : Constants::LIMIT_ROWS_PER_PAGE;
	    	$params['orderBy'] = $request->get('orderBy') ? $request->get('orderBy') : 'ruleName';
	    	$params['order'] = $request->get('order') ? $request->get('order') : 'asc';
	    	$page = $request->get('page') ? $request->get('page') : 1;
	    	$params['offset'] = ($page - 1) * $params['limit'];
	    	
	    	$rules = $rulesService->getList($params);

	    	$message = 'Get List Rule success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($rules, 'json'))
			));
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage()
			));
    	}
		return $response;
    }

    public function updateAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$ruleID = null;
    		$content = $this->get("request")->getContent();
    		if (!empty($content))
		    {
		        $params = json_decode($content, true); // 2nd param to get as array
		        $ruleID = isset($params['ruleID']) ? $params['ruleID'] : null ;
		    }
	    	if(!$ruleID){
	    		throw new \Exception("ruleID required");	    		
	    	}
	    	$rulesService = $this->get('rules.services');
	    	$serializer = $this->get('serializer');

	    	$rule = $rulesService->updateRules($ruleID, $params);
	    	if($rule){
	    		$response->setData(array(
					'status' => 200,
					'message' => 'Update Success',
					'data' => json_decode($serializer->serialize($rule, 'json'))
				));
	    	}else{
	    		throw new \Exception("Update Rule failed");	
	    	}
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage()
			));
    	}
		return $response;
    }
}
