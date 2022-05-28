<?php 
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta >
        <title>About Us</title>
       
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/orders.css">
    </head>
    <body>
  <div id="cartLoad" style="position: absolute;z-index: 8;top:80px"></div>
        <p class="navbar-brand" href="#">Coffee-lious</p>
         <div class="navigation" id="mynavigation"> <?php if(!isset($_SESSION['Coffee-liousseller'])){ ?>
  <a href="index.php" >Home</a>
  <a href="product.php" >Products</a>
  <a href="contact.php">Contact Us</a>
  <a href="about.php"   >About Us</a>
  <?php 
   } if(isset($_SESSION['Coffee-liousseller'])){
    ?>
    <a href="all-products.php" >All Products</a><a href="orders.php" >All Orders</a><a href="logout.php" >Logout</a>
    <?php
  }
  if(isset($_SESSION['Coffee-lious'])){
    ?>
    <a href="orders.php" class="active">Orders</a><a href="logout.php" >Logout</a><a  ><a  href="cart.php"><span class="fas fa-shopping-cart"></span></a></a>

    <?php
  }
?>
</div>
            <div class = "image cart-items" style="  background-color: #ffffffdd ; padding: 45px;margin: 80px;width: 60%;margin-left: 20%;">
                <h3 style="color: #444;;">All Orders</h3>
                <hr>
                <?php 

                if(isset($_SESSION['Coffee-liousseller'])){
                    allOrders();
                }
                if(isset($_SESSION['Coffee-lious'])){
                    myOrders();
                }


                 ?>

                 

                
            </div>

           
        
    
  </body>
</html>