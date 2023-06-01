<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
       <h1> Change Password</h1>
       <br><br>

       <?php
         if(isset($_GET['id']))
         {
            $id = $_GET['id'];
         }
       ?>

       <form action="" method="POST">

       <table class="tbl_30">
        <tr>
            <td>Current password: </td>
            <td>
                <input type="password" name="current_password" placeholder="Enter current password">
            </td>
        </tr>

        <tr>
            <td>New password: </td>
            <td>
                <input type="password" name="new_password" placeholder="Enter New password">
            </td>
        </tr>

        <tr>
            <td>Confirm password: </td>
            <td>
                <input type="password" name="confirm_password" placeholder="Confirm password">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-secondary">
            </td>
        </tr>

       </table>

       </form>
    </div>

</div>

<?php
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "clicked";

        //1. Get the data from form
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $current_password = mysqli_real_escape_string($conn, md5($_POST['current_password']));
        $new_password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
        $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));

        //2. check whether the user with current ID and current Password Exists or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        //Execute Query
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //check whether data is available or not
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //user exists and password can be changed
                //echo "User Found";
                //check whether new and current password match or not
                if($new_password==$confirm_password)
                {
                    //update password
                   // echo "password match";

                   $sql2 = "UPDATE tbl_admin SET
                   password = '$new_password'
                   WHERE id=$id

                   ";

                   //Execute Query
                   $res2 = mysqli_query($conn, $sql2);

                   //chech whether the query executeed or not
                   if($res2==true)
                   {
                    //Display Success message 
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');

                   }
                   else
                   {
                    //Display error message
                    $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');

                   }

                }
                else
                {
                    //Redirect to manage Admin page with error message 
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password Did Not Match.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }
            else
            {
                //user does not exist set message and redirect
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        //3. 

        //4. Change password if all the above is true
    }
?>

<?php include('partials/footer.php');?>