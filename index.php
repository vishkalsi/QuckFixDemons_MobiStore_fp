<?php
session_start();
include "sessions-file.php";
include "image_url_file.php";
include 'databaseconnection.php';
$query="select *,(select product_image_url from product_images where product_images.`product_image_product_id`=product.product_id limit 1) as url,(select p_size_mrp_price from product_sizes where p_size_product_id=product_id order by p_size_price asc limit 1) as mrpprice,(select p_size_price from product_sizes where p_size_product_id=product_id order by p_size_price asc limit 1) as price from product limit 50";
$results=mysqli_query($connection,$query);
?>
<!DOCTYPE>
<html>
<head>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="css/slider.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />

    <title>Home Page - Mobishop.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	
<body>
   <?php
   include 'header.php';
   ?>
		
	
    <div class="cover" id="cover">
		<div class="buy-now">BUY NOW</div>
		<div class="homepage-slider">

</div>
		<div class="features-container" style="margin-top: 100px">
		<div class="features">
			<ul>
			
			<a style="color: #111" href="#"><li>
				<div class="feature-element">
				<div class="icon"><img src="images/paper-plane.png" alt="Ambarsar Bazaar"></div>
				<div class="upper">SHIPPING</div>
					<div class="down">Feel free to shop</div>
				</div>
				</li></a>
				
				<a style="color: #111" href="#"><li>
				<div class="feature-element">
				<div class="icon"><img src="images/credit-card.png"  alt="Ambarsar Bazaar"></div>
				<div class="upper">Secure Payments</div>
					<div class="down">100% secure payments</div>
				</div>
				</li></a>
				
				
				<a style="color: #111" href="termsandcondition.php"><li >
				<div class="feature-element">
				<div class="icon"><img src="images/reuse.png"  alt="Ambarsar Bazaar"></div>
				<div class="upper">Return Policy</div>
					<div class="down">if goods have problem</div>
				</div>
				</li>
                </a>
				<a style="color: #111" href="contact-us"><li class="last">
				<div class="feature-element">
				<div class="icon"><img src="images/user-male-black-shape.png"  alt="Ambarsar Bazaar"></div>
				<div class="upper">24h Support</div>
					<div class="down">Dedicated Support</div>
				</div>
				</li></a>
		
			</ul>
			
			
			</div>
		</div>
	</div>
		<a href="product-list.php?cid=KNnfhda3altiosnBnsmDSgf" style="color: #000;"><div class="poster">
			
			<div class="image">
				
				
				<img src="images/fire.png">
				</div>
				<h3>POPULAR PRODUCTS</h3>
				
			</div></a>
	
	<div class="middle">
		<div class="middle-containers">
		<div class="square-element">
		
			<?php
			$count=1;
            $currencyName = "$";
			while($row=mysqli_fetch_array($results))
			{
			$price=$row['price'];
			$mrp=$row['mrpprice'];
			$name=$row['product_name'];
			?>
				 <a href="product-detail.php?pid=hfs387dsw9dy<?php echo $row['product_id']?>y566ad" style="color: #000;">	<div class="products">
			
			<div class="image">
				
				
				<img src="<?php echo $baseImgUrl.$row['url'] ?>"  alt="<?php echo $name ?>">
				</div>
				<p class="name"><?php echo $name ?></p>
						<p class="prices primary-color">
						<?php
					if($price!=$mrp)
				{
				?>	
						<span class="price primary-color"><?php echo $currencyName.$price ?></span>
						
			
						<span class="mrp primary-color"><?php echo $currencyName.$mrp ?></span>
						<?php }
						else
						{
						?>
						<span class="primary-color"><?php echo $currencyName.$price ?></span>
						<?php
						}
						 ?>
						</p>
			</div>
                 </a>
				<?php
			}
			?>
			
				</div>
		</div>
	
	</div>
<?php include 'footer.php'; ?>
	
	
</body>
</html>