<?php 
include 'config.php';
	
function All_products(){
	 $db = new Database();
	 $catsRes = $db->result("SELECT * FROM `categories`");
	 while( $cat = mysqli_fetch_assoc($catsRes)) {
	 	$catId = $cat['cat_id'];
	 	$search = '';
	 	if(isset($_GET['search'])){
	 		$search = " AND product_title LIKE '%{$_GET['search']}%' ";
	 	}

      $items =  $db->result("SELECT * FROM products WHERE product_cat = '$catId' $search");
      
	  while( $item = mysqli_fetch_assoc($items)) {
	  	?>
	  		<div class="img">
			  <center>
			  	  <img src="products/<?php echo $item['product_image']; ?>">
			  </center>
			    <div class="img-desc">
			        <h4><b>Name:</b> <?php echo $item['product_title']; ?></h4>
			        <p><b>Price:</b> USD <?php echo $item['product_price']; ?></p>
			        <p><b>Available:</b> <?php echo $item['product_qty']; ?></p>
			        <?php 	
			        	 if(isset($_SESSION['Coffee-lious'])){
			         ?>
			        <form method="post">
			        	
							<input type="hidden" name="name" value="<?php echo $item['product_title']; ?>">
							<input type="hidden" name="image" value="<?php echo $item['product_image']; ?>">
							<input type="hidden" name="available" value="<?php echo $item['product_qty']; ?>">


							<input type="hidden" name="price" value="<?php echo $item['product_price']; ?>">
							Qty: <input type="number" name="qty" value="1" max="<?php echo $item['product_qty']; ?>" style="width: 40px;padding: 8px;">
		  					<button value="<?php echo $item['product_id']; ?>" type="submit" name="addCart">Add to Cart</button>

		  					
		  					
			        	
			        </form>
			    <?php 	} ?>
			    </div>
			</div>
	  	<?php

	  }
	}
}

function All_products_seller(){
	  $db = new Database();
	  
      $items =  $db->result("SELECT * FROM products");
      
	  while( $item = mysqli_fetch_assoc($items)) {
	  	?>
	  		<div class="img">
			    <center>
			  	  <img height="180" width="40%" src="products/<?php echo $item['product_image']; ?>">
			  </center>
			    <div class="img-desc">
			        <h4><b>Name:</b> <?php echo $item['product_title']; ?></h4>
			        <p><b>Price:</b> USD <?php echo $item['product_price']; ?></p>
			        <button   ><a href="edit-product.php?id=<?php echo $item['product_id']; ?>">Edit Product</a></button>
			    </div>
			</div>
	  	<?php

	  }
}

if(isset($_POST['additem'])){
	$name = $_POST['name'];
	$price = $_POST['price'];


	$filename = $_FILES["image"]["name"];
	$tempname = $_FILES["image"]["tmp_name"];    
	$folder = "products/".$filename;
	move_uploaded_file($tempname, $folder);

	 $db = new Database();
	  
      $items =  $db->result("INSERT INTO  product(product_image ,product_title ,product_price ,product_qty) VALUES ('$filename' ,'$name' ,'$price' ,50)");

	
	  ?>
	  <script type="text/javascript">
	  	alert("Product Submited!");
	  </script>
	  <?php
	  header('Location:add-product.php');
}

