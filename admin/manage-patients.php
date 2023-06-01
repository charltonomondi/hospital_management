<?php include('partials/menu.php');?>

<div class="main-content">
        <div class="wrapper">
        <h1>Manage Patients</h1>

        <br /><br />

        <?php
          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }

          
          if(isset($_SESSION['add']))//checking whether the session is set or not
          {
            echo $_SESSION['add'];//Display session Message
            unset($_SESSION['add']);//Remove session Message
          }

          if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }
           

          
        ?>

        <br><br><br>
        <!---Button to add patient-->
        <a href="add-patient.php" class="btn-primary">Add Patient</a>

        <br /><br /><br />
       
             <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <!-- <th>Diagnosis</th> -->
                    <th>Patient's Name</th>
                    <th>Contact</th>
                    <!-- <th>Email</th>
                    <th>Address</th> -->
                    <th>Actions</th>
                </tr>
                <?php 
                  //get all the orders from database
                  $sql = "SELECT * FROM tbl_patients ORDER BY id DESC";//Display latest order first

                  //execute query
                  $res = mysqli_query($conn, $sql);

                  //count the rows
                  $count = mysqli_num_rows($res);

                  $sn = 1;//create a serial number and set its initial value as 1

                  if($count>0)
                  {
                    //order available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get all the orders
                        $id = $row['id'];
                        $patient_name = $row['patient_name'];
                        // $diagnosis = $row['diagnosis'];
                        $date = $row['date'];
                        $total = $row['total'];
                        $status = $row['status'];
                        $patient_contact = $row['patient_contact'];
                        // $customer_email = $row['customer_email'];
                        // $customer_address = $row['customer_address'];

                        ?>
                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <!-- <td><?php echo $diagnosis; ?></td> -->
                                <td><?php echo $date; ?></td>
                                <td><?php echo $total; ?></td>
                                 <td><?php echo $status; ?></td>
                                <td><?php echo $patient_name; ?></td>
                                <td><?php echo $patient_contact; ?></td>
                                <!-- <td><?php echo $patient_email; ?></td>
                                <td><?php echo $patient_address; ?></td> -->

                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-patient.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-patient.php?id=<?php echo $id; ?>" class="btn-primary">Delete</a>
                                    
                                </td>
                            </tr>
                        <?php
                    }
                  }
                  else
                  {
                    //order not available
                    echo "<tr><td colspan='12' class='error'>Patients not Available.</td></tr>";
                  }
                ?>
                

             </table>
       
            </div>
        </div>

<?php include('partials/footer.php'); ?>