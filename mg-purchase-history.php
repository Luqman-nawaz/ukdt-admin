<?php

session_start();

	if(!($_SESSION['username'] && $_SESSION['userpass'])){
		header("location:logout.php");
	}
    
	include_once 'vendor/includes/config.php';
	include_once 'vendor/includes/head.php';
    include_once 'vendor/includes/nav.php';

    $q = "SELECT *, `users`.id as userid FROM `users` INNER JOIN `coins` ON users.`id` = coins.`user_id` ORDER BY users.`id` DESC";

    $r = mysqli_query($con, $q);

?>

    <main class="pt-5 mx-lg-5">
		
	

    	<div class="container-fluid mt-5">
		
	    	<div class="card mb-4 wow fadeIn">

	        	<!--Card content-->

		        <div class="card-body d-sm-flex justify-content-center">

		          <h4 class="mb-2 mb-sm-0 pt-1">

		            Manage Users (<?= mysqli_num_rows($r); ?>)

		          </h4>

		        </div>

	      </div>

	<?php if(isset($_GET['done'])){	?>
        <div class="alert alert-success" style="text-align: center;"> <?= $_GET['done']; ?> </div>
    <?php } ?>

		    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">

			  <thead>

			    <tr>

			      <th class="th-sm">Name</th>
			      <th class="th-sm">Email</th>
				  <th class="th-sm">Verification</th>
				  <th class="th-sm">Country</th>
				  <th class="th-sm">Phone No</th>
				  <th class="th-sm">Wallet</th>
				  <th class="th-sm">Balance</th>
			      <th class="th-sm">View Purchase History</th>

			    </tr>

			  </thead>

			  <tbody>

			  	<?php while($re=mysqli_fetch_assoc($r)){ ?>

			    <tr>

			    	<td><?php echo $re['name']; ?></td>
					<td><?php echo $re['email']; ?></td>
					<td><?php echo ($re['email_verified_at'] == Null) ? "Not Verified" : date('Y-m-d', strtotime($re['email_verified_at'])); ?></td>
					<td><?php echo $re['country']; ?></td>
					<td><?php echo $re['phone_no']; ?></td>
					<td><?php echo $re['wallet_id']; ?></td>
					<td><?php echo $re['ukdt_coins']; ?></td>
			      	<td><a href="user-purchase-history.php?id=<?php echo $re['userid']; ?>"><button class="btn btn-info btn-sm">View History</button></a></td>

			    </tr>

				<?php } ?>

			   </tbody>

			</table>

		</div>

	</main>



	<script type="text/javascript">

	$(document).ready(function () {

	$('#dtBasicExample').DataTable();

	$('.dataTables_length').addClass('bs-select');

	});

	</script>

	<script type="text/javascript" src="js/addons/datatables.min.js"></script>



    <?php include_once 'vendor/includes/footer.php'; ?>



</body>



</html>