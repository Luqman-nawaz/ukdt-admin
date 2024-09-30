<?php
define('DB_SERVER_NEW', 'localhost');
define('DB_USERNAME_NEW', 'root');
define('DB_PASSWORD_NEW', '');
define('DB_NAME_NEW', 'ukdt');
 
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER_NEW, DB_USERNAME_NEW, DB_PASSWORD_NEW, DB_NAME_NEW);
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>