<?php

session_start();

  if($_SESSION['username'] && $_SESSION['userpass']){

    include_once 'vendor/includes/config.php';

    include_once 'vendor/includes/head.php';

    include_once 'vendor/includes/nav.php';

    

    $id = $_GET['id'];

    $q = "SELECT *, users.`name` as `username`, coachings.`id` as `coachingid` FROM `coachings` INNER JOIN `users` ON users.`id` = coachings.`user_id` WHERE coachings.`id` = '$id' ORDER BY coachings.`id` DESC";

    $r = mysqli_query($con, $q);

    $re = mysqli_fetch_object($r);

    ?>

    <main class="pt-5 mx-lg-5">
		
	

    	<div class="container-fluid mt-5">
		
	    	<div class="card mb-4 wow fadeIn">

	        	<!--Card content-->

		        <div class="card-body d-sm-flex justify-content-center">

		          <h4 class="mb-2 mb-sm-0 pt-1">

		            Order By <?= $re->username; ?>

		          </h4>

		        </div>

	      </div>

        <?php

        if(isset($_GET['done'])){

        ?>

        <div class="alert alert-success" style="text-align: center;"> Order Marked Complete Sucessfully </div>

        <?php } ?>


          <div class="jumbotron">
          <h3 class="text-center">Order Type - <?= $re->boost_type;?></h3>
          <h3 class="text-center">Ingame Role: <?= $re->ingame_role;?></h3>
          <h3 class="text-center">Number of Reviews: ➡ <?= $re->no_of_reviews;?></h3>
          <h3 class="text-center">Priority Order ➡ <?php if($re->priority_order == 0){ echo "No"; }else {echo "Yes";};?></h3>
          <h3 class="text-center">Order Created: <?= date("F jS, Y", strtotime($re->created_at)); ?></h3>

          <hr>
            <?php
                $order_id = $re->coachingid;
                $q_order = "SELECT * FROM `coachingpayments` WHERE `coaching_id` = '$order_id'";
                $r_order = mysqli_query($con, $q_order);
                $re_order = mysqli_fetch_object($r_order);
                if(mysqli_num_rows($r_order) == 0){
                  die('
                  <p style="text-align:center;">Account details not yet provided</p><br>
                    <a class="btn btn-danger btn-sm" href="remove_coaching_order.php?id='.$order_id.'" role="button">Remove</a>');
                }
            ?>
            <div class="card text-center mx-auto" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Account Details</h5>
                    <p class="mb-0">Total Amount: <?= $re_order->total_amount; ?>$</p>
                    <p class="mb-0">Payment Status: <?= $re_order->order_status; ?></p>
                    <p class="mb-0">Payment Method: <?= $re_order->payment_method; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M424.7 299.8c2.9-14 4.7-28.9 4.7-43.8 0-113.5-91.9-205.3-205.3-205.3-14.9 0-29.7 1.7-43.8 4.7C161.3 40.7 137.7 32 112 32 50.2 32 0 82.2 0 144c0 25.7 8.7 49.3 23.3 68.2-2.9 14-4.7 28.9-4.7 43.8 0 113.5 91.9 205.3 205.3 205.3 14.9 0 29.7-1.7 43.8-4.7 19 14.6 42.6 23.3 68.2 23.3 61.8 0 112-50.2 112-112 .1-25.6-8.6-49.2-23.2-68.1zm-194.6 91.5c-65.6 0-120.5-29.2-120.5-65 0-16 9-30.6 29.5-30.6 31.2 0 34.1 44.9 88.1 44.9 25.7 0 42.3-11.4 42.3-26.3 0-18.7-16-21.6-42-28-62.5-15.4-117.8-22-117.8-87.2 0-59.2 58.6-81.1 109.1-81.1 55.1 0 110.8 21.9 110.8 55.4 0 16.9-11.4 31.8-30.3 31.8-28.3 0-29.2-33.5-75-33.5-25.7 0-42 7-42 22.5 0 19.8 20.8 21.8 69.1 33 41.4 9.3 90.7 26.8 90.7 77.6 0 59.1-57.1 86.5-112 86.5z"/></svg>    
                    : <?= $re_order->skype_id; ?></li>
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M524.5 69.8a1.5 1.5 0 0 0 -.8-.7A485.1 485.1 0 0 0 404.1 32a1.8 1.8 0 0 0 -1.9 .9 337.5 337.5 0 0 0 -14.9 30.6 447.8 447.8 0 0 0 -134.4 0 309.5 309.5 0 0 0 -15.1-30.6 1.9 1.9 0 0 0 -1.9-.9A483.7 483.7 0 0 0 116.1 69.1a1.7 1.7 0 0 0 -.8 .7C39.1 183.7 18.2 294.7 28.4 404.4a2 2 0 0 0 .8 1.4A487.7 487.7 0 0 0 176 479.9a1.9 1.9 0 0 0 2.1-.7A348.2 348.2 0 0 0 208.1 430.4a1.9 1.9 0 0 0 -1-2.6 321.2 321.2 0 0 1 -45.9-21.9 1.9 1.9 0 0 1 -.2-3.1c3.1-2.3 6.2-4.7 9.1-7.1a1.8 1.8 0 0 1 1.9-.3c96.2 43.9 200.4 43.9 295.5 0a1.8 1.8 0 0 1 1.9 .2c2.9 2.4 6 4.9 9.1 7.2a1.9 1.9 0 0 1 -.2 3.1 301.4 301.4 0 0 1 -45.9 21.8 1.9 1.9 0 0 0 -1 2.6 391.1 391.1 0 0 0 30 48.8 1.9 1.9 0 0 0 2.1 .7A486 486 0 0 0 610.7 405.7a1.9 1.9 0 0 0 .8-1.4C623.7 277.6 590.9 167.5 524.5 69.8zM222.5 337.6c-29 0-52.8-26.6-52.8-59.2S193.1 219.1 222.5 219.1c29.7 0 53.3 26.8 52.8 59.2C275.3 311 251.9 337.6 222.5 337.6zm195.4 0c-29 0-52.8-26.6-52.8-59.2S388.4 219.1 417.9 219.1c29.7 0 53.3 26.8 52.8 59.2C470.7 311 447.5 337.6 417.9 337.6z"/></svg>
                    : <?= $re_order->discord_username; ?>
                    </li>
                    <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                    : <?= $re_order->available_time; ?>
                    </li>
                    <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    : <?= $re_order->account_data; ?>
                    </li>
                </ul>
                <div class="card-body">
                    <a class="btn btn-success btn-sm" href="complete_coaching_order.php?id=<?=$order_id; ?>" role="button">Mark Complete</a>
                    <a class="btn btn-danger btn-sm" href="remove_coaching_order.php?id=<?=$order_id; ?>" role="button">Remove</a>
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