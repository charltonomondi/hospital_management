<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
         <h1>Update Patient</h1>

         <br><br>

         <?php
         if(isset($_GET))
         {
            //1. Get the ID of the selected Admin
             $id = $_GET['id'];
         
            //2. Create SQL Query to get the details
            $sql = "SELECT * FROM tbl_patients WHERE id=$id";

            //3. Execute the Query
            $res = mysqli_query($conn, $sql);

            //4. check whether the query is executed or not
            if($res==true)
            {
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if($count==1)
                {
                    //get the details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $contact = $row['contact'];
                    $status = $row['status'];
                    $total = $row['total'];
                }
                else
                {
                    //redirect to Manage Admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            }
         ?>

         <form action="" method="POST">
         <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $full_name;?>">
                </td>
            </tr>

            <tr>
                <td>Contact: </td>
                <td>
                    <input type="text" name="contact" value="<?php echo $contact;?>">
                </td>
            </tr>

            <tr>
                <td>Status: </td>
                <td>
                    <input type="text" name="status" value="<?php echo $status;?>">
                </td>
            </tr>

            <tr>
                <td>Total Amount: </td>
                <td>
                    <input type="text" name="total" value="<?php echo $total;?>">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Patient" class="btn-secondary">
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
    //echo "Button clicked";
    //get all the values from form to update

         $id = mysqli_real_escape_string($conn, $_POST['id']);
         $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
         $contact = mysqli_real_escape_string($conn, $_POST['contact']);
         $status = mysqli_real_escape_string($conn, $_POST['status']);
         $total = mysqli_real_escape_string($conn, $_POST['total']);

         //create a SQL query to update Admin
         $sql  = "UPDATE tbl_admin SET
         full_name = '$full_name',
         contact = '$contact',
         status = '$status',
         total = '$total'
         WHERE id = '$id'
         ";

         //Execute the Query
         $res = mysqli_query($conn, $sql);

         //check whether the query executed successfully or not
         if($res==true)
         {
            //Query executed and Admin updated
            $_SESSION['update'] = "<div class='success'>Patient Updated Successfully.</div>";
            //Redirect to manage Admin page
            header('location:'.SITEURL.'admin/manage-patients.php');
         }
         else
         {
            //Failed to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Update Patient.</div>";
            //Redirect to manage Admin page
            header('location:'.SITEURL.'admin/manage-patients.php');

         }
  }
 
?>

<?php include('partials/footer.php');?>