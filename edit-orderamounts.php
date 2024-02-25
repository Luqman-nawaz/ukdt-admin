<?php

session_start();
include_once 'vendor/includes/config.php';

$id = $_GET['id'];
$q = "SELECT * FROM `orderamounts` WHERE `id` = '$id'";
$r = mysqli_query($con, $q);
$re = mysqli_fetch_object($r);

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

      <div class="alert alert-success" style="text-align: center;"> Price Updated </div>

      <?php } ?>

        <div class="card pt-4">

          <div class="container">

            <p style="text-align:center;">Boost Type: <?= $re->boost_type; ?></p>
            <p style="text-align:center;">Current Level: <?= $re->current_level; ?></p>
            <p style="text-align:center;">Desired Level: <?= $re->desired_level; ?></p>

            <form action="edit_orderamounts.php" method="post">

              <div class="form-row">
                <input type="text" name="id" value="<?= $re->id; ?>" style="display: none; "/>

                <div class="col-md-1"></div>

                <div class="form-group col-md-4">

                  <label for="useremail">Amount</label>

                  <input type="text" class="form-control" name="amount" id="useremail" placeholder="<?= $re->amount; ?>">

                </div>

                <div class="form-group col-md-1 pt-4">

                  <input type="submit" class="btn btn-success btn-sm" value="Update" />

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