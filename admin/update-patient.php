<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Patients</h1>
        <br><br>

        <?php 
           //check whether id is set or not
           if(isset($_GET['id']))
           {
            //get the order details
            $id = $_GET['id'];

            //get all other details based on this id
            //sql query to get the order details
             $sql = "SELECT * FROM tbl_patients WHERE id=$id";

             //execute query
             $res  = mysqli_query($conn, $sql);
             //count rows 
             $count = mysqli_num_rows($res);

             if($count==1)
             {
                //details available
                $row = mysqli_fetch_assoc($res);

                $total = $row['total'];
                $status = $row['status'];
                $patient_name = $row['patient_name'];
                $patient_contact = $row['patient_contact'];
                $patient_email = $row['patient_email'];
                $patient_address = $row['patient_address'];

             }
             else
            {
                //details not available
                //redirect to manage order
                header('location:'.SITEURL.'admin/manage-patients.php');
            }


           }
           else
           {
            //redirect the message to order page
            header('location:'.SITEURL.'admin/manage-patients.php');
           }
        ?>

       <form action="" method="POST">
          <table class="tbl-30">
            <tr>
                <td>Patient's Name: </td>
                <td>
                <input type="text" name="full_name" value="<?php echo $patient_name; ?>">
                </td>
            </tr>

            <tr>
                <td>Status: </td>
                <td>
                <input type="text" name="status" value="<?php echo $status; ?>">
                </td>
            </tr>

            
            <tr>
            <td>Total: </td>
                <td>
                <input type="text" name="total" value="<?php echo $total; ?>">
                </td>
            </tr>

           
            <tr>
                <td>Patient Contact: </td>
                <td>
                    <input type="text" name="patient_contact" value="<?php echo $patient_contact; ?>">
                </td>
            </tr>

            <tr>
                <td>Patient Email: </td>
                <td>
                    <input type="text" name="patient_email" value="<?php echo $patient_email; ?>">
                </td>
            </tr>

            <tr>
                <td>Patient Address: </td>
                <td>
                    <textarea name="patient_address" cols="30" rows="5"></textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="price" value="<?php echo $total; ?>">
                    <input type="submit" name="submit" value="Update patients" class="btn-secondary">
                </td>
            </tr>

          </table>
       </form>

       <?php 
         //check whether update button is clicked or not
         if(isset($_POST['submit']))
         {
            //echo "clicked";
            //get all the values from form
                // $id = $_POST['id'];
                
                $total = mysqli_real_escape_string($conn, $_POST['total']);
            
                $status = mysqli_real_escape_string($conn, $_POST['status']);

                $patient_name = mysqli_real_escape_string($conn, $_POST['full_name']);
                $patient_contact = mysqli_real_escape_string($conn, $_POST['patient_contact']);
                $patient_email = mysqli_real_escape_string($conn, $_POST['patient_email']);
                $patient_address = mysqli_real_escape_string($conn, $_POST['patient_address']);

            //update the values and redirect to manage order with message
            $sql2 = "UPDATE tbl_patients SET
                 
                 total = '$total',
                 status = '$status',
                 patient_name = '$patient_name',
                 patient_contact = '$patient_contact',
                 patient_email = '$patient_email',
                 patient_address = '$patient_address'
                 WHERE id = $id

            ";
            //execute the query
            $res2 = mysqli_query($conn, $sql2);

            //check whether updated or not
            //and redirect to manage order with message
            if($res2 == true)
            {
                //updated
                $_SESSION['update'] = "<div class='success'>Patient Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-patients.php');
            }
            else
            {
                //failed to update
                $_SESSION['update'] = "<div class='error'>Failed to Update Patient.</div>";
                header('location:'.SITEURL.'admin/manage-patients.php');
            }
         }
       ?>

    </div>

</div>

<?php include('partials/footer.php');?>