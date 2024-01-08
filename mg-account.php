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
			            Manage Account
			          </h4>
			        </div>
		     	</div>
		    </div>
		    <?php
		    if(isset($_GET['err'])){
		    ?>
			<div class="alert alert-warning" style="text-align: center;"> Some Error occured </div>
			<?php } ?>
			<?php
		    if(isset($_GET['unmatch'])){
		    ?>
			<div class="alert alert-warning" style="text-align: center;"> Current password is incorrect </div>
			<?php } ?>
		    <p style="text-align: center;">Soon as the password changes, you'll be logged out. Login with the new password then.</p>
			<div class="card">
		        <div class="container">
		        	<div class="row" style="padding: 50px;">
		        		<div class="col-3"></div>
		        		<div class="col-7">
			            <form action="mg_account.php" method="post">
			              <label><input type="password" name="currentpass" placeholder="Enter current password" class="form-control" /></label>
			              <label><input type="password" name="newpass" placeholder="Enter new password" class="form-control" /></label>
			              <input type="submit" class="btn btn-success btn-sm">
			            </form>
						</div>
						<div class="col-2"></div>
		        	</div>
		        </div>
			</div>
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