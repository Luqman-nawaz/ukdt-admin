<?php 

    session_start();

    if(!$_SESSION['username'] && $_SESSION['userpass']){

    	header("location:https://gamewrap.net/");

    }

	require_once 'vendor/includes/config.php';

	$id = $_GET['id'];
    $amount = "delivered";

	$q = "UPDATE `payments` SET `order_status` = '$amount' WHERE `order_id` = '$id'";

	if(mysqli_query($con, $q)){

		header("location:order-details.php?id=".$id."&done");

	}else{

		header("location:order-details.php?id=".$id."&err");

	}



?>