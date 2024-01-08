<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>MyBoost.GG Admin Panel</title>

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->

  <link href="css/mdb.min.css" rel="stylesheet">

  <!-- Your custom styles (optional) -->

  <link href="css/style.min.css" rel="stylesheet">

  <style>



    .map-container{

overflow:hidden;

padding-bottom:56.25%;

position:relative;

height:0;

}

.map-container iframe{

left:0;

top:0;

height:100%;

width:100%;

position:absolute;

}

  </style>

</head>



<body>



      <div class="mt-5">

        <div class="card">

          <div class="container">

            <br>

            <?php if(isset($_GET['err'])){ ?><div class="alert alert-danger" style="text-align: center;"><i class="fas fa-exclamation-triangle"></i>&nbsp;Wrong Username or Password</div><?php } ?>

            <form action="login_validate.php" method="post" style="padding-top: 30px;">

              <div class="row">

              	<div class="col-3"></div>

	              	<div class="col-6">

	                  <label for="username">Username</label>

	                  <input type="text" class="form-control" name="username" id="username" placeholder="Username">

	            	</div>

	            	<div class="col-3"></div>

            	</div>

                <div class="row pt-4">

              		<div class="col-3"></div>

	              	<div class="col-6">

	                  <label for="userpass">Password</label>

	                  <input type="password" class="form-control" name="userpass" id="userpass" placeholder="Password">

	            	</div>

	            	<div class="col-3"></div>

            	</div>

                <div class="row pt-4 pb-4">

              		<div class="col-3"></div>

	              	<div class="col-6">

	                  <input type="submit" class="form-control btn-success"value="Login">

	            	</div>

	            	<div class="col-3"></div>

            	</div>

            </div>

            </form>

        </div>

      </div>













<!-- SCRIPTS -->

<!-- JQuery -->

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

<!-- Bootstrap tooltips -->

<script type="text/javascript" src="js/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->

<script type="text/javascript" src="js/mdb.min.js"></script>

