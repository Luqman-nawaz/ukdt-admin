<?php 

use Symfony\Component\Mailer\Mailer; 
use Symfony\Component\Mailer\Transport\Smtp\SmtpTransport; 
use Symfony\Component\Mime\Email;

require_once './vendor/autoload.php';

    session_start();

    if(!$_SESSION['username'] && $_SESSION['userpass']){

    	header("location:https://gamewrap.net/");

    }

	require_once 'vendor/includes/config.php';

	$id = $_GET['id'];
    $amount = "delivered";

	$q = "UPDATE `payments` SET `order_status` = '$amount' WHERE `order_id` = '$id'";

	if(mysqli_query($con, $q)){

		$message = "Your order placed on MyBoost.GG has been delivered!";

		$transport = (new Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport
		('smtp.strato.de', 465))
						->setUsername('support@myboost.gg')
						->setPassword('@Kekmo1212@');

		$mailer = new Mailer($transport); 

		$email = (new Email())
					->from('support@myboost.gg')
					->to($email)
					->subject('MyBoost Order Update')
					->text($message)
					->html($message);

		$mailer->send($email);

		header("location:order-details.php?id=".$id."&done");

	}else{

		header("location:order-details.php?id=".$id."&err");

	}



?>