<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Utility\Constants;

class FarmController extends Controller
{

    public function getFarmAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$farmID = $request->get("farmID");
	    	if(!$farmID){
	    		throw new \Exception("Farm ID is required");	    		
	    	}
	    	$farmService = $this->get('farm.services');
	    	$serializer = $this->get('serializer');

	    	$farm = $farmService->getFarm($request->query->all());

	    	$message = $farm ? 'Get Data farm success' : 'farm not exists';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($farm, 'json'))
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
	    	$farmService = $this->get('farm.services');
	    	$serializer = $this->get('serializer');
	    	$params = $request->query->all();
	    	$params['limit'] = $request->get('limit') ? $request->get('limit') : Constants::LIMIT_ROWS_PER_PAGE;
	    	$params['orderBy'] = $request->get('orderBy') ? $request->get('orderBy') : 'farmName';
	    	$params['order'] = $request->get('order') ? $request->get('order') : 'asc';
	    	$page = $request->get('page') ? $request->get('page') : 1;
	    	$params['offset'] = ($page - 1) * $params['limit'];
	    	
	    	$farms = $farmService->getList($params);

	    	$message = 'Get List Farm success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($farms, 'json'))
			));
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage()
			));
    	}
		return $response;
    }
}
