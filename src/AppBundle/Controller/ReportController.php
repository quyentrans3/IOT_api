<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Utility\Constants;

class ReportController extends Controller
{

    public function getAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
	    	$reportService = $this->get('report.services');
	    	$serializer = $this->get('serializer');

	    	$datas = $reportService->getReportDatas($request->query->all());
	    	$datas_cell2 = $reportService->getReportDatasCells($request->query->all());
	    	$dates = array();
	    	//parse data to array with date key
	    	foreach($datas as $val){
	    		$date = new \DateTime($val->getDateLastUpdate());
	    		$date = $date->format('y-m-d H:i:s');
	    		$dates[$date] = array(
	    			'temperatureZone1' => (float)$val->getTemperature1(),
	    			'humidityZone1' => (float)$val->getHumidity1(),
	    			'dateTime' => $date
	    		);
	    	}
	    	foreach($datas_cell2 as $val){
	    		$date = new \DateTime($val->getDateLastUpdate());
	    		$date = $date->format('y-m-d H:i:s');
	    		//append to date exists cell 1
	    		if(isset($dates[$date])){
	    			$dates[$date]['temperatureZone2'] = (float)$val->getTemperature2();
	    			$dates[$date]['humidityZone2'] = (float)$val->getHumidity2();
	    		}else{
	    			$dates[$date] = array(
		    			'temperatureZone2' => (float)$val->getTemperature2(),
		    			'humidityZone2' => (float)$val->getHumidity2(),
		    			'dateTime' => $date
		    		);
	    		}
	    	}
	    	//remove key dates
	    	$dates = array_values($dates);
			$response->setData(array(
				'status' => 200,
				'message' => 'Get Data report success',
			    'data' => $dates
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
