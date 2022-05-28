<?php 
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Products</title>
    <style>

    </style>
    <link rel="stylesheet" type="text/css" href="css/product.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

</head>
<body>
  <div id="cartLoad" style="position: absolute;z-index: 8;top:80px"></div>
    <p class="navbar-brand" href="#">Coffee-lious</p>
    <div class="navigation" id="mynavigation"> <?php if(!isset($_SESSION['Coffee-liousseller'])){ ?>
  <a href="index.php" >Home</a>
  <a href="product.php" class="active">Products</a>
  <a href="contact.php" >Contact Us</a>
  <a href="about.php">About Us</a>
     <?php  if(!isset($_SESSION['Coffee-lious'])){ 
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
    <br><br><br><br>
    <h1 id="our">Our Products</h1>

    <br><br>
    <form action="" method="">
        <input type="text" placeholder="Search Product" name="search"> <button class="">Search</button> <a href="?">Clear Search</a>
    </form>
    <hr>
      
    <div id="info">
        
<?php
    
         All_products();

 ?>


    </div>
    

  </body>
</html>