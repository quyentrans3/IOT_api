<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Utility\Constants;
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use sngrl\PhpFirebaseCloudMessaging\Notification;

class PushController extends Controller
{
    public function indexAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
	    	$serializer = $this->get('serializer');

			$server_key = 'AAAAP5M8Qig:APA91bG7YVQ8yd8cUvN9W39Nl2X07HtZpI4dOPc8V95n3rQu_u4c_z9jKL74l6gKpwpDf_dQnd4Uf_hQ9GFBwtwetJvkm2gqTGPWj8z6ORjMlSQQhrGvdOwRT9jkyILh1OtPjS3ACkz8';
			$client = new Client();
			$client->setApiKey($server_key);
			$client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

			$message = new Message();
			$message->setPriority('high');
			$message->addRecipient(new Device('el2cX2LM0_c:APA91bGS2aFXqZ2O1yGiBVlYgK-3_BZ0UPQNdqJssP6q6fSD2KmQNlkH-Yr8w6wingB1Rbqxy-Ah-xXuXNKXtSSIDUVM5Bo9XKOfTYU8jjfzR6o99CTTLBwi7GTwB5FzlvhHhv63sKL0'));
			$message
			    ->setNotification(new Notification('some title', 'some body'))
			    ->setData(['key' => 'value'])
			;
			$data = $client->send($message);
			if(!$data){
				throw new \Exception("Push notification failed");
			}
			$response->setData(array(
				'status' => 200,
				'message' => 'Push notification success',
			    'data' => $data->getBody()->getContents()
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
