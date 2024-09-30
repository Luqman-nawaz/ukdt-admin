<?php 

    session_start();

    if(!$_SESSION['username'] && $_SESSION['userpass']){

    	header("location:https://gamewrap.net/");

    }

	require_once 'vendor/includes/config.php';

	$name = $_POST['name'];
    $role = $_POST['role'];

        $uploaddir = "../oseintifoundation/public/images/";

	    $temp = explode(".", $_FILES["image"]["name"]);

	    $rounded = round(microtime(true));

	    $newfilename = $_FILES["image"]["name"] . '-' . $rounded . '.' . end($temp);

	    move_uploaded_file($_FILES["image"]["tmp_name"], $uploaddir . $newfilename);

	$q = "INSERT INTO `representatives` (`name`, `image`, `role`) VALUES (?,?,?);";

	$statement = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($statement, $q)){
		header("location:add-rep.php?err");
	}

	mysqli_stmt_bind_param($statement, "sss", $name, $newfilename, $role);

	if(!mysqli_stmt_execute($statement)){
		header("location:add-rep.php?err");
	}

    header("location:add-rep.php?done");



?>