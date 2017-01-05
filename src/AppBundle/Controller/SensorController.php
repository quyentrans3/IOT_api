<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Utility\Constants;

class SensorController extends Controller
{

    public function getSensorAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$sensorID = $request->get("sensorID");
	    	if(!$sensorID){
	    		throw new \Exception("sensor ID is required");	    		
	    	}
	    	$sensorService = $this->get('sensor.services');
	    	$serializer = $this->get('serializer');

	    	$sensor = $sensorService->getSensor($request->query->all());

	    	$message = $sensor ? 'Get Data Sensor success' : 'Sensor not exists';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($sensor, 'json'))
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
	    	$sensorService = $this->get('sensor.services');
	    	$serializer = $this->get('serializer');
	    	$params = $request->query->all();
	    	$params['limit'] = $request->get('limit') ? $request->get('limit') : Constants::LIMIT_ROWS_PER_PAGE;
	    	$params['orderBy'] = $request->get('orderBy') ? $request->get('orderBy') : 'sensorName';
	    	$params['order'] = $request->get('order') ? $request->get('order') : 'asc';
	    	$page = $request->get('page') ? $request->get('page') : 1;
	    	$params['offset'] = ($page - 1) * $params['limit'];
	    	
	    	$sensors = $sensorService->getList($params);

	    	$message = 'Get List Sensor success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($sensors, 'json'))
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
