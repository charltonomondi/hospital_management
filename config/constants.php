<?php
  //start session
  session_start();

//Create constants to store Non Repeating values
define('SITEURL', 'http://localhost/hospital_management/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','hospital_management');

//3. Execute Query and save Data in Database
$conn = mysqli_connect(LOCALHOST,DB_USERNAME, DB_PASSWORD ) or die(mysqli_error($mysqli));//Database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($mysqli));//Selecting Database


?>