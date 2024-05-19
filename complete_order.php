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

	$q_order = "SELECT `user_id` FROM `boosts` WHERE `id` = '$id'";
	$r_order = mysqli_query($con, $q_order);
	$re_order = mysqli_fetch_assoc($r_order);
	$user_id = $re_order['user_id'];

	$q_user = "SELECT * FROM `users` WHERE `id` = '$user_id'";
	$r_user = mysqli_query($con, $q_user);
	$re_user = mysqli_fetch_assoc($r_user);
	$user_mail = $re_user['email'];

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
					->to($user_mail)
					->subject('MyBoost Order Update')
					->text($message)
					->html($message);

		$mailer->send($email);

		header("location:order-details.php?id=".$id."&done");

	}else{

		header("location:order-details.php?id=".$id."&err");

	}



?>