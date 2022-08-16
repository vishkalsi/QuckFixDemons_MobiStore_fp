<?php
include 'databaseconnection.php';
if(isset($_GET['pid'])) {
    session_start();
    include "sessions-file.php";
    include "image_url_file.php";
    if(isset($_SESSION[$authToken]))
    {
        $userPhone=$_SESSION[$authToken];
    }
    else
    {
        $userPhone='1';
    }
    $productId = $_GET['pid'];
    $productId = str_replace("\\", "\\\\", $productId);
    $productId = str_replace("'", "\'", $productId);
    $productId = trim($productId);
    $del = "y";
    strtok($productId, $del);
    $productId = strtok($del);

    $connection->close();



    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/slider.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        	<script src="//code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="//code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/http_requests.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
        <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">




        <style>

            .img-zoom-container {
                position: relative;
            }
            .img-zoom-lens {
                position: absolute;
                border: 1px solid #d4d4d4;

                width: 200px;
                height: 200px;
                box-sizing: border-box;
                visibility: hidden;
            }
            .img-zoom-result {
                border: 1px solid #d4d4d4;
                /*set the size of the result div:*/
                width: 300px;
                height: 300px;
            }
        </style>

    </head>

    <body onload="fetchProductDetails(<?php echo $productId ?>)">
    <?php
    include 'header.php';

    ?>
    <div class="detail-gap"></div>

    <div class="middle">
        <div class="middle-container">

            <div class="image-viewer">
                <div class="extra-images" >
                    <ul id="extraImagesContainer" style="padding: 0;">

                    </ul>
                </div>
                <div class="main-image" style="position: relative" onmouseover="showHideImg('show')" onmouseout="showHideImg('hide')" id="mainImageContainer">

                </div>


            </div>
            <div id="resultDiv" style="    width: 500px;
    height: 500px;
    position: absolute;
      box-shadow: 2px 2px 20px 0px;
    right: 6%;
    background-color: rgb(255, 255, 255);
   visibility: hidden"></div>
            <div class="product-description">

                <h1 id="title"></h1>
                <p id="description"></p>
                <h5 class="contrast-color">Product Code: AB0000<span id="productId"></span></h5>
                <div class="price">

                    <span class="mrp" id="mrp"></span>

                    <span class="our-price" id="price"></span>

                    <span class="discount" id="discount"></span>
            </div>





                <div class="size-chart" id="colorBox">
                    <p>Color: </p>
                    <ul style="padding: 0; margin: 0"  id="colors">

                    </ul>
                </div>
                <div class="size-chart" >
                    <p>Sizes: </p>
                    <ul style="padding: 0; margin: 0"  id="sizes">

                    </ul>
                </div>


                <div class="product-description-detail">

                </div>

                <div class="cod-message" id="codMessage"></div>

                <div class="button-list">
                    <div id="addToCart" class="add-to-cart contrast-color-bg" onclick="addToCart()">ADD TO CART</div>
                    <div id="goToCart" style="display: none" class="go-to-cart primary-color-bg" onclick="location.href='my-cart.php'">GO TO CART</div>
                    <div class="buy-now"  onclick="checkcartbuy('PID here','authId here')">BUY NOW</div>

                </div>

            </div>
            		<div class="similar-products-container">
            	<h4>Check the Similar Products</h4>
            		<ul class="products">
            		<?php
            		$similarProductResult=mysqli_query($connection," SELECT *,(select product_image_url from product_images where product_images.product_image_product_id = product.product_id limit 1) as url, (select p_size_mrp_price from product_sizes where p_size_product_id=product_id order by p_size_price asc limit 1) as mrpprice,(select p_size_price from product_sizes where p_size_product_id=product_id order by p_size_price asc limit 1) as price FROM product  ORDER BY rand() LIMIT 3");
            		while($sPRow=mysqli_fetch_array($similarProductResult))
            		{
            		?>
            	 <a href="product-detail.php?pid=hfs387dsw9dy<?php echo $sPRow['product_id']?>y566ad" style="color: #000;"><li class="product">
            		<div class="product-image">
            		<img src="<?php echo $baseImgUrl.$sPRow['url'] ?>">
            		</div>
            		<div class="product-name">
            		<?php echo $sPRow['product_name'] ?>
            		</div>


            		<?php
            		if($sPRow['mrpprice']!=$sPRow['price'])
            		{
            		?>


            		<div class="product-price primary-color">
            		<div class="our-price primary-color"><?php echo $currencyName.$sPRow['price'] ?></div>
            					<div class="mrp primary-color"><?php echo $currencyName.$sPRow['mrpprice'] ?></div>

            		</div>
            		<?php
            		}
            		else
            		{
            		?>
            		<div class="product-price primary-color">
            		<div class="our-price primary-color"  style="width: 100%; text-align:center; float: none; margin: 0px;"><?php echo $currencyName.$sPRow['price'] ?></div>


            		</div>
            		<?php
            		}
            		?>


            	</li></a>
            	<?php
            	}
            	?>

            		</ul>


            	</div>

        </div>

    </div>


    <div class="add-to-cart-popup" id="addToCartPopup">Added to Cart Successfully</div>
    <div class="add-to-cart-popup" id="selectPopup">Select Size</div>
    <div class="add-to-cart-popup" id="dupPopup">Already in Cart</div>
    <div class="add-to-cart-popup" id="couponPopup">Coupon Deleted</div>


    <?php include 'footer.php'; ?>

    </body>
    </html>
    <?php


}
else
{

    echo "<script>location.href='index.php';</script>";
}
?>