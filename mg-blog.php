<?php

session_start();

  if($_SESSION['username'] && $_SESSION['userpass']){

    include_once 'vendor/includes/config.php';

    include_once 'vendor/includes/head.php';

    include_once 'vendor/includes/nav.php';

    

    

	$q = "SELECT * FROM `blogs` ORDER BY `id` DESC";

    $r = mysqli_query($con, $q);

    ?>

    <main class="pt-5 mx-lg-5">
		
	

    	<div class="container-fluid mt-5">
		
	    	<div class="card mb-4 wow fadeIn">

	        	<!--Card content-->

		        <div class="card-body d-sm-flex justify-content-center">

		          <h4 class="mb-2 mb-sm-0 pt-1">

		            Manage Blog (<?= mysqli_num_rows($r); ?>)

		          </h4>

		        </div>

	      </div>

			<?php if(isset($_GET['err'])){ ?> <div class="alert alert-warning" style="text-align: center;"> Some Error occured </div>	<?php } ?>

			<?php if(isset($_GET['done'])){ ?> <div class="alert alert-success" style="text-align: center;"> <?= $_GET['done']; ?> </div> <?php } ?>

			<a href="write-a-post.php"><button class="btn btn-success"> Write New Post </button></a>

		    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">

			  <thead>

			    <tr>

			      <th class="th-sm">Title

			      </th>

			      <th class="th-sm">Description

			      </th>

                  <th class="th-sm">slug

			      </th>

				  <th class="th-sm">View

			      </th>

				  <th class="th-sm">Edit

			      </th>

				  <th class="th-sm">Delete

			      </th>

			    </tr>

			  </thead>

			  <tbody>

			  	<?php while($re=mysqli_fetch_assoc($r)){ ?>

			    <tr>

			      <td><?php echo $re['title']; ?></td>

			      <td><?php echo $re['description']; ?></td>
                  
                  <td><?php echo $re['slug']; ?></td>

				  <td><a href="https://ukdt.co/blog/<?= $re['slug']; ?>"><button class="btn btn-success btn-sm">View</button></a></td>

				  <td><a href="edit-blog.php?id=<?= $re['id']; ?>"><button class="btn btn-warning btn-sm">Edit</button></a></td>

				  <td><a href="remove_blog.php?id=<?= $re['id']; ?>"><button class="btn btn-danger btn-sm">Remove</button></a></td>

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