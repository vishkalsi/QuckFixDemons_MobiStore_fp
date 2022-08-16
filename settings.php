<?php 
session_start();
include "sessions-file.php";
if(isset($_SESSION[$authToken]))
{
$authToken=$_SESSION[$authToken];
require 'databaseconnection.php';
$resultPh= mysqli_query($connection,"select * from users WHERE auth_token='$authToken'");
    $rowPh=mysqli_fetch_array($resultPh);
     $ph=$rowPh['user_phone'];
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
    <title>Change Password- Welcome to MobiStore.com || Online Punjabi Products Shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" href="images/rose.png" type="image/png" sizes="16x16">
</head>

<body>
<?php
include 'header.php';
?>


<div class="gap"></div>



<div class="middle">
<div class="middle-container">




<div class="login-box" id="forgotPassword" style="display: block">
<form id="password-box-form" style="display: block">
<div id="passwordBox">
<h2>Change Password</h2>

<p>Please Enter Your New Password</p>
<div>
<div class="icon" style="visibility: visible;"><img src="images/lock.png"></div> <input type="password" placeholder="Current Password" required class="input-text" id="currentPassword" autocomplete="off" style="margin-left: 20px;">
</div>

<div class="icon" style="visibility: visible;"><img src="images/lock.png"></div> <input type="password" placeholder="New Password" required class="input-text" id="newPassword" autocomplete="off" style="margin-left: 20px;">
</div>
<div>
<div class="icon" style="visibility: visible;"><img src="images/lock.png"></div> <input type="password" placeholder="Confirm Password" required class="input-text" id="confirmPassword" autocomplete="off" style="margin-left: 20px;">
</div>
<div class="button">
<input type="button" value="UPDATE" class="login-button contrast-color-bg" onclick="changePassword('<?php echo $ph ?>')"></div>
<p id="invalidPhoneForgot" style="font-size: 13px; font-weight: 800; visibility:hidden"></p>
</div>
<input type="hidden" id="dataText"/>
<input type="hidden" id="dataTextId"/>

</form>
</div>	

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
echo "<script>location.href='login.php'</script>";
}
?>