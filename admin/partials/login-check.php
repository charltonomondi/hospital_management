<?php 
//Authorization - Access control
//check whether the user is logged in or not
if(!isset($_SESSION['user']))//if user session is not set
{
    //user is not logged in 
   $_SESSION['no-login-message'] = "<div class='error text-center'>Please Login to Access Admin Panel.</div>";
    //Redirect to login page with message 
   header('location:'.SITEURL.'admin/login.php');
}
?>
