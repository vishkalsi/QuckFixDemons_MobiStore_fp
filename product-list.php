<?php
session_start();
include "sessions-file.php";
include "image_url_file.php";
 $categoryId = $_GET['cid'];
 $subCategoryId=0;

        $categoryId = str_replace("\\", "\\\\", $categoryId);
        $categoryId = str_replace("'", "\'", $categoryId);
        $categoryId = trim($categoryId);
        $del="a";
        strtok($categoryId,$del);
        $categoryId = strtok($del);
        $minPrice=0;
    	$maxPrice=0;
	    $cName="Products ";
	
include 'databaseconnection.php';
//$coverImageQuery="SELECT `product_image_url` FROM product_images,vproduct WHERE product_image_product_id= vproduct.product_id and  product_category_id=$categoryId";
//$resultCoverImage=mysqli_query($connection,$coverImageQuery);
//$rowCoverImage=mysqli_fetch_array($resultCoverImage);
//$url=$rowCoverImage['product_image_url'];

$resultPrice=mysqli_query($connection,"select max(p_size_price) as max_price, min(p_size_price) as min_price from product_sizes,product where product_sizes.p_size_product_id= product.product_id AND product_category_id=$categoryId");
$rowPrice=mysqli_fetch_array($resultPrice);
$productMinPrice=$rowPrice['min_price'];
$productMaxPrice=$rowPrice['max_price'];
//getting minimum and maximum price of partilcular category

$query="SELECT *,(select max(p_size_price) from product_sizes where p_size_product_id=product_id order by p_size_price asc limit 1) as max_price,(select min(p_size_price) from product_sizes where p_size_product_id=product_id order by p_size_price asc limit 1) as min_price,(select p_size_mrp_price from product_sizes where p_size_product_id=product_id order by p_size_price asc limit 1) as mrpprice,(select p_size_price from product_sizes where p_size_product_id=product_id order by p_size_price asc limit 1) as price,(select  product_image_url from product_images where product_image_product_id=product_id limit 1) as url,(select count(*) from product_sizes where p_size_product_id=product_id ) as totalSizes,(SELECT COUNT( DISTINCT product_images.product_image_color_id )  FROM product_images where product_image_product_id=product_id) as totalColors from product where product_category_id=$categoryId limit 18";
$results=mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<link href="css/style.css" rel="stylesheet">
	<link href="css/product-style.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
<link rel="stylesheet" href="zoom/easyzoom.min.css">
<link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script src="js/script.js"></script>
   <title><?php echo $cName ?> by MobiStore.com</title>
    <meta name="description" content="Welcome to MobiStore.com" />
     <script src="jquery.resizecrop-1.0.3.min.js" type="text/javascript"></script>

	</head>
	
<body>
 <?php include 'header.php'; ?>

	

	<?php
	$productCount=mysqli_num_rows($results);
			if($productCount>0)
			{
	?>
	<div class="products-middle-container">
		
	<div class="products-menu-list">
		<ul>
		<?php 
		$categoryResult=mysqli_query($connection,"select * from subcategory where cat_id=$categoryId");
		
		?>
			<h4 style="">FILTERS </h4>
			<h5>Categories</h5>
			<?php 
			while($categoryRow=mysqli_fetch_array($categoryResult))
			{
			$subCategoryId=$categoryRow['subcategory_id'];
			?>
		<li class="subCategoryListClass" id="categoryList<?php echo $categoryRow['subcategory_id'] ?>" onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'computer','subCategory','')">
			<?php echo $categoryRow['name'] ?>
		</li>
		<?php
		}
		?>
		
		</ul>
		<ul>
			
			<h5>Price Range</h5>
		<li class="price">
		<p>

  <input type="text" id="amount" readonly style="border:0; color:#DC3812; font-weight:400; background: none;text-align:left; font-size:18px;">
  
  <input type="hidden" id="amountFrom" value="<?php echo $productMinPrice ?>">
			<input type="hidden" id="amountTo" value="<?php echo $productMaxPrice ?>">
			<input type="hidden" id="categoryId" value="<?php echo $categoryId ?>" >
</p>
 
