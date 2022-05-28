<?php 
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">

     <style>*{
  margin: 0;
  padding: 0;
}
body,html{
height: 100%;
} 
 .navbar-brand {
	    color: #fff;
        font-size: 20px;
        position: absolute;
        top: 20px;
        left: 50px;
}
.contact-section{
  background: url("bg.jpg");
background-repeat:  no-repeat;
background-position: center ;
height: 100%;
  background-size: cover;
  position: absolute;
    width: 100%;
    background-attachment: fixed;
  /*padding: 40px 0;*/
}
.contact-section h1{
  text-align: center;
  color: #ddd;
}
.border{
  width: 100px;
  height: 10px;
  background: #34495e;
  margin: 40px auto;
}

.contact-form{
  max-width: 600px;
  margin: auto;
  padding: 0 10px;
  overflow: hidden;
      background-color: #ffffff26;
    padding: 20px;

}

.contact-form-text{
      display: block;
    width: 100%;
    box-sizing: border-box;
    margin: 16px 0;
    border: 0;
    background: white;
    padding: 15px 20px;
    outline: none;
    color: #333;
    transition: 0.5s;
}

textarea.contact-form-text{
  resize: none;
  height: 120px;
}
.contact-form-btn{
  background-color :#4e2804;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


.navigation {
  overflow: hidden;
  background-color: transparent;
position:absolute;
top:0px;
right:80px;
}

.navigation a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navigation a:hover {
  background-color: rgb(230, 165, 140);
  color: black;
}

.navigation a.active {
  background-color: #a05234;
  color: white;
}

.navigation .icon {
  display: none;
}


.navbar-brand {
  color: #fff;
  font-size: 30px;
  
  position: absolute;
  top: 20px;
  left: 60px;
}
@media only screen and (max-width: 600px) {
  .navigation a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
      width: 100%;
      background-color: #111d;
  }
  .navigation {
      overflow: hidden;
      background-color: transparent;
      position: absolute;
      top: 0px;
    right: 0px;
    width: 100%;
      z-index: 80;
  }
  body{
            background-size: cover;
    background-repeat: no-repeat;
  }
  .contact-section{
    padding-top: 165px;
  }
}

</style> 
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

 </head>
  <body>
  <div id="cartLoad" style="position: absolute;z-index: 8;top:80px"></div>

<div class="contact-section">
  <p class="navbar-brand" href="#">Coffee-lious</p>
   <div class="navigation" id="mynavigation"> <?php if(!isset($_SESSION['Coffee-liousseller'])){ ?>
  <a href="index.php" >Home</a>
  <a href="product.php" >Products</a>
  <a href="contact.php" class="active" >Contact Us</a>
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

<br><br>
  <h1>Contact Us</h1>
 <br><br>
  <form onsubmit="return false" class="contact-form" action="index.php" method="post">
    <input type="text" class="contact-form-text" placeholder="Your name">
    <input type="email" class="contact-form-text" placeholder="Your email">
    <input type="text" class="contact-form-text" placeholder="Your phone">
    <textarea class="contact-form-text" placeholder="Your message"></textarea>
    <input type="button" onclick="alert('Message Sent!');" class="contact-form-btn" value="Send">
  </form>
</div>


  
  </body>
</html>
