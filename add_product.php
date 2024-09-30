<?php 

    session_start();

    if(!$_SESSION['username'] && $_SESSION['userpass']){

    	header("location:https://gamewrap.net/");

    }

	require_once 'vendor/includes/config.php';

	$name = $_POST['name'];
    $icon = $_POST['icon'];
    $product_training = $_POST['product_training'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $buy_link = $_POST['buy_link'];

            $uploaddir = "../oseintifoundation/public/images/";

		    $temp = explode(".", $_FILES["featured_image"]["name"]);

		    $rounded = round(microtime(true));

		    $newfilename = $_FILES["featured_image"]["name"] . '-' . $rounded . '.' . end($temp);

		    move_uploaded_file($_FILES["featured_image"]["tmp_name"], $uploaddir . $newfilename);

	$q = "INSERT INTO `products` (`name`,`featured_image`, `icon`, `product_training`, `description`, `link`, `buy_link`) VALUES (?,?,?,?,?,?,?);";

	$statement = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($statement, $q)){
		header("location:add-product.php?err");
	}

	mysqli_stmt_bind_param($statement, "sssssss", $name, $newfilename, $icon, $product_training, $description, $link, $buy_link);

	if(!mysqli_stmt_execute($statement)){
		header("location:add-product.php?err");
	}

    header("location:add-product.php?done");



?>