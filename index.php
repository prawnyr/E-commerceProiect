<?php 
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee-lious</title>
    <link rel="stylesheet" href="main.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .searchbar{
    margin-top: 45px;
  }
  .searchbar input{
    padding: 7px 10px;
    width: 200px;
  }
  .searchbar button{
    padding: 7px 10px;
    border-radius: 5px;
  }
  .slide{
    animation-name: fadeIn;
    animation-duration: 2s;
    animation-delay: 0.3s;
    animation-fill-mode: forwards;
    opacity: 0;
  
 }
   body{
    background: url("bg.jpg");
    background-size: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
  @keyframes fadeIn{
    from { opacity: 0; }
    to {opacity: 1;}
  }
</style>
<script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

</head>
<body>

  <p class="navbar-brand" href="#">
 
  Coffee-lious</p>
  <div class="navigation" id="mynavigation"> <?php 

  if(!isset($_SESSION['Coffee-liousseller'])){ 
    ?>

  <a href="#" class="active">Home</a>
  <a href="product.php">Products</a>
  <a href="contact.php" >Contact Us</a>
  <a href="about.php">About Us</a>
  <?php  if(!isset($_SESSION['Coffee-lious'])){ 
    ?>
    <a href="login.php">Account</a>
    <?php } ?>

  <?php 
   } 
   if(isset($_SESSION['Coffee-liousseller'])){
    ?>
    <a href="all-products.php" >All Products</a><a href="orders.php" >All Orders</a><a href="logout.php" >Logout</a>
    <?php
  }
  if(isset($_SESSION['Coffee-lious'])){
    ?>
    <a href="orders.php" >Orders</a><a href="logout.php" >Logout</a><a onclick="showcart()" ><a  href="cart.php"><span class="fas fa-shopping-cart"></span></a></a>

    <?php
  }
  ?>
  
  
 
</div>
    <br><br><br><br>


    <div class="img-slider">
      <div class="slide active">
        <img src="slideshow/1.jpg" alt="">
        <div class="info">



          
        </div>
      </div>
     
      
    </div>
   
  </body>
</html>