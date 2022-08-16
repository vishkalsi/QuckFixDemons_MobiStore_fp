<?php 
session_start();
include "sessions-file.php";
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
    <title>Sign Up with Welcome to MobiStore.com</title>
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
		
		
		 <div class="login-box" id="signup">
    
        <form>
            <h2>Signup</h2>
            
            <p class="caption">Enter Your Phone Number</p>
            <p>You will receive a one time password (OTP) for verification</p>
            
            
            <div>
            <script>
				function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode < 48 || charCode > 57))
        return false;

    return true;
}
				</script>
                <div class="icon"><img src="images/lock.png"></div> <input type="text" placeholder="Full Name" required class="input-text" id="fullName" autocomplete="off"  style="margin-left: 20px;">
            </div>
               <div> <label> +1 - <span style="visibility: hidden">9</span></label><input type="tel" placeholder="Phone Number" required class="input-text" id="phoneNumber"
onkeypress="return isNumberKey(event)" autocomplete="off" maxlength="10"> </div>
				<div>
                    <div>
                        <div class="icon"><img src="images/lock.png"></div> <input type="email" placeholder="Email Address" required class="input-text" id="email" autocomplete="off"  style="margin-left: 20px;">
                    </div>
				<div class="icon"><img src="images/lock.png"></div> <input type="password" placeholder="New Password" required class="input-text" id="password" autocomplete="off"  style="margin-left: 20px;">


				<div class="button">
				<input type="button" value="Signup" class="login-button contrast-color-bg" onclick="signupValidation()">
                </div>
				
                <p id="errorMessage" style="color: #f00; font-size: 12px; font-weight : 800"></p>
                
                <p style="color: #888; font-size: 12px; font-weight : 900; cursor: pointer ">Have an account? <a href="login.php" style="color:#3897F2">Log in </a></p>
            </div>
            
           
            <div id="otpFieldSignup" style="display:none">
				 <p style="font-size: 15px; font-weight : 800">Please enter the 4-digit OTP you've got in an SMS</p>
            <ul>
                <li><input type="text" class="input-text otp" required placeholder="ENTER OTP HERE" id="signupOTP" autocomplete="off" maxlength="4"></li>
                
                <li><input type="button" value="VERIFY" class="verify-button" onclick="verifyOTP()" style="margin-top: 18px;"></li> 
                
                <li><p style="color: #f00; font-size: 15px; font-weight : 800 ; visibility: hidden"  id="invalidOTP">Wrong OTP.</p></li>
               
            </ul>
				</div>
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