if(isset($_POST['updateitem'])){
	$name = $_POST['name'];
	$content = $_POST['content'];
	$price = $_POST['price'];
	$available = $_POST['available'];
	$oldpath = $_POST['oldpath'];

	$filename = $_FILES["image"]["name"];
	$tempname = $_FILES["image"]["tmp_name"];    
	$folder = "products/".$filename;

	$id = $_POST['updateitem'];

	$db = new Database();
	
	if($filename!=''){
		move_uploaded_file($tempname, $folder);
	  
      		$db->result("UPDATE  products SET product_image = '$filename' ,product_title = '$name' ,product_price = '$price' ,product_qty = '$available' WHERE product_id = '$id'");

	}else{
		$db->result("UPDATE  products SET product_title = '$name' , product_price = '$price' ,product_qty = '$available' WHERE product_id = '$id'");
	}

	  $_SESSION['success']= "Item Updated!";
	  header('Location:edit-product.php?id='.$_POST['updateitem'].' ');
}





	if(isset($_POST['signup'])){
	   	$db = new Database();
	   	$enc = md5($_POST['password']);
		$db->result("INSERT INTO `store`.`user_info` (`first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES ( '{$_POST['fname']}', '{$_POST['lname']}', '{$_POST['username']}', '$enc', '{$_POST['mobile']}', '{$_POST['address1']}', '{$_POST['address2']}')");
	  

	   $_SESSION['success'] = "Account Created";

	   header("Location: login.php");
	}

   if(isset($_POST['login'])){
	  	  $db = new Database();
		$username = $_POST['username'];
		$password = $_POST['password'];
	   	$enc = md5($password);

		$user = '';
		$userres = $db->result("SELECT * FROM `user_info` where email = '$username' AND password = '$enc'");
	  	$user = mysqli_fetch_assoc($userres);
		if($username=='admin' && $password =='admin'){
			 $_SESSION['Coffee-liousseller'] = "yes";
	  		 header('Location:index.php');
		}
		else if(mysqli_num_rows($userres)==0){
			   $_SESSION['alert'] = "User Not Found";
		}

		else{
	  		 $_SESSION['Coffee-lious'] = "yes";
	  		 $_SESSION['username'] =  $user['email'];
	  		 $_SESSION['name'] =  $user['name'];
	  		 $_SESSION['logId'] =   $user['user_id'];
	  		 $_SESSION['alert'] = "";
	  		 header('Location:index.php');
		}
	}

	 if(isset($_POST['loginAdmin'])){
	  	  $db = new Database();
		$username = $_POST['username'];
		$password = $_POST['password'];
	   	$enc = md5($password);

		$user = '';
		$userres = $db->result("SELECT * FROM `admin` where email = '$username' AND password = '$enc' AND is_active = '1'");
	  	$user = mysqli_fetch_assoc($userres);
		 if(mysqli_num_rows($userres)==0){
			   $_SESSION['alert'] = "User Not Found";
		}

		else{
	  		 $_SESSION['Coffee-liousseller'] = "yes";
	  		 $_SESSION['username'] =  $user['email'];
	  		 $_SESSION['name'] =  $user['name'];
	  		 $_SESSION['logId'] =   $user['id'];
	  		 $_SESSION['alert'] = "";
	  		 header('Location:index.php');
		}
	}


 	







if(isset($_POST['addCart'])){
		  	  $db = new Database();
		  	  $sql = "INSERT INTO `store`.`cart` (`p_id`, `ip_add`, `user_id`, `qty`) VALUES (  '{$_POST['addCart']}', '{$_SERVER['REMOTE_ADDR']}', '{$_SESSION['logId']}', '{$_POST['qty']}')";
		  	  $db->result($sql);


		  	  
	  header('Location:product.php');

}



function mycartItems(){
	$db = new Database();

    $items = $db->result("SELECT * FROM cart WHERE user_id = '{$_SESSION['logId']}'");
    $tot = 0;
    while( $item = mysqli_fetch_assoc($items)) {
      $prodId = 	$item['p_id'];
      $prods =  $db->result("SELECT * FROM products WHERE product_id = '$prodId'");
      $prod =  mysqli_fetch_assoc($prods);
    	?>
    	 <tr>
           
            <td width="55%">
                <div class="img-desc">
                    <h4><b>Name:</b><?php echo $prod['product_title']; ?></h4>
                    <p><b>Price:</b> USD <?php echo $prod['product_price']; ?></p>
                </div>
                Qty :
                <input type="number" readonly value="<?php echo $item['qty']; ?>" min="1" max="10" name="">
            </td>
            <td width="20%">
                <b><?php echo $prod['product_price']*$item['qty']; ?>USD</b>
                <td><a style="text-decoration: none;color: red" href="?removeCartItem=<?php echo $item['id']; ?>">Delete</a></td>
            </td>
        </tr>

    	
    	<?php
    	$tot+=( $prod['product_price']*$item['qty']);
    }
    ?>
      <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr style="border-top: solid 2px #333;">
                        <td colspan="2"><b>Total</b></td>
                        <td><b><?php echo $tot; ?>USD</b></td>
                    </tr>
    <?php

}

if(isset($_GET['removeCartItem'])){
		$db = new Database();

    $items = $db->result("DELETE FROM cart WHERE id = '{$_GET['removeCartItem']}'");

	header('Location:cart.php');
}




if(isset($_POST['placeOrder'])){
	$db = new Database();
	$trx_id = strtoupper(substr(md5(rand()), 0,20));

	$items = $db->result("SELECT * FROM cart WHERE user_id = '{$_SESSION['logId']}'");

	 while($row = mysqli_fetch_assoc($items)){

    	$sql = "INSERT INTO `orders` (`user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES ('{$_SESSION['logId']}', '{$row['p_id']}', '{$row['qty']}', '$trx_id', 'Initialized')";
    	$db->result($sql);
	 }


   

	$db->result("DELETE FROM cart WHERE user_id = '{$_SESSION['logId']}'");
   

    
    ?>
    <script type="text/javascript">
    	alert('Thank you for Order!');
    	window.location.href = 'product.php';
    </script>
    <?php
}

