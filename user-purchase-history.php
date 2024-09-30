<?php

session_start();

	if(!($_SESSION['username'] && $_SESSION['userpass'])){
		header("location:logout.php");
	}
    
	include_once 'vendor/includes/config.php';
	include_once 'vendor/includes/head.php';
    include_once 'vendor/includes/nav.php';

    $user_id = $_GET['id'];

    $q = "SELECT * FROM `payments` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";

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

			      <th class="th-sm">Total Amount</th>
			      <th class="th-sm">Status</th>
                  <th class="th-sm">Ordered On</th>

			    </tr>

			  </thead>

			  <tbody>

			  	<?php while($re=mysqli_fetch_assoc($r)){ ?>

			    <tr>

			    	<td><?php echo $re['total_amount']; ?> £</td>
					<td><?php echo $re['order_status']; ?></td>
					<td><?php echo ($re['created_at'] == Null) ? "No Recorded Date" : date('Y-m-d', strtotime($re['created_at'])); ?></td>

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