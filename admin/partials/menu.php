<?php
 include('../config/constants.php');
 include('login-check.php');

?>


<html>
    <head>
        <title>Hospital Management System - Home page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!------menu section starts-------->
        <div class="menu text-center">
            <div class="wrapper">
               <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin </a></li>
                <li><a href="manage-patients.php">Patients</a></li>
                <li><a href="logout.php">Logout</a></li>

                <!-- <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">order</a></li> -->
                
               </ul> 
            </div>
        </div>
        <!------menu section ends-------->