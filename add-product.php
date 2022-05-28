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
    <link rel="stylesheet" type="text/css" href="css/addprod.css">

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
    <h1 id="our">Add Product</h1>

    <div id="searchbar" style="float:right;">
       <button  style="background-color: #ffffffb8;"><a href="all-products.php">All Product</a></button>
    </div>
    <br><br>
    <hr>

    <div id="info">
        <div class="form-div">
                <form method="post" action="" enctype="multipart/form-data">
                    <center style='color:white'><?php if(isset( $_SESSION['success'])){echo  $_SESSION['success']; $_SESSION['success']='';} ?></center>
                    <table class="table" style="width:60%;margin-left: 20%;height: 280px;padding: 20px;" >
                        
                        <tr>
                            <td><label>Product</label></td>
                            <td><input required type="text" name="name" id="name"></td>
                        </tr>
                       
                        <tr>
                            <td><label>Price</label></td>
                            <td><input style="width:120px" required type="text" name="price" id="price" placeholder=""></td>
                        </tr>
                        <tr>
                            <td><label>Product Image</label></td>
                            <td><input  required type="file" name="image" id="image"></td>
                        </tr>
                        
                        
                        <tr>
                            <td></td>
                            <td><button style="background-color:#333" class="btn btn-sub" name="additem" type="submit" >Submit</button>
                        </tr>
                    </table>
                </form>
            <span class="err"></span>
        </div>



    </div>
    

  </body>
</html>