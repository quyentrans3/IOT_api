<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Utility\Constants;

class UserController extends Controller
{
    public function loginAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$email = null;
	    	$password = null;
    		$content = $this->get("request")->getContent();
    		if (!empty($content))
		    {
		        $params = json_decode($content, true); // 2nd param to get as array
		        $email = isset($params['userEmail']) ? $params['userEmail'] : null ;
		        $password = isset($params['userPassword']) ? $params['userPassword'] : null ;
		    }
	    	if(!$email || !$password){
	    		throw new \Exception("Email and Password required");	    		
	    	}
	    	$userService = $this->get('user.services');
	    	$serializer = $this->get('serializer');

	    	$user = $userService->getUser(
	    		array("userEmail" => $email, "userPassword" => $password)
	    	);
	    	if($user){
	    		$token = $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 36);
	    		$update = $userService->updateToken($user->getUserID(), $token);
	    		if(!$update){
	    			throw new \Exception("Login failed");
	    		}
	    	}
	    	if(!$user){
    			throw new \Exception("Email or password incorrect");
    		}
	    	$message = 'Login success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($user, 'json'))
			));
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage(),
				/*'params' => $this->get('request')->request->all(),
				'json_content' => $this->get("request")->getContent(),
				'headers' => $request->headers->all()*/
			));
    	}
		return $response;
    }
    public function logoutAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$email = null;
    		$content = $this->get("request")->getContent();
    		if (!empty($content))
		    {
		        $params = json_decode($content, true); // 2nd param to get as array
		        $email = isset($params['userEmail']) ? $params['userEmail'] : null ;
		    }
	    	if(!$email){
	    		throw new \Exception("Email is required");	    		
	    	}
	    	$userService = $this->get('user.services');
	    	$serializer = $this->get('serializer');

	    	$user = $userService->getUser(
	    		array("userEmail" => $email)
	    	);
	    	if($user){
	    		$update = $userService->updateToken($user->getUserID(), '');
	    		if(!$update){
	    			throw new \Exception("Logout failed");
	    		}
	    	}
	    	if(!$user){
    			throw new \Exception("Email is incorrect");
    		}
	    	$message = 'Logout success';
			$response->setData(array(
				'status' => 200,
				'message' => $message
			));
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage(),
				/*'params' => $this->get('request')->request->all(),
				'json_content' => $this->get("request")->getContent(),
				'headers' => $request->headers->all()*/
			));
    	}
		return $response;
    }
    public function getUserAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$email = $request->get("userEmail");
	    	if(!$email){
	    		throw new \Exception("Email is required");	    		
	    	}
	    	$userService = $this->get('user.services');
	    	$serializer = $this->get('serializer');

	    	$user = $userService->getUser($request->query->all());
	    	if(!$user){
    			throw new \Exception("User not exists");
    		}
	    	$message = 'Get Data User success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($user, 'json'))
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
	    	$userService = $this->get('user.services');
	    	$serializer = $this->get('serializer');
	    	$params = $request->query->all();
	    	$params['limit'] = $request->get('limit') ? $request->get('limit') : Constants::LIMIT_ROWS_PER_PAGE;
	    	$params['orderBy'] = $request->get('orderBy') ? $request->get('orderBy') : 'userName';
	    	$params['order'] = $request->get('order') ? $request->get('order') : 'asc';
	    	$page = $request->get('page') ? $request->get('page') : 1;
	    	$params['offset'] = ($page - 1) * $params['limit'];
	    	
	    	$users = $userService->getList($params);

	    	$message = 'Get List User success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    'data' => json_decode($serializer->serialize($users, 'json'))
			));
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage()
			));
    	}
		return $response;
    }

    public function updateUserAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$userID = null;
    		$content = $this->get("request")->getContent();
    		if (!empty($content))
		    {
		        $params = json_decode($content, true); // 2nd param to get as array
		        $userID = isset($params['userID']) ? $params['userID'] : null ;
		    }
	    	if(!$userID){
	    		throw new \Exception("userID required");	    		
	    	}
	    	$userService = $this->get('user.services');
	    	$serializer = $this->get('serializer');

	    	$user = $userService->updateUser($userID, $params);
	    	if($user){
	    		$response->setData(array(
					'status' => 200,
					'message' => 'Update Success',
					'data' => json_decode($serializer->serialize($user, 'json'))
				));
	    	}else{
	    		throw new \Exception("Update User failed");	
	    	}
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage()
			));
    	}
		return $response;
    }

    public function forgotPasswordAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$email = null;
    		$content = $this->get("request")->getContent();
    		if (!empty($content))
		    {
		        $params = json_decode($content, true); // 2nd param to get as array
		        $email = isset($params['userEmail']) ? $params['userEmail'] : null ;
		    }
	    	if(!$email){
	    		throw new \Exception("Email is required");	    		
	    	}
	    	$userService = $this->get('user.services');
	    	$serializer = $this->get('serializer');

	    	$user = $userService->getUser(
	    		array("userEmail" => $email)
	    	);
	    	if($user){
	    		$validCode = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 6);
	    		$update = $userService->updateValidCode($user->getUserID(), $validCode);
	    		if(!$update){
	    			throw new \Exception("Reset Password failed");
	    		}
	    	}
	    	if(!$user){
    			throw new \Exception("User not exists");
    		}
    		$html = "Dear " . $user->getUserName() . "!<br/>";
    		$html .= "This is the valid code when you submit forgot password request<br/>";
    		$html .= "<h3>".$user->getValidCode()."</h3><br/>";
    		$html .= "Thanks!";
    		$messages = \Swift_Message::newInstance()
		        ->setSubject('Hello Email')
		        ->setFrom('send@admin.com')
		        ->setTo($user->getUserEmail())
		        ->setBody($html,'text/html');
		    if (!$this->get('mailer')->send($messages, $failures))
			{
			  	$message = $failures;
			}else{
				$message = 'Send email forgot password success';	
			}
	    	//$message = 'Send email forgot password success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    //'data' => json_decode($serializer->serialize($user, 'json'))
			));
    	}catch(\Exception $ex){
			$response->setData(array(
				'status' => 500,
				'message' => $ex->getMessage()
			));
    	}
		return $response;
    }
    public function resetPasswordAction(Request $request)
    {
    	$response = new JsonResponse();
    	try{
    		$validCode = null;
    		$userPassword = null;
    		$content = $this->get("request")->getContent();
    		if (!empty($content))
		    {
		        $params = json_decode($content, true); // 2nd param to get as array
		        $validCode = isset($params['validCode']) ? $params['validCode'] : null ;
		        $userPassword = isset($params['userPassword']) ? $params['userPassword'] : null ;
		    }
	    	if(!$validCode || !$userPassword){
	    		throw new \Exception("Valid Code or password is required");	    		
	    	}
	    	$userService = $this->get('user.services');
	    	$serializer = $this->get('serializer');

	    	$user = $userService->getUser(
	    		array("validCode" => $validCode)
	    	);
	    	if(!$user){
    			throw new \Exception("Code invalid");
    		}
    		$param = array('userPassword' => $userPassword, 'validCode' => '');
    		$update = $userService->updateAllUser($user->getUserID(), $param);
    		if(!$update){
    			throw new \Exception("Reset Password Unsuccess");
    		}
    		$message = 'Reset Password success';
			$response->setData(array(
				'status' => 200,
				'message' => $message,
			    //'data' => json_decode($serializer->serialize($user, 'json'))
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
