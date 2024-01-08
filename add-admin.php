<?php
session_start();
  if($_SESSION['username'] && $_SESSION['userpass']){
    include_once 'vendor/includes/head.php';
    include_once 'vendor/includes/nav.php';
    ?>
    <main class="pt-5 mx-lg-5">
      <div class="container-fluid mt-5">

      <div class="container-fluid mt-5">
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-center">
              <h4 class="mb-2 mb-sm-0 pt-1">
                Add Administrators
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
      <div class="alert alert-success" style="text-align: center;"> New Administrator Added Sucessfully </div>
      <?php } ?>
        <div class="card pt-4">
          <div class="container">
            <form action="add_admin.php" method="post">
              <div class="form-row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-4">
                  <label for="useremail">Username</label>
                  <input type="username" class="form-control" name="username" id="useremail" placeholder="Username">
                </div>
                <div class="form-group col-md-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group col-md-1 pt-4">
                  <input type="submit" class="btn btn-success btn-sm" value="Add" />
                </div>
              </div>
            </form>
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