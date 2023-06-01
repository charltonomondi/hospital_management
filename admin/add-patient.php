<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Patient</h1>

           <br /><br />

           
        <form action=""method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter name">
                </td>
            </tr>

            

            <tr>
                <td>Date: </td>
                <td>
                    <input type="date" name="date" placeholder="<?php echo $date; ?>">
                </td>
            </tr>

            <tr>
                <td>Contact: </td>
                <td>
                    <input type="text" name="contact" placeholder="2547xxxxxx">
                </td>
            </tr>

            <tr>
                <td>Status: </td>
                <td>
                    <input type="text" name="status" placeholder="admitted or one-time-visit">
                </td>
            </tr>

            <tr>
                <td>Total Amount: </td>
                <td>
                    <input type="text" name="total" placeholder="Ksh.">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Patient" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>

    </div>
</div>

<?php include('partials/footer.php');?>

<?php
//process the value from form and save it in Database

//check whether the button is clicked or not

if(isset($_POST['submit']))
{
    //survtech camp
    
   //button clicked
   //echo "Button clicked";

   //1.Get Data from form
   $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
//    $diagnosis = mysqli_real_escape_string($conn, $_POST['diagnosis']);
   $total = mysqli_real_escape_string($conn, $_POST['total']);
   $date = date("Y-m-d h:i:sa");
   $contact = mysqli_real_escape_string($conn, $_POST['contact']);
   $status = mysqli_real_escape_string($conn, $_POST['status']);
   //$password = mysqli_real_escape_string($conn, md5($_POST['password']));//password Encryption with MD5

   //2.SQL Query to save the data into database
   $sql = "INSERT INTO tbl_patients SET 
      
        patient_name = '$full_name',
        total = '$total',
        date = '$date',
        patient_contact = '$contact',
        status = '$status'

   ";

   //3.Executing Query and saving Data into Database
  $res = mysqli_query($conn, $sql) or die(mysqli_error($mysqli));

  //4. Check whether the (Query is Executed )data is inserted or not and display appropriate message
  if($res==TRUE)
  {
    //Data Inserted
    //echo "Data Inserted";
    //create a session variable to Display message
    $_SESSION['add'] = "<div class='success'>Patient Added Successfully.</div>";
    //Redirect page to manage Admin
    header("location:".SITEURL.'admin/manage-patients.php');
  }
  else
  {
    //Failed to insert Data
    //echo "Data not Inserted";
    //create a session variable to Display message
    $_SESSION['add'] = "<div class='error'>Failed to Add Patient.</div>";
    //Redirect page to Add Admin
    header("location:".SITEURL.'admin/add-patient.php');
  }

}

?>
