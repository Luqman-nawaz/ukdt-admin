<?php

session_start();

  if($_SESSION['username'] && $_SESSION['userpass']){

    require_once 'vendor/includes/config.php';

    include_once 'vendor/includes/head.php';

    include_once 'vendor/includes/nav.php';

    ?>





  <!--Main layout-->

  <main class="pt-5 mx-lg-5">

    <div class="container-fluid mt-5">



      <!-- Heading -->

      <div class="card mb-4 wow fadeIn">

        <?php

        if(isset($_GET['done'])){

        ?>

        <!--Card content-->

        <div class="card-body d-sm-flex justify-content-center">



          <h4 class="mb-2 mb-sm-0 pt-1" style="color: green;">

            Login Successful

          </h4>



        </div>

      <?php } ?>



      </div>

      <!-- Heading -->

       <div class="card mb-4 wow fadeIn">

        <!--Card content-->

        <div class="card-body d-sm-flex justify-content-center">

          <h4 class="mb-2 mb-sm-0 pt-1">

            Dashboard

          </h4>

        </div>

      <div class="container">

        <div class="list-group list-group-sh">

          <a href="mg-users.php" class="list-group-item list-group-item-action waves-effect">

          <i class="fas fa-users-cog"></i> &nbsp; Manage Users</a>

          <a href="mg-orders.php" class="list-group-item list-group-item-action waves-effect">

          <i class="fas fa-users-cog"></i> &nbsp; Manage Franchises</a>

          <a href="mg-orders.php" class="list-group-item list-group-item-action waves-effect">

          <i class="fas fa-users-cog"></i> &nbsp; Manage Advertising</a>

          <a href="mg-admins.php" class="list-group-item list-group-item-action waves-effect">

          <i class="fas fa-user-shield"></i> &nbsp; Manage Admins</a>

          <a href="mg-contact.php" class="list-group-item list-group-item-action waves-effect">

          <i class="fas fa-user-shield"></i> &nbsp; Contact Messages</a>

        </div>

      </div>



      </div>

      <!-- Card -->

      <!-- Card -->

    </div>



    </div>

  </main>

  <!--Main layout-->



<?php include_once 'vendor/includes/footer.php'; ?>



</body>



</html>

<?php

}else{

  header("location:logout.php");

}

?>

