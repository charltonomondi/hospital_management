<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Hospital Management System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body class="log">
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?>
            <br><br> 

            <!----------Login form starts here----->

             <form action="" method="POST">
            
             <div  class="user-box">
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>

            <div  class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
<input type="submit" name="submit" value="Login" class="login-a">
            <!-- <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span> -->
                
                <!-- <input type="submit" name="submit" value="login"> -->
            <!-- </a> -->
            

            </form> 
             <!----------Login form ends here----->

            

        </div>

    </body>
</html> 

<?php
  //check whether the submit button is clicked or not
  if(isset($_POST['submit']))
  {
    //process for login
    //1. get the data from login form
    //   $username = $_POST['username'];
    //   $password =md5($_POST['password']);

      $username = mysqli_real_escape_string($conn, $_POST['username']);

      $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    //2. sql to check whether username and password exist or not
     $sql = "SELECT * FROM tbl_admin WHERE username= '$username' AND password= '$password'";

    //3. Execute the Query
     $res = mysqli_query($conn, $sql);

    //4. count rows check whether the user exists or not
     $count = mysqli_num_rows($res);

    if($count==1)
    {
        // user available and login success
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username;//To check whether the user is logged in or not and logout will unset it


        //redirect to homepage/dashboard
         header('location:'.SITEURL.'admin/');
     }
    else
     {
        //user not available
         $_SESSION['login'] = "<div class='error text-center'>Username or Password did not Match.</div>";
        //redirect to homepage/dashboard
         header('location:'.SITEURL.'admin/login.php');
     }
    
  }
?>






 