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
	    	if(!$sensor){
	    		throw new \Exception("Sensor not exists");
	    	}
    		$sensor->setAlertHumidity(false);
			$sensor->setAlertTemperature(false);
			$sensor->setAlertBattery(false);
			$sensor->setAlertHumidityZone2(false);
			$sensor->setAlertTemperatureZone2(false);
            if ($sensor->getSensorHumidity() < $sensor->getRules()->getMinHumidity()  || $sensor->getSensorHumidity() > $sensor->getRules()->getMaxHumidity())
            {
            	$sensor->setAlertHumidity(true);
            }
            //ok
            if ($sensor->getSensorTemperature() < $sensor->getRules()->getMinTemperature() || $sensor->getSensorTemperature() > $sensor->getRules()->getMaxTemperature())
            {
                $sensor->setAlertTemperature(true);
            }
        	
            if ($sensor->getSensorHumidityZone2() < $sensor->getRules()->getMinHumidity()  || $sensor->getSensorHumidityZone2() > $sensor->getRules()->getMaxHumidity())
            {
            	$sensor->setAlertHumidityZone2(true);
            }
            //ok
            if ($sensor->getSensorTemperatureZone2() < $sensor->getRules()->getMinTemperature() || $sensor->getSensorTemperatureZone2() > $sensor->getRules()->getMaxTemperature())
            {
                $sensor->setAlertTemperatureZone2(true);
            }

            if ($sensor->getSensorBattery() < $sensor->getRules()->getBattery())
            {
                $sensor->setAlertBattery(true);
            }

			$response->setData(array(
				'status' => 200,
				'message' => 'Get Data Sensor success',
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
	    	foreach ($sensors as $key => $sensor)
            {
            	$sensors[$key]->setAlertHumidity(false);
				$sensors[$key]->setAlertTemperature(false);
				$sensors[$key]->setAlertBattery(false);
				$sensors[$key]->setAlertHumidityZone2(false);
				$sensors[$key]->setAlertTemperatureZone2(false);
	            if ($sensor->getSensorHumidity() < $sensor->getRules()->getMinHumidity()  || $sensor->getSensorHumidity() > $sensor->getRules()->getMaxHumidity())
	            {
	            	$sensors[$key]->setAlertHumidity(true);
	            }
	            //ok
	            if ($sensor->getSensorTemperature() < $sensor->getRules()->getMinTemperature() || $sensor->getSensorTemperature() > $sensor->getRules()->getMaxTemperature())
	            {
	                $sensors[$key]->setAlertTemperature(true);
	            }
	        	
	            if ($sensor->getSensorHumidityZone2() < $sensor->getRules()->getMinHumidity()  || $sensor->getSensorHumidityZone2() > $sensor->getRules()->getMaxHumidity())
	            {
	            	$sensors[$key]->setAlertHumidityZone2(true);
	            }
	            //ok
	            if ($sensor->getSensorTemperatureZone2() < $sensor->getRules()->getMinTemperature() || $sensor->getSensorTemperatureZone2() > $sensor->getRules()->getMaxTemperature())
	            {
	                $sensors[$key]->setAlertTemperatureZone2(true);
	            }

	            if ($sensor->getSensorBattery() < $sensor->getRules()->getBattery())
	            {
	                $sensors[$key]->setAlertBattery(true);
	            }			
            }
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
