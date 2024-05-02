<?php

session_start();

  if($_SESSION['username'] && $_SESSION['userpass']){

    include_once 'vendor/includes/config.php';

    include_once 'vendor/includes/head.php';

    include_once 'vendor/includes/nav.php';

    

    

    $q = "SELECT * FROM `users` ORDER BY `id` DESC";

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

			      <th class="th-sm">Name

			      </th>

			      <th class="th-sm">Email

			      </th>

			      <th class="th-sm">Email Verification

			      </th>

			      <th class="th-sm">Account Created

			      </th>

			      <th class="th-sm">Remove

			      </th>

			    </tr>

			  </thead>

			  <tbody>

			  	<?php while($re=mysqli_fetch_assoc($r)){ ?>

			    <tr>

			      <td><?php echo $re['name']; ?></td>

			      <td><?php echo $re['email']; ?></td>

			      <td><?php if($re['email_verified_at'] == NULL){echo 'Unverified';}else{ echo date("F jS, Y", strtotime($re['email_verified_at']));} ?></td>

			      <td><?php echo date("F jS, Y", strtotime($re['created_at'])); ?></td>

			      <td><a href="remove_user.php?id=<?php echo $re['id']; ?>"><button class="btn btn-danger btn-sm">Remove</button></a></td>

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

<?php

}else{

  header("location:logout.php");

}

?>