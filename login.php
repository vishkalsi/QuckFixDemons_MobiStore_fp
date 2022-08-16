<?php 
session_start();
include "sessions-file.php";
include 'databaseconnection.php';
if(isset($_SESSION[$authToken]))
{
echo "<script>location.href='index.php'</script>";
}
else
{
?>
<!DOCTYPE>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/slider.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
<script src="js/script.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
<script src="jquery.ui.touch-punch.min.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<title>Login with Welcome to MobiStore.com</title>
<meta name="description" content="Welcome to MobiStore.com" />

<link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
</head>

<body>
<?php
include 'header.php';
?>


<div class="gap"></div>



<div class="middle">
<div class="middle-container">



<div class="login-box" id="login">

<form id="login-box-form">

<h2>LOGIN</h2>
<p class="caption">Enter Your Phone Number and password</p>
<div>
<div> <label>+91 - </label><input type="tel" placeholder="Phone Number/Email Address" required class="input-text" id="phoneNumber"> </div>
<div>

<div class="icon"><img src="images/lock.png"></div> <input type="password" placeholder="Pasword" required class="input-text" id="password" autocomplete="off" style="margin-left: 20px;">
</div>
<p style="color: #f00; font-size: 12px; font-weight : 800; " id="errorMessage"></p>
<div class="button">
<input type="button" value="LOGIN" class="login-button contrast-color-bg" onclick="loginValidation()"> </div>
<p style="color: #888; font-size: 13px; font-weight : 700; cursor: pointer " onclick="switchForgetPassword()">Forgot password?</p>
	<p style="color: #888; font-size: 12px; font-weight : 900; cursor: pointer ">Don't have an account? <a href="sign-up.php" style="color:#3897F2">Sign up </a></p>

</div>
</form>
<!--<form id="password-box-form" style="display: none">-->
<!--<div id="passwordBox">-->
<!--        <h2>Recovering Password for <span id="recoveringPasswordDetail" style="color :#006400"></span></h2>-->
<!---->
<!--        <p class="caption">Please Enter Your New Password</p>-->
<!--        <div>-->
<!--            <div class="icon" style="visibility: visible;"><img src="images/lock.png"></div> <input type="password" placeholder="NEW PASSWORD" required class="input-text" id="passwordLoginNew" autocomplete="off" style="margin-left: 20px;">-->
<!--        </div>-->
<!--        <div>-->
<!--            <div class="icon" style="visibility: visible;"><img src="images/lock.png"></div> <input type="password" placeholder="CONFIRM NEW PASSWORD" required class="input-text" id="passwordLoginConfirm" autocomplete="off" style="margin-left: 20px;">-->
<!--        </div>-->
<!--        <div class="button">-->
<!--            <input type="button" value="UPDATE" class="login-button contrast-color-bg" onclick="updatePassword()"></div>-->
<!--        <p id="invalidPhoneForgot" style="visibility:hidden;  font-size: 15px; font-weight : 800; "> Password Changed. Please <a href="login.php" style="color :#006400">login</a> to continue.</p>-->
<!--    </div>-->
<!--    <input type="hidden" id="dataText"/>-->
<!--    <input type="hidden" id="dataTextId"/>-->
<!---->
<!--</form>-->

</div>
<div class="login-box" id="forgotPassword" style="display: none">

<form>
<h2>Recover Password</h2>

<p class="caption">Enter Your Phone Number</p>
<p>You will receive a one time password (OTP) for verification</p>


<div>

    <div> <label>+91 - </label><input type="tel" placeholder="Phone Number/Email Address" required class="input-text" id="phoneNumberForgot"> </div>
<div>

<div class="button">
<input type="button" value="Send" class="login-button contrast-color-bg" onclick="sendForgotRequest()">
<p style="color: #888; font-size: 13px; font-weight : 700; cursor: pointer " onclick="switchForgetPassword()">Back to login</p>	
</div>

<p id="errorMessageForgot" style="color: #f00; font-size: 15px; font-weight : 800"></p>
</div>


<!--<div id="otpField" style="display:none">-->
<!--<p style="font-size: 15px; font-weight : 800; color: #888">Please enter the 4-digit OTP you have got in an SMS</p>-->
<!--<ul>-->
<!--<li><input type="tel" class="input-text otp" required placeholder="ENTER OTP HERE" id="otpText" autocomplete="off" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57'</li>-->
<!---->
<!--<li><input type="button" value="VERIFY" class="verify-button contrast-color-bg" onclick="verifyOTPForgot()" style="margin-top: 18px;"></li> -->
<!---->
<!--<li><p style="color: #f00; font-size: 15px; font-weight : 800 ; visibility: hidden"  id="invalidOTP">Wrong OTP.</p></li>-->
<!---->
<!--</ul>-->
<!--</div>-->
<input type="hidden" id="dataText"/>
<input type="hidden" id="dataTextId"/>
</form>

</div>	

</div>
</div>


<?php include 'footer.php'; ?>


</body>
</html>
<?php
}
?>