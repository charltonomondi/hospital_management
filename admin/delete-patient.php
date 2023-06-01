<?php

//Include constants.php
include('../config/constants.php');
//1. Get the ID of the admin to be deleted
$id = $_GET['id'];

//2. Create SQL Query to Delete Admin
$sql = "DELETE FROM tbl_patients WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn, $sql);

//check whether the query executed successfully or not
if($res==true)
{
    //Query Executed Successfully and admin deleted
    //echo "Admin Deleted";
    //create session variable to Display Message
    $_SESSION['delete'] = "<div class='error'>Patient Deleted Successfully.</div>";
    //Redirect to Manage Admin page
    header('location:'.SITEURL.'admin/manage-patients.php');

}
else
{
    //Failed to Delete Admin
    //echo "Failed to Delete Admin";

    $_SESSION['delete'] = "<div class='error'>Failed to Delete Patient. Try Again later.</div>";
    header('location:'.SITEURL.'admin/manage-patients.php');
}


//3.Redirect to manage Admin page with message(success/error)
?>