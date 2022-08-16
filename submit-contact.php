<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$subject=$_POST['subject'];
$text=$_POST['message'];
$message="$name wants to contact with Ambarsar Bazaar. he/she is saying- $text .$name's contact Number is $phone and email is $email";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";		

	$headers .= 'From: <administrator@ambarsarbazaar.com>' . "\r\n";			
	mail("sidndis27@gmail.com",$subject,$message,$headers);
echo "<script>location.href='contact-us.php?i=success'</script>";
?>