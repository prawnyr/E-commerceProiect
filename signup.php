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
    <meta>
     <style>
</style>
<link rel="stylesheet" type="text/css" href="css/sign.css"> 
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
    <a href="orders.php" >Orders</a><a href="logout.php" >Logout</a><a  >
      <a  href="cart.php"><span class="fas fa-shopping-cart"></span></a></a>

    <?php
  }
  ?>

  
  

</div>
    <br><br><br><br>

<br><br>
  <h1>Create Account</h1>
 <br><br>
  <form  class="contact-form" action="" method="post" style="background-color: #ffffffb8;padding: 28px 40px;">
    <input type="text" class="contact-form-text" name="fname" required placeholder="First Name">
    <input type="text" class="contact-form-text" name="lname" required placeholder="Last Name">


    <input type="text" class="contact-form-text" name="username" required placeholder="Email">
    <input type="password" class="contact-form-text" name="password" required placeholder="Password">
    <input type="text" class="contact-form-text" name="mobile" required placeholder="Mobile No">


    <input type="text" class="contact-form-text" name="address1" required placeholder="Address 1">
    <input type="text" class="contact-form-text" name="address2" required placeholder="Address 2">



    <input type="submit" name="signup" class="contact-form-btn" value="Create Account">
    <a href="login.php">I have an Account</a>
  </form>
</div>


  
  </body>
</html>
