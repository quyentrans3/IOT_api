<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use sngrl\PhpFirebaseCloudMessaging\Notification;

class AppNotificationCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
	        // the name of the command (the part after "bin/console")
	        ->setName('push:app')

	        // the short description shown while running "php bin/console list"
	        ->setDescription('Push notification to app\' user')

	        // the full command description shown when running the command with
	        // the "--help" option
	        ->setHelp("This command allows you to push notification to app\' user")
	    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Start push',
            '============',
            '',
        ]);
        $sensorService = $this->getContainer()->get('sensor.services');
        $userService = $this->getContainer()->get('user.services');
        $params = array();      
        $sensors = $sensorService->getList($params);
        foreach ($sensors as $key => $sensor)
        {
            if(!$sensor->getRules()->getPush()) continue;
            $body = '';
            $title = '';
            $alert = false;
            $users = $userService->getList(array('farm' => $sensor->getFarm()->getFarmID()));
            if ($sensor->getSensorHumidity() < $sensor->getRules()->getMinHumidity()  || $sensor->getSensorHumidity() > $sensor->getRules()->getMaxHumidity() || $sensor->getSensorHumidityZone2() < $sensor->getRules()->getMinHumidity()  || $sensor->getSensorHumidityZone2() > $sensor->getRules()->getMaxHumidity())
            {
                $title = 'Humidity Alert';
                $body = "Hi. This is to let you know that your sensor has now an alert for you to look at: Humidity Alert on " . $sensor->getSensorName();
                $alert = true;
            }
            //ok
            if ($sensor->getSensorTemperature() < $sensor->getRules()->getMinTemperature() || $sensor->getSensorTemperature() > $sensor->getRules()->getMaxTemperature() || $sensor->getSensorTemperatureZone2() < $sensor->getRules()->getMinTemperature() || $sensor->getSensorTemperatureZone2() > $sensor->getRules()->getMaxTemperature())
            {
                $title = 'Temperature Alert';
                $body = "Hi. This is to let you know that your sensor has now an alert for you to look at: Temperature Alert on " . $sensor->getSensorName();
                $alert = true;
            }

            if ($sensor->getSensorBattery() < $sensor->getRules()->getBattery())
            {
                $title = 'Battery Alert';
                $body = "Hi. This is to let you know that your sensor has now an alert for you to look at: Battery Alert on " . $sensor->getSensorName();
                $alert = true;
            }   
            //send email alert
            if($alert == true && $users){
                foreach($users as $user){
                    //send to android device
                    if($user->getDeviceOS() == 'android' && $user->getDeviceID() != ""){
                        $server_key = 'AAAAP5M8Qig:APA91bG7YVQ8yd8cUvN9W39Nl2X07HtZpI4dOPc8V95n3rQu_u4c_z9jKL74l6gKpwpDf_dQnd4Uf_hQ9GFBwtwetJvkm2gqTGPWj8z6ORjMlSQQhrGvdOwRT9jkyILh1OtPjS3ACkz8';
                        $client = new Client();
                        $client->setApiKey($server_key);
                        $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

                        $message = new Message();
                        $message->setPriority('high');
                        $message->addRecipient(new Device($user->getDeviceID()));
                        $message
                            ->setNotification(new Notification($title, $body))
                            ->setData(['key' => $title])
                        ;
                        $data = $client->send($message);
                        if(!$data){
                            $output->writeln("Push notification failed: " . $user->getUserName() . " " . $user->getUserFirstName());
                        }else{
                            $output->writeln('Send message notification success to android app: ' . $user->getUserName() . " " . $user->getUserFirstName());
                        }
                    }
                    //to-do: send to ios device
                    else if($user->getDeviceOS() == 'ios' && $user->getDeviceID() != ""){

                    }
                }
            }       
        }
        $output->writeln([
            'End push',
            '============'
        ]);
    }
}