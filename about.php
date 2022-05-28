<?php 
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About Us</title>       
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        

        <link rel="stylesheet" type="text/css" href="css/about.css">
    </head>
    <body>
  <div id="cartLoad" style="position: absolute;z-index: 8;top:80px"></div>
        <p class="navbar-brand" href="#">Coffee-lious</p>
         <div class="navigation" id="mynavigation"> <?php if(!isset($_SESSION['Coffee-liousseller'])){ ?>
  <a href="index.php" >Home</a>
  <a href="product.php" >Products</a>
  <a href="contact.php">Contact Us</a>
  <a href="about.php"  class="active" >About Us</a> <?php  if(!isset($_SESSION['Coffee-lious'])){ 
    ?>
    <a href="login.php">Account</a>
    <?php } ?>
  <?php 
   } if(isset($_SESSION['Coffee-liousseller'])){
    ?>
    <a href="all-products.php" >All Products</a><a href="orders.php" >All Orders</a><a href="logout.php" >Logout</a>
    <?php
  }
  if(isset($_SESSION['Coffee-lious'])){
    ?>
    <a href="orders.php" >Orders</a><a href="logout.php" >Logout</a><a  ><a  href="cart.php"><span class="fas fa-shopping-cart"></span></a></a>

    <?php
  }
  ?>
  
  

 
</div>
        <section>
            <div class = "image">
                
            </div>

            <div class = "content">
                <h2>About Us</h2>
                <p>Coffee-lious is a Home grown tech enabled coffee start-up. Launched in 2019, we are passionate
                coffee lover who are on a mission to make best quality coffee accessible to anyone.
                Coffee is more than a drink which it is something that magical in the way that can brighten our
                morning mood. In such, every cup of coffee served is made with dedicated efforts from handpicking
                of finest coffee beans, roasting process and brewing coffee</p>
                
                <p></p>

                <a href="product.php" class="button">Let's Shop</a>

              
            </div>
        </section>
        
    
  </body>
</html>