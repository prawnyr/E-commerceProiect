<?php 
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html >
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    
     <style>
</style> 
<link rel="stylesheet" type="text/css" href="css/login.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

 </head>
  <body>
  <div id="cartLoad" style="position: absolute;z-index: 8;top:80px"></div>

<div class="contact-section">
  <p class="navbar-brand" href="#">Coffee-lious</p>
   <div class="navigation" id="mynavigation"> <?php if(!isset($_SESSION['Coffee-liousseller'])){ ?>
  <a href="index.php" >Home</a>
  <a href="product.php" >Products</a>
  <a href="contact.php"  >Contact Us</a>
  <a href="about.php">About Us</a>
    <a class="active" href="login.php">Account</a>
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

<br><br>
  <h1>Login</h1>
 <br><br>
  <form class="contact-form" action="" method="post" style="background-color: #ffffffb8;a;
    padding: 20px;">
    <input type="text" name="username" class="textinputs" placeholder="Username">
    <input type="password" name="password" class="textinputs" placeholder="Password">
    <input type="submit" name="login" class="button-my" value="Login">
    <input type="submit" name="loginAdmin" class="button-my" value="Login as Admin">

    <a href="signup.php">Create an Account</a>
  </form>
</div>

  
  </body>
</html>
