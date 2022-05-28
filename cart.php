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
       <link rel="stylesheet" type="text/css" href="css/cart.css">
    </head>
    <body>
            
              <p class="navbar-brand" href="#">
 
  Coffee-lious</p>
  <div class="navigation" id="mynavigation"> <?php 

  if(!isset($_SESSION['Coffee-liousseller'])){ 
    ?>

  <a href="index.php">Home</a>
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
    <a href="orders.php" >Orders</a><a href="logout.php" >Logout</a><a onclick="showcart()" ><a  href="cart.php"  class="active"><span class="fas fa-shopping-cart"></span></a></a>

    <?php
  }
  ?>
  
  
 
</div>
        <div id='mycart'>
            <div class = "image cart-items" style="  background-color: #ffffffdd ; padding: 45px;margin-left: 25%;
    width: 50%;">
                <h3 style="color: #444;">Cart Items</h3>
                <hr>
                <table class="" style="width:90%">

                    <?php mycartItems(); ?>
                   

                   
                    
                  
                </table>
                <form method="post">
                    
                  <button type="submit" name="placeOrder" class="button">Confirm Order</button>

                </form>
                
            </div>

        </div>
        
    <script type="text/javascript">
      function showcart(){
         const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("cartLoad").innerHTML = this.responseText;
            }
          xhttp.open("GET", "cart.php", true);
          xhttp.send();
      } 
     
    </script>
  </body>
</html>