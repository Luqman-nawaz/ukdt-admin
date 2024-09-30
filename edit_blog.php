<?php

	//checking post request

		if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
			header("location:index.php");
		}

			//database connection
			require_once 'vendor/includes/config.php';

            $id = $_POST['id'];

			//checking inputs
			if(empty($_POST['title']) OR empty($_POST['content']) OR empty($_POST['description']) OR empty($_POST['slug'])){
				header("location:edit-blog.php?id=".$id."&error=Please fill in all the fields!");
			}

			//sanitizing variables

			

			$title = $_POST['title'];

			$article = stripslashes(str_replace('\r\n', ' ', mysqli_real_escape_string($con, $_POST['content'])));

			$description = $_POST['description'];

			$slug = mysqli_real_escape_string($con, $_POST['slug']);

            $image_file = $_FILES["image"];

            
            if(isset($image_file)){  

                //processing image with name convert to microseconds

                $uploaddir = "../ukdt/public/images/";

                $temp = explode(".", $_FILES["image"]["name"]);

                $rounded = round(microtime(true)) . rand();

                $newfilename = $rounded . '.' . end($temp);

                move_uploaded_file($_FILES["image"]["tmp_name"], $uploaddir . $newfilename);

            }else{

                $q = "SELECT * FROM `blogs` WHERE `id` = '$id'";
                $r = mysqli_query($con, $q);
                $re = mysqli_fetch_object($r);
                
                $newfilename = $re->featured_image;
            }

		    $q = "UPDATE `blogs` SET `title` = ?, `description` = ?, `featured_image` = ?, `slug` = ?, `article` = ? WHERE `id` = ?;";

		    $statement = mysqli_stmt_init($con);

		    if(!mysqli_stmt_prepare($statement, $q)){

		    	header("location:edit-blog.php?id=".$id."&error=Failed to update post.");

		    }

		    mysqli_stmt_bind_param($statement, "sssssi", $title, $description, $newfilename, $slug, $article, $id);

		    if(mysqli_stmt_execute($statement)){

		    	header("location:edit-blog.php?id=".$id."&done=Article updated successfully!");

		    }



	?>