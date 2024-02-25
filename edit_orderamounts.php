<?php 

    session_start();

    if(!$_SESSION['username'] && $_SESSION['userpass']){

    	header("location:https://gamewrap.net/");

    }

	require_once 'vendor/includes/config.php';

	$id = $_POST['id'];
    $amount = $_POST['amount'];

	$q = "UPDATE `orderamounts` SET `amount` = '$amount' WHERE `id` = '$id'";

	if(mysqli_query($con, $q)){

		header("location:edit-orderamounts.php?id=".$id."&done");

	}else{

		header("location:edit-orderamounts.php?id=".$id."&err");

	}



?>