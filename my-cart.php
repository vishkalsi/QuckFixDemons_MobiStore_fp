<?php
 include "databaseconnection.php";
  include "image_url_file.php";
session_start();
include "sessions-file.php";
if(isset($_SESSION[$authToken]))
{
    $userPhone=$_SESSION[$authToken];

  }
  elseif(isset($_SESSION['guest']))
  {
  $userPhone=$_SESSION['guest'];
  }
  else
  {
  $userPhone="1";
  }
  $cartResult=mysqli_query($connection,"select *,(select product_image_url from product_images where product_images.`product_image_product_id`=product.product_id limit 1) as url,(select p_size_mrp_price from product_sizes where p_size_product_id=product.product_id and product_sizes.p_size_master_id = mycart.size) as mrpprice,(select p_size_price from product_sizes where p_size_product_id=product.product_id and product_sizes.p_size_master_id = mycart.size) as price,(select size_name from sizes where sizes.size_id = mycart.size limit 1) as size_name,(select cat_name from category where category.category_id = product.product_category_id limit 1) as category_name from product,mycart where mycart.product_id = product.product_id and mycart.user_id = '$userPhone'");
  $counted=(int)mysqli_num_rows($cartResult);
  include "services/fetch_total_amount.php";
?>
<!DOCTYPE>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="css/slider.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
    <script src="js/script.js"></script>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="jquery.ui.touch-punch.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
     <title>My Cart(<?php echo $counted ?>) - Welcome to MobiStore.com</title>
    <meta name="description" content="Welcome to MobiStore.com" />
    <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
  
	</head>
	
<body>
  <?php include 'header.php'; ?>
	
	
	<div class="gap"></div>
			 <?php
       
         $totalamount=0;
           include "databaseconnection.php";
          
     if($counted>0)
     {
     ?>
<div class="middle">
	<div class="middle-container">
	<div class="cart-container">
	<div class="heading">
		<div class="icon">
		<img src="images/shopping_cart1600.png">
		</div>
		<div class="text">MY CART <span style="font-family: sans-serif; font-weight: 500;">(<?php echo $counted 
 ?>)</span></div></div>
		
		
		<div class="product-list-container">
			
			<div class="product-list">
			 <?php
       
         $totalamount=0;
           include "databaseconnection.php";
          
    $totalAmount = 0;
         while($row=mysqli_fetch_array($cartResult))
          {
         
         $pid=$row['product_id'];
         $cartId=$row['cart_id'];

             $totalAmount+=($row['price']*(int)$row['quantity']);
    ?> 
			
			<div class="products">
				
		<a href="product-detail.php?pid=hfs387dsw9dy<?php echo $pid ?>y566ad"><div class="product-image"><img src="<?php echo $baseImgUrl.$row['url'] ?>"></a></div>
				
				<div class="product-name"><?php echo $row['product_name'] ?></div>
                <div class="product-size"> Selected Size- <?php echo $row['size_name'] ?></div>



                <div class="product-tag"><div class="tag-name contrast-color-bg"><?php echo $row['category_name'] ?></div></div>
				<div class="product-price"> <div class="price"><span style="font-family: 'Raleway', sans-serif; font-size: 18px">Total Price: </span> <?php echo $currencyName.$row['price']*(int)$row['quantity'] ?> <span style="margin-left: 5px;color: #888;;font-weight: 200 font-size: 18px">(<?php echo $row['quantity'] ?>X<?php echo $row['price'] ?>)</span></div>
				<?php
				if($row['price']!=$row['mrpprice'])
				{?>
				<div class="mrp">  <?php echo $currencyName.$row['mrpprice'] ?></div>
				<?php
				}
				?>
				</div>
				<div class="remove" onclick="remove(<?php echo (int)$row['cart_id'] ?>)">Remove</div>
				
				</div>
			
			<?php
	}
	
	?>
			
			</div>
			
			</div>
		
		
		</div>
	<div class="payment-box">
			<div class="payment-heading contrast-color-bg">
			
			<h4>Price Detail</h4>
			</div>
			<div class="detail">
			<span class="detail-heading">Price (<?php
			if($rowCartNumber == 1)
			{
			?>
				<?php echo $rowCartNumber 
 ?> Item )</span>
			<?php
			}
			else
			{
			?>
				<?php echo $rowCartNumber 
 ?> Items )</span>
			<?php
			
			}
			?>


                <span class="detail-value"><?php echo $currencyName.$totalAmount ?></span>
<!--                <div class="detail">-->
<!--                    <span class="detail-heading">Discount</span>-->
<!--                    <span class="detail-value">--><?php //echo $currencyName. ' 0' ?><!--</span>-->
<!--                </div>-->
			<div class="detail">
			<span class="detail-heading">Tax</span>
			<span class="detail-value">nil</span>
			</div>
			<div class="detail">
			<span class="detail-heading" style="font-weight: 800;">Payable Amount</span>
			<span class="detail-value" style="font-weight: 800; border-top: 1px solid #f0f0f0; margin-bottom: 15px;"><?php echo $currencyName.$totalAmount ?></span>
			</div>
			
			<div class="place-order-button">
			
			  <a href="addresses.php"> <div class="button contrast-color-bg"> PLACE ORDER</div></a>
			
			</div>
			

			<div id="message" style="text-align:center;padding:5px;font-size:14px; font-weight:700"></div>
			
			
			
			</div>

			<?php
			}
	else
	{	?>
	
	<div class="header-middle-empty">

	
    <div class="container-empty">
    
      <div class="empty">
		<div class="text">YOUR CART IS CURRENTLY EMPTY.</div>
		<div class="image"><img src="images/empty-cart.jpg"></div>
		<a href="index.php"><div class="text1">LETS SHOP</div></a>
		</div>
      </div>
    
     </div>
	<?php
	}
	
	?>
	</div>
	
	</div>
	
	<?php include 'footer.php'; ?>
	
	
</body>
</html>