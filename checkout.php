<?php
 session_start();
   include "sessions-file.php";
   if(isset($_SESSION[$authToken]))
   { 
       if(isset($_GET['addressId']))
       {
        include "databaseconnection.php";
        $authtoken=$_SESSION[$authToken];
        $userPhone=$_SESSION[$authToken];
        include "services/fetch_total_amount.php";
        $addressId=$_GET['addressId'];
        $_SESSION['addressid']=$addressId;
                
?>          
<!DOCTYPE>
<html>
<head>
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="css/slider.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
    <script src="js/script.js"></script>
	 <meta http-equiv="content-Type" content="text/html; charset=UTF-8" />
	   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="jquery.ui.touch-punch.min.js"></script>
<title> Welcome to MobiStore.com</title>
    <meta name="description" content="Welcome to MobiStore.com" />
    <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	</head>
	
<body onload="walletcheck()">
      <?php include 'header.php'; ?>

	<div class="gap"></div>
	
	
	
	<div class="middle">
		<div class="middle-container">
		  <ul class="left">
        <li class="heading"><div><img src="images/credit-card.png"  alt="Ambarsar Bazaar"></div>
          <span> Payment Option </span>
         
         
        </li>
      <?php
                $result= mysqli_query($connection,"select * from user_address  WHERE   user_address.address_id=$addressId limit 1");
      $row=mysqli_fetch_array($result);
      $pincode=$row['address_pin_code'];
      include "services/cod_check.php";
      ?>
       
        <li class="single" onclick="display()">
    
		Cash on Delivery
          
        </li>
			 <div class="cash-full" id="cash">
		<div class="left">
			
			<div class="details" style="visibility: hidden"><span class="left-side">Net Amount</span><span class="right-side" id="amounttwo"><?php echo $ActualtotalAmount ?></span><span  style=" float :right">$</span> </div>
			
			<form method="post" action="services/submit-order.php">
				<div class="details"><span class="left-side">Net Amount</span><span class="right-side" id="amounttwo"><?php echo$ActualtotalAmount ?></span><span  style=" float :right">$</span></div>

			<div class="details"><span class="left-side">Delivery Charges</span><span class="right-side" id="amountcod" ><?php echo $codCharges ?></span><span  style=" float :right">+$</span></div>
				
		
	<div class="details"><span class="left-side">Payable Amount</span><span class="right-side" id="addamount"><?php echo $ActualtotalAmount + $codCharges ?></span><span  style=" float :right">$</span></div>
		

		<input type="hidden" name="phone" value="<?php echo $userPhone ?>">
	<input type="hidden" id="walletamount" value="<?php echo $debited ?>">
		<input type="submit" value="CONFIRM ORDER WITH COD">

		</form>
               </div>
		<div class="right">
				
				 <h1>Selected address</h1>
			
			<div class="details" style="font-size: 22px; font-weight: 500"><?php echo $row['address_user_name'];?></div>
			<div class="details"><?php echo $row['address_main'];?></div>
			<div class="details"><?php echo $row['address_city'];?>, <?php echo $row['address_state'];?>-<?php echo $pincode ?></div>
			<div class="details"><?php echo $row['address_mobile'];?></div>
			<a href="addresses.php"><div class="option">Change</div></a>
				 </div>
		
		</div>

		
    </ul>
            <div class="payment-box">
                <div class="payment-heading contrast-color-bg" >

                    <h4 >Price Detail</h4>
                </div>
                <div class="detail">
                    <span class="detail-heading">Price (1 Item)</span>
                    <span class="detail-value"><?php echo $currencyName.$ActualtotalAmount ?></span>
                </div>
                <div class="detail">
                    <span class="detail-heading">Tax</span>
                    <span class="detail-value">nil</span>
                </div>
                <div class="detail">
                    <span class="detail-heading" style="font-weight: 800;">Payable Amount</span>
                    <span class="detail-value" style="font-weight: 800; border-top: 1px solid #f0f0f0; margin-bottom: 15px;"><?php echo $currencyName.$ActualtotalAmount ?></span>
                </div>




            </div>
            
        
			</div>
		</div>
	<?php include 'footer.php'; ?>
	
</body>
</html>
<?php
}
else
{
echo "<script>location.href='index.php'</script>";
}
}
else
{
echo "<script>location.href='login.php'</script>";
}
?>