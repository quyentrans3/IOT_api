<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Utility\Constants;

class VirtualSensorController extends Controller
{

    public function getVirtualSensorAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$virtualID = $request->get("virtualID");
	    	if(!$virtualID){
	    		throw new \Exception("virtual ID is required");	    		
	    	}
	    	$virtualService = $this->get('virtual.sensor.services');
	    	$serializer = $this->get('serializer');

	    	$virtual = $virtualService->getVirtualSensor($request->query->all());

	    	$message = $virtual ? 'Get Data Virtual Sensor success' : 'Virtual Sensor not exists';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($virtual, 'json'))
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
	    	$virtualService = $this->get('virtual.sensor.services');
	    	$serializer = $this->get('serializer');
	    	$params = $request->query->all();
	    	$params['limit'] = $request->get('limit') ? $request->get('limit') : Constants::LIMIT_ROWS_PER_PAGE;
	    	$params['orderBy'] = $request->get('orderBy') ? $request->get('orderBy') : 'virtualName';
	    	$params['order'] = $request->get('order') ? $request->get('order') : 'asc';
	    	$page = $request->get('page') ? $request->get('page') : 1;
	    	$params['offset'] = ($page - 1) * $params['limit'];
	    	
	    	$virtuals = $virtualService->getList($params);

	    	$message = 'Get List Virtual Sensor success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($virtuals, 'json'))
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
