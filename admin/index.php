<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management system</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    
<section class="navbar">
    <div class="container">
        <div class="logo">
            <a href="" title="Logo">
              <img src="images/gretsa.jpg" alt="Hospital Logo" class="img-responsive">
              </a>
        </div>
        <div class="menu text-right">
            <ul>
                <li>
                    <a href="">Home</a>
                </li>
                
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                
                <li>
                    <a href="">Contact</a>
                </li>

                

            </ul>

        </div>
        <div class="clearfix">

        </div>

    </div>

</section>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>

<section class="food-search text-center">
        <div class="container">
            
            <form action="" method="POST">
                <input type="search" name="search" placeholder="Search for Service" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
<!-----navbar section ends--->

<!-------category section begins-------->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Services</h2>


        <div class="box-3 float-container">
            <img src="../images/bg3.jpg" alt="Ward Services" class="img-responsive img-curve">
            <h3 class="float-text text-white"></h3>
        </div>

        <div class="box-3 float-container">
            <img src="../images/bg1.jpg" alt="Ward Services" class="img-responsive img-curve">
            <h3 class="float-text text-white"></h3>
        </div>

        <div class="box-3 float-container">
            <img src="../images/bg4.jpg" alt="Ward Services" class="img-responsive img-curve">
            <h3 class="float-text text-white"></h3>
        </div>
    </div>
    <br><br><br>

    <section class="categories">
    <div class="container">
        <h2 class="text-center">Register Patients</h2>



        <!-----------REGISTRATION FORM BEGINS-------------------->

        <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Register Here</legend>

                    <div class="food-menu-img">
                        
                               <img src="" alt="" class="img-responsive img-curve">
                            
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><i>Malaria ++</i></h3>

                         <input type="hidden" name="food" value="">
                         <input type="hidden" name="price" value="">

                        <p class="food-price">Ksh.</p>
                        <div class="order-label">Feeling</div>
                        <textarea name="address" rows="8" placeholder="E.g. Fever, headache" class="input-responsive" required></textarea>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Patient's Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Charlton Omondi" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 2547xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. charltonomondi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="5" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Register" class="btn btn-primary">
                </fieldset>

            </form>

        <!------------REGISTRATION FORM ENDS------------------->

    

</section>

<!-- social Section Starts Here -->
<section class="social">
        <div class="container text-center">
            <ul>

                <li>
                    <a href="https://m.me/charlton omondi"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="https://ig.me/m/Torillio"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="https://twitter.com/messages/compose?recipient_id=46411581"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Hospital Management System </p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>