<?php

	//checking post request

		if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
            header("location:index.php");
		}

			//database connection

			require_once 'vendor/includes/config.php';

			

			//checking inputs

			if(empty($_POST['title']) OR empty($_POST['article']) OR empty($_POST['description']) OR empty($_POST['slug'])){

				header("location:write-a-post.php?empty");

			}



			//sanitizing variables

			$title = $_POST['title'];

			$article = stripslashes(str_replace('\r\n', ' ', $_POST['article']));

			$description = $_POST['description'];

			$slug = mysqli_real_escape_string($con, $_POST['slug']);
			

			//processing image with name convert to microseconds

			$uploaddir = "../ukdt/public/images/";

		    $temp = explode(".", $_FILES["image"]["name"]);

		    $rounded = round(microtime(true)) . rand();

		    $newfilename = $rounded . '.' . end($temp);

		    move_uploaded_file($_FILES["image"]["tmp_name"], $uploaddir . $newfilename);

            $date = date("d-M-Y");;

		    

		    $q = "INSERT INTO `blogs` (`title`, `description`, `featured_image`, `slug`, `article`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?);";

		    $statement = mysqli_stmt_init($con);

		    if(!mysqli_stmt_prepare($statement, $q)){

		    	header("location:mg-blog.php?error=Could not post article.");

		    }

		    mysqli_stmt_bind_param($statement, "sssssss", $title, $description, $newfilename, $slug, $article, $date, $date);

		    if(mysqli_stmt_execute($statement)){

		    	header("location:mg-blog.php?done=Article published");

		    }else{

		        header("location:mg-blog.php?error=Could not post article.");

		    }



	?>