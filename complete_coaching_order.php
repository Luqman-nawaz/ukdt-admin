<?php 

    session_start();

    if(!$_SESSION['username'] && $_SESSION['userpass']){

    	header("location:https://gamewrap.net/");

    }

	require_once 'vendor/includes/config.php';

	$id = $_GET['id'];
    $amount = "delivered";

	$q = "UPDATE `coachingpayments` SET `order_status` = '$amount' WHERE `coaching_id` = '$id'";

	if(mysqli_query($con, $q)){

		header("location:coaching-order-details.php?id=".$id."&done");

	}else{

		header("location:coaching-order-details.php?id=".$id."&err");

	}



?>