<?php 

    session_start();

    if(!$_SESSION['username'] && $_SESSION['userpass']){

    	header("location:https://gamewrap.net/");

    }

	require_once 'vendor/includes/config.php';

	$id = mysqli_real_escape_string($con, $_GET['id']);

    $q_payments = "DELETE FROM `payments` WHERE `order_id` = ?;";

	$statement_payments = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($statement_payments, $q_payments)){
		header("location:mg-order-amounts.php?err");
	}
	mysqli_stmt_bind_param($statement_payments, "i", $id);
	mysqli_stmt_execute($statement_payments);


	$q = "DELETE FROM `boosts` WHERE `id` = ?;";

	$statement = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($statement, $q)){

		header("location:mg-orders.php?err");

	}

	mysqli_stmt_bind_param($statement, "i", $id);

	if(mysqli_stmt_execute($statement)){

		header("location:mg-orders.php?done");

	}else{

		header("location:mg-orders.php?err");

	}



?>