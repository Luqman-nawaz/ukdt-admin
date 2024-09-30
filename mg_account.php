<?php 

    session_start();

    if(!($_SESSION['username'] && $_SESSION['userpass'])){
		header("location:logout.php");
	}

	if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
		header("location:logout.php");
	}

	require_once 'vendor/includes/config.php';

	$username = $_SESSION['username'];

	$currentpass = mysqli_real_escape_string($con, $_POST['currentpass']);

	$newpass = mysqli_real_escape_string($con, $_POST['newpass']);

	$password = password_hash($newpass, PASSWORD_BCRYPT);

	$q = "SELECT * FROM `admins` WHERE `username` = '$username'";

	$r = mysqli_query($con, $q);

	$re = mysqli_fetch_assoc($r);

	$hash = $re['password'];

	if(!password_verify($currentpass, $hash)){
		header("location:mg-account.php?unmatch");
		die();
	}

		$q_change = "UPDATE `admins` set `password` = '$password' WHERE `username` = '$username'";

		$r_change = mysqli_query($con, $q_change);

		if($r_change){
			header("location:logout.php");
		}else{
			header("location:mg-account.php?err");
		}

?>