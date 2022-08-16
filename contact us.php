<?php 
session_start();
include "sessions-file.php";
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
    <meta name="description" content="Welcome to MobiStore.com" />
    <meta name="format-detection" content="telephone=no">
    <title>Contact us at Welcome to MobiStore.com || Online Punjabi Products Shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" href="images/rose.png" type="image/png" sizes="16x16">
	</head>
	
<body>
  <?php include 'header.php';?>
	
	
	
	<div class="gap"></div>
	<div class="wrapper">
		<h1 class="page-title">Contact Us</h1>
		<div class="main">
			<div class="contactus-page">
				<p><img class="contactimg" src="images/contactuss.jpg" alt="Contact Us" /></p>
				<h1 ><i class="fa fa-map" style="color: dodgerblue"></i> 2000 Random Street, MJT 434</h1>
				<p class="contact-email"><a href="tel:+0987654321">+0987654321</a> </p>
				<p class="contact-email"><a target="_blank" href="mailto:mobistore@gmail.com">mobistore@gmail.com</a></p>
				<h2>Please fill the form below, We love to hear from you and we will reach to you shortly.</h2>
				<form action="submit-contact.php" class="contact-form" method="post">
					<fieldset>
						<div class="contactfield">
							<label>Name *</label>
							<input name="name" type="text" value="" size="40" class="name inputtext" required />
						</div>	
						<div class="contactfield">
							<label>Email *</label>
							<input name="email" type="email" value="" size="40" class="email inputtext" required />
						</div>
						<div class="contactfield">
							<label>Phone *</label>
							<input name="phone" type="tel" value="" size="40" class="phn inputtext" required />
						</div>
						<div class="contactfield">
							<label>Subject</label>
							<input name="subject" type="text" value="" size="40" class="subject inputtext" />
						</div>
						<div class="contactfield">
							<label>Message *</label>
							<textarea name="message" cols="22" class="message" required ></textarea>
						</div>
						<p class="submit-button">
     						<input class="submit_contact" type="submit" value="Submit" name="submit"/>
   						</p>	
 					</fieldset>
  			<?php
  			if(isset($_GET['i']))
  			{?>	<p style="color: #C6984A; font-size: 18px; font-weight: normal; text-align: center;">Your message is successfully sent, Will get back to you as soon as possible.</p>
  			<?php
  			}?>
				 </form> 
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.929826344058!2d74.85440251452886!3d31.635771681331654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391964b0caae5f2b%3A0xc30c1e303ade643a!2sE-Tech+Computer+Education!5e0!3m2!1sen!2sin!4v1464429799457" width="300" height="210" frameborder="0" allowfullscreen></iframe>
			</div><!---End of contactus-page---->
		</div>
	</div>
	
<?php include 'footer.php'; ?>
</body>
</html>