if(isset($_GET['removeOrder'])){
   	$db = new Database();
   	$db->result("DELETE FROM  `order_summary` WHERE id = '{$_GET['removeOrder']}'");
   	$items = $db->result("SELECT * FROM  `orderitem` WHERE orderId = '{$_GET['removeOrder']}'");

   	foreach($items as $item){
   		$res11= $db->result("SELECT available FROM product WHERE id = '{$item['id']}'");
   		 $row11= mysqli_fetch_assoc($res11);
   		 $oldqty = $row11['available'];
    	 $new_qty = $oldqty+$item['qty'];
		 $db->result("UPDATE product SET available = '$new_qty' WHERE id = '{$item['id']}'");
   	}
    $db->result("DELETE FROM  `orderitem` WHERE orderId = '{$_GET['removeOrder']}'");


	header('Location:orders.php');
}
if(isset($_POST['updateStatus'])){
	$db = new Database();
	
	$db->result("UPDATE orders SET p_status = '{$_POST['status']}'  WHERE order_id = '{$_POST['updateStatus']}'");

}

function allOrders(){
	$db = new Database();

    $orders = $db->result("SELECT * FROM  `orders`  ORDER BY trx_id");
    $tot = 0;
     	?>
     
     	<table style="border-collapse:collapse; width:100%" border="1">
     		<tr>
     			<th></th>
     			<td>Item</td>
     			<td>Unit Price</td>
     			<td>Qty</td>
     			<td>TRX</td>

     			<td>Address</td>

     			<td>Amount $</td>
     			<td>Status</td>


     		</tr>
     	<?php 
     while(   $order = mysqli_fetch_assoc($orders)) {
     	$items = $db->result("SELECT * FROM products WHERE product_id = '{$order['product_id']}'");
     	$item = mysqli_fetch_assoc($items);


     	$users = $db->result("SELECT * FROM user_info WHERE user_id = '{$order['user_id']}'");
     	$user = mysqli_fetch_assoc($users);
     	 ?>
     		<tr>
	    		<td  ><img src="products/<?php echo $item['product_image']; ?>" height='80'></td>

	    		<td><?php echo $item['product_title']; ?> <br>
	    		
	    		</td>
	    		<td><?php echo $item['product_price']; ?> </td>
	    		<td><?php echo $order['qty']; ?></td>


	    		<td><?php echo $order['trx_id']; ?></td>

	    		<td> <b>Address:</b> <br>
	    			<?php 
	    				echo $user['first_name'].' '.$user['last_name'].'<br>';
	    				echo $user['address1'].'<br> '.$user['address2'];

	    		   ?>
	    		</td>

	    		<td><?php echo $item['product_price']*$order['qty']; $tot += $item['product_price']*$order['qty']; ?></td>

	    		<td>
	    			Status : <br>
	    			<form method="post" action="">
	    				<select name="status">
	    					<option <?php if($order['p_status']=='Initialized'){echo 'selected'; } ?> >Initialized</option>
	    					<option <?php if($order['p_status']=='Successful'){echo 'selected'; } ?> >Successful</option>
	    					<option <?php if($order['p_status']=='Canceled'){echo 'selected'; } ?> >Canceled</option>
	    					<option <?php if($order['p_status']=='Returned'){echo 'selected'; } ?> >Returned</option>



	    				</select>
	    				<button class="button" type="submit" name="updateStatus" value="<?php echo $order['order_id']; ?>">Update</button>
	    			</form>
	    		</td>
	    	</tr>
     	
     <tr>
     <?php } ?>
     	<th colspan="5" style="text-align:right;">USD</th>
     	<th><?php echo $tot; ?></th>
     
     </tr>
     </table>

     <hr>
    <?php

     

}

function myOrders(){
	$db = new Database();

    $orders = $db->result("SELECT * FROM  `orders` WHERE user_id = '{$_SESSION['logId']}' ORDER BY trx_id");
    $tot = 0;
     	?>
     
     	<table style="border-collapse:collapse; width:100%" border="1">
     		<tr>
     			<th></th>
     			<td>Item</td>
     			<td>Unit Price</td>
     			<td>Qty</td>
     			
     			<td>Amount $</td>


     		</tr>
     	<?php 
     while(   $order = mysqli_fetch_assoc($orders)) {
     	$items = $db->result("SELECT * FROM products WHERE product_id = '{$order['product_id']}'");
     	$item = mysqli_fetch_assoc($items);
     	 ?>
     		<tr>
	    		<td  ><img src="products/<?php echo $item['product_image']; ?>" height='80'></td>

	    		<td><?php echo $item['product_title']; ?> <br>
	    		<small> [<i>	<?php 	echo $order['p_status'];; ?></i>]</small>
	    		</td>
	    		<td><?php echo $item['product_price']; ?> </td>
	    		<td><?php echo $order['qty']; ?></td>
	    		
	    		<td><?php echo $item['product_price']*$order['qty']; $tot += $item['product_price']*$order['qty']; ?></td>


	    	</tr>
     	
     <tr>
     <?php } ?>
     	<th colspan="4" style="text-align:right;">USD</th>
     	<th><?php echo $tot; ?></th>
     
     </tr>
     </table>

     <hr>
    <?php


}


?>	

