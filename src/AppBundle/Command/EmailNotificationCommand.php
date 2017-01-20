<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class EmailNotificationCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
	        // the name of the command (the part after "bin/console")
	        ->setName('push:email')

	        // the short description shown while running "php bin/console list"
	        ->setDescription('Email notification to user')

	        // the full command description shown when running the command with
	        // the "--help" option
	        ->setHelp("This command allows you to push email notification to user")
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
        	if(!$sensor->getRules()->getEmail()) continue;
        	$html = '';
        	$subject = '';
        	$alert = false;
        	$users = $userService->getList(array('farm' => $sensor->getFarm()->getFarmID()));
            if ($sensor->getSensorHumidity() < $sensor->getRules()->getMinHumidity()  || $sensor->getSensorHumidity() > $sensor->getRules()->getMaxHumidity() || $sensor->getSensorHumidityZone2() < $sensor->getRules()->getMinHumidity()  || $sensor->getSensorHumidityZone2() > $sensor->getRules()->getMaxHumidity())
            {
            	$subject = "Humidity Alert on ".$sensor->getSensorName();
            	$html = "Hi. This is to let you know that your sensor has now been alert: Humidity Alert on " . $sensor->getSensorName();
            	$alert = true;
            }
            //ok
            if ($sensor->getSensorTemperature() < $sensor->getRules()->getMinTemperature() || $sensor->getSensorTemperature() > $sensor->getRules()->getMaxTemperature() || $sensor->getSensorTemperatureZone2() < $sensor->getRules()->getMinTemperature() || $sensor->getSensorTemperatureZone2() > $sensor->getRules()->getMaxTemperature())
            {
            	$subject = "Temperature Alert on ".$sensor->getSensorName();
                $html = "Hi. This is to let you know that your sensor has now been alert: Temperature Alert on " . $sensor->getSensorName();
                $alert = true;
            }

            if ($sensor->getSensorBattery() < $sensor->getRules()->getBattery())
            {
            	$subject = "Battery Alert on ".$sensor->getSensorName();
                $html = "Hi. This is to let you know that your sensor has now been alert: Battery Alert on " . $sensor->getSensorName();
                $alert = true;
            }	
            //send email alert
            if($alert == true && $users){
            	foreach($users as $user){
            		$messages = \Swift_Message::newInstance()
			        ->setSubject($subject)
			        ->setFrom('send@admin.com')
			        ->setTo($user->getUserEmail())
			        ->setBody($html,'text/html');
				    if (!$this->getContainer()->get('mailer')->send($messages, $failures))
					{
					  	$output->writeln("Send email notification fail to : " . $user->getUserName() . " " . $user->getUserFirstName() . "\n Reason: " . $failures);
					}else{
						$output->writeln('Send email notification success to: ' . $user->getUserName() . " " . $user->getUserFirstName());
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