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
    <link rel="stylesheet" type="text/css" href="css/editprod.css">
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
    <h1 id="our">Edit Product</h1>

    <div id="searchbar" style="float:right;">
       <button  style="background-color: #ffffffb8;"><a href="all-products.php">All Product</a></button>
    </div>
    <br><br>
    <hr>

    <div id="info">
       <?php 
       $db = new Database();
      
      $items =  $db->result("SELECT * FROM products WHERE product_id = '{$_GET['id']}'");

      $item = mysqli_fetch_assoc($items);
         ?>
        
        <div class="form-div">
                <form method="post" action="" enctype="multipart/form-data">
                    <center style='color:black'><?php if(isset( $_SESSION['success'])){echo  $_SESSION['success']; $_SESSION['success']='';} ?></center>
                    <table class="table" style="width:40%;margin-left: 30%;height: 280px;" >
                        <tr>
                            <td colspan="2">
                                <center>
                                <img src="products/<?php echo $item['product_image']; ?>" height='160'>
                                <input type="hidden" name="oldpath" value="<?php echo $item['product_image']; ?>">
                                    
                                </center>
                        </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <center>
                                    <p style="font-size: 26px;margin: 8px 0;">Product Details</p>
                                </center>
                            </th>
                        </tr>
                        <tr>
                            <td><label>Product Name</label></td>
                            <td><input value="<?php echo $item['product_title']; ?>" required type="text" name="name" id="name"></td>
                        </tr>
                       
                        <tr>
                            <td><label>Price</label></td>
                            <td><input value="<?php echo $item['product_price']; ?>" style="width:155px" required type="text" name="price" id="price" placeholder=""></td>
                        </tr>
                         <tr>
                            <td><label>Available</label></td>
                            <td><input value="<?php echo $item['product_qty']; ?>" style="width:155px" required type="text" name="available" id="available" placeholder=""></td>
                        </tr>
                        <tr>
                            
                            <td><label>Image</label></td>
                            <td><input  type="file" name="image" id="image"></td>
                        </tr>
                        
                        
                        <tr>
                            <td></td>
                            <td><button style="background-color:#333" class="btn btn-sub" name="updateitem" value="<?php echo $_GET['id']; ?>" type="submit" >Update Product</button>
                        </tr>
                    </table>
                </form>
            <span class="err"></span>
        </div>
      


    </div>
    

  </body>
</html>