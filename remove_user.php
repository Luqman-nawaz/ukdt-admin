<?php 
    session_start();
    if(!$_SESSION['username'] && $_SESSION['userpass']){
    	header("location:https://gamewrap.net/");
    }
	require_once 'vendor/includes/config.php';
	$id = mysqli_real_escape_string($con, $_GET['id']);
	$q = "DELETE FROM `users` WHERE `id` = ?;";
	$statement = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($statement, $q)){
		header("location:mg-users.php?err");
	}
	mysqli_stmt_bind_param($statement, "i", $id);
	if(mysqli_stmt_execute($statement)){
		header("location:mg-users.php?done");
	}else{
		header("location:mg-users.php?err");
	}

?>