<div id="slider-range" onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'computer','slider','')"></div>
				 
		</li>
			
		</ul>
		<ul>
		
			<h5>Sort By</h5>
		<li onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'computer','priceSort','asc')" class="subFiltersList" id="lowToHigh">
			Low to High
		</li>
		<li onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'computer','priceSort','desc')" class="subFiltersList" id="highToLow">
			High to Low
		</li>
		<li onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'computer','oldNew','desc')" class="subFiltersList" id="newestFirst">
			Newest First
		</li>
		<li onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'computer','oldNew','asc')" class="subFiltersList" id="oldestFirst">
			Oldest First
		</li>
		</ul>
		
		</div>	
		
	</div>
	
	<div class="product-container">
	<ul class="products" id="productList">
	<?php
			$pid=0;
			$minPrice=0;
			$maxPrice=0;
			
			while($row=mysqli_fetch_array($results))
			{
			$minPrice=(int)$row['min_price'];
			$maxPrice=(int)['max_price'];
			$pid=$row['product_id'];
			$productPrice=$row['price'];
			$productMrp=$row['mrpprice'];
			?>
		
	 <a href="product-detail.php?pid=hfs387dsw9dy<?php echo $row['product_id']?>y566ad" style="color: #000;" target="_blank"><li class="product">
		<div class="product-image">
		<img src="<?php echo $baseImgUrl.$row['url'] ?>">
		</div>
			
		<div class="product-name">
		<?php echo $row['product_name'] ?>
		</div>
		<?php
        $currencyName = "$";
		if($productMrp!=$productPrice)
		{
		?>
		<div class="product-price">
		<div class="our-price"><?php echo $currencyName.$productPrice ?></div>
		
		
					<div class="mrp"><?php echo $currencyName.$productMrp?></div>
					</div>
		<?php
		}
		else
		{
		?>
		<div class="product-price">
<div class="our-price" style="width: 100%; text-align:center; float: none; margin: 0px;"><?php echo $currencyName.$productPrice ?></div>
		
		
					
					</div>
		<?php
		}
		?>
		
		
	</li>	</a>
	
		<?php
			
			}
			
			?>

	</ul>
	
	
	<h3 style="text-align: center; padding:15px;font-size:18px; width: 90%;clear: both; cursor: pointer; margin: 0 auto"  onclick="switchFilters(0,<?php echo $categoryId ?>,'computer','loadMoreRequest','')" id="loadMore">Load More</h3>
	
	<div  style="font-size:16px;color:#111;display: none;text-align: center" id="empty">No Product Available.</div>
	</div>
	
	<div class="bottom-menu-mobile" id="menuListSort">
	
	<div class="products-menu-list">
	
	<ul>
		<h5>Sort By</h5>
	<li onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'mobile','priceSort','asc')" class="subFiltersListMobile" id="lowToHighMobile">
		Low to High
	</li>
	<li onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'mobile','priceSort','desc')" class="subFiltersListMobile" id="highToLowMobile">
		High to Low
	</li>
	<li onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'mobile','oldNew','desc')" class="subFiltersListMobile" id="newestFirstMobile">
		Newest First
	</li>
	<li onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'mobile','oldNew','asc')" class="subFiltersListMobile" id="oldestFirstMobile">
		Oldest First
	</li>
	</ul>
		
		</div>	
	</div>
	<?php
	}
	else
	{
	?>
	<div style="margin-top: 150px;"></div>
	<div class="header-middle-empty">

	
    <div class="container-empty">
    
      <div class="empty">
		<div class="text">No Product found in this category.</div>
		<div class="image"><img src="images/empty-cart.jpg"></div>
		<a href="index.php"><div class="text1">HOME</div></a>
		</div>
      </div>
    
     </div>
	
	
	<?php
	}
	?>
	<div class="bottom-menu-mobile" id="menuListFilter">
	<div class="products-menu-list">
	<h4 style="margin:0px;margin-bottom:20px;padding:10px; text-align:center; color: #fff;background: #000 ; font-size:12px" onclick="openFilters()">CLOSE X</h4>
		<h4 style="margin:0px;margin-top:20px;margin-left:10px">FILTERS</h4>
		<ul>
		<?php 
		$categoryResult=mysqli_query($connection,"select * from subcategory where cat_id=$categoryId");
		
		?>
			
			<h5>Categories</h5>
			<?php 
			while($categoryRow=mysqli_fetch_array($categoryResult))
			{
			?>
		<li class="subCategoryListClass" id="categoryListMobile<?php echo $categoryRow['subcategory_id'] ?>" onclick="switchFilters(<?php echo $categoryRow['subcategory_id'] ?>,<?php echo $categoryId ?>,'mobile','subCategory','')">
			<?php echo $categoryRow['name'] ?>
		</li>
		<?php
		}
		?>
		
		</ul>
		<ul>
			
		<ul>
			
			<h5 style="margin:0px;margin-top:10px">Price Range</h5>
		<li class="price">
		
 
<div style="text-align: center;display: flex;width:100%"><input type="text" style="float: left ;width: 100px; padding: 5px;margin: auto;" value="<?php echo $productMinPrice ?>" id="priceOne"><span style="font-size: 18px;margin: auto; font-weight:800">TO</span>  <input type="text" id="priceTwo" style="float: right;width: 100px; padding: 5px;margin: auto;" value="<?php echo $productMaxPrice ?>" ></div>
 <div style="text-align: right; padding: 8px"> <input type="button" value="Go" style="padding :5px" onclick="switchFilters(<?php echo $subCategoryId ?>,<?php echo $categoryId ?>,'mobile','sliderMobile','')"> </div>
		</li>
			
		</ul>
		
		
		</div>	
	</div>
	
	
	<div class="bottom-tab-mobile" >
	
	<div class="tab" onclick="openFilters()">Filters<img src="images/filter-results-button.png"></div>
	<div class="tab" onclick="openSorting()">Sorting<img src="images/sort.png"></div>
	</div>
	<?php include 'footer.php';
	
	
	$connection->close(); ?>

</body>
</html>