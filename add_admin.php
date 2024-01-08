<?php 

    session_start();

    if(!$_SESSION['username'] && $_SESSION['userpass']){

    	header("location:https://gamewrap.net/");

    }

	require_once 'vendor/includes/config.php';

	$username = $_POST['username'];

	$password = mysqli_real_escape_string($con, $_POST['password']);

	$newpass = password_hash($password, PASSWORD_BCRYPT);

	$q = "INSERT INTO `admin` (`username`,`password`) VALUES (?,?);";

	$statement = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($statement, $q)){

		header("location:add-admin.php?err");

	}

	mysqli_stmt_bind_param($statement, "ss", $username, $newpass);

	if(mysqli_stmt_execute($statement)){

		header("location:add-admin.php?done");

	}else{

		header("location:add-admin.php?err");

	}



?>