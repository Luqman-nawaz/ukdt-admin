<?php

session_start();

  if($_SESSION['username'] && $_SESSION['userpass']){

    include_once 'vendor/includes/head.php';

    include_once 'vendor/includes/nav.php';

    require_once 'vendor/includes/config.php';

    ?>

    <main class="pt-5 mx-lg-5">

    	<div class="container-fluid mt-5">



    	<div class="container-fluid mt-5">

	    	<div class="card mb-4 wow fadeIn">

	        	<!--Card content-->

		        <div class="card-body d-sm-flex justify-content-center">

		          <h4 class="mb-2 mb-sm-0 pt-1">

		            Manage Contact Messages

		          </h4>

		        </div>

	     	</div>

	        <?php

        if(isset($_GET['err'])){

        ?>

      <div class="alert alert-warning" style="text-align: center;"> Some Error occured </div>

      <?php } ?>

              <?php

        if(isset($_GET['done'])){

        ?>

      <div class="alert alert-success" style="text-align: center;"> Order Amount Removed Sucessfully </div>

      <?php } ?>

		    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">

			  <thead>

			    <tr>

			      <th class="th-sm">Boost Type

			      </th>

                  <th class="th-sm">Current Level

			      </th>

                  <th class="th-sm">Desired Level

			      </th>

                  <th class="th-sm">Amount

			      </th>

				  <th class="th-sm">Edit

			      </th>

			      <!-- <th class="th-sm">Remove

			      </th> -->

			    </tr>

			  </thead>

			  <tbody>

			  	<?php

			  	$q = "SELECT * FROM `orderamounts`";

			  	$r = mysqli_query($con, $q);

			  	while($re = mysqli_fetch_assoc($r)){

			  	?>

			    <tr>

                    <td><?php echo $re['boost_type']; ?></td> 
                    
                    <td><?php echo $re['current_level']; ?></td>
                    
                    <td><?php echo $re['desired_level']; ?></td>

                    <td><?php echo $re['amount']; ?></td>

					<td><a href="edit-orderamounts.php?id=<?php echo $re['id']; ?>"><button class="btn btn-warning btn-sm">Edit</button></td>

			      	<!-- <td><a href="remove_orderamount.php?id=<?php echo $re['id']; ?>"><button class="btn btn-danger btn-sm">Remove</button></td> -->

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