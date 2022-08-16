<?php

session_start();

include "sessions-file.php";

if(isset($_SESSION[$authToken])) {
    $authtoken=$_SESSION[$authToken];
    include "databaseconnection.php";
    $result= mysqli_query($connection,"select user_address.* from users, user_address where user_address.address_user_id = users.user_id and users.user_id = $authtoken") or die(mysqli_error($connection));
    $count=mysqli_num_rows($result);

    $result1= mysqli_query($connection,"select * from users WHERE user_id='$authtoken'")  or die(mysqli_error($connection));
    $row1=mysqli_fetch_array($result1);
    $userPhone=$row1['user_id'];
    include "services/fetch_total_amount.php";
    ?>

    <!DOCTYPE>
    <html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/slider.css" rel="stylesheet">
        <title> Addresses - MobiStore.com</title>
        <meta name="description" content="Welcome to MobiStore.com" />
        <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
        <script src="js/script.js"></script>
        <script src="js/countries.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="jquery.ui.touch-punch.min.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />

        <script>
            function edit(id)
            {


                console.log("Product size : "+id);
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                        var responseJson = this.responseText;
                        console.log("Product size : "+responseJson);
                        if(responseJson="success")
                        {
                            location.href="edit-address.php";
                        }

                    }
                };
                var parameters = "id="+id;
                xhttp.open("POST", "services/edit-address-session.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(parameters);
            }

            function display()
            {
                var x;
                x=document.getElementById('cash');
                if(x.style.display=="block" )
                {
                    x.style.display="none";


                }
                else
                {
                    x.style.display="block";

                }

            }
            function displaybody()
            {
                var x;
                x=document.getElementById('addaddress');
                x.style.display="block";
            }
        </script>
    </head>

    <body>
    <?php include 'header.php'; ?>




    <div class="gap"></div>



    <div class="middle">
        <div class="middle-container">
            <ul class="left">
                <li class="heading">
                    YOUR CURRENT ADDRESSES
                </li>

                <?php
                $count=mysqli_num_rows($result);
                $id=0;
                while($row=mysqli_fetch_array($result))
                {

                    $ids=$row['address_id'];
                    $phonee=$row['address_mobile'];
                    ?>
                    <li class="single-address">

                        <div class="costumer-name"><?php echo $row['address_user_name'];?></div>
                        <div class="item-edit">
                            <img src="images/pencil-edit-button.png" onclick="edit(<?php echo $ids ?>)">
                        </div>
                        <div class="costumer-address1"> <?php echo $row['address_main'];?></div>
                        <div class="costumer-address2"> <span><?php echo $row['address_city'];?></span>,
                            <span><?php echo $row['address_state'];?></span>
                            - <span><?php echo $row['address_pin_code'];?></span>
                        </div>
                        <div class="costumer-phone"> <?php echo $row['address_mobile'];?></div>


                        <!--            FORM START -->
                        <form method="get" action="check-out.php">
                            <input type="hidden" name="addressId" value="<?php echo $ids ?>">
                            <input type="submit" class="deliverbutton contrast-color-bg" value="deliver to this address">
                        </form>

                        <!--            FORM END-->


                    </li>
                    <?php
                }

                ?>




                <li class="newaddress contrast-color" onclick="display()" style="margin-bottom: 20px">
                    <span>+</span> Add a new Address</li>
                <?php
                if($count>0)
                {
                ?>
                <div class="cash-full-address" id="cash" style="display:none">
                    <?php
                    }
                    else
                    {
                    ?>
                    <div class="cash-full-address" id="cash" style="display:block">
                        <?php
                        }
                        ?>
                        <h3>Enter your address details</h3>
                        <form method="post" action="services/add-address.php">
                            <div class="addresses"> <label>Name</label>
                                <input type="text" name="name" required placeholder="Full Name">
                                <label>Phone</label>
                                <input type="text" name="phone" required autocomplete="off" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Phone Number"></div>
                            <div class="addresses"> <label>City </label>
                                <input type="text" name="city" required placeholder="City">

                                <label>State</label>
                                <input type="text" name="state" required placeholder="State">

                            </div>

                            <div class="addresses" ><label>Postal Code</label>
                                <input type="text" name="pincode" required placeholder="Postal Code">
                            </div>
                            <div class="addresses" ><label>Landmark</label>
                                <input type="text" name="landmark" required placeholder="landmark">
                            </div>

                            <div class="addresses" >	<label>Address</label>
                                <textarea name="addressMain" required placeholder="Full Address"></textarea></div>

                            <div class="addresses" >	<label>Default Address</label>
                                <input name="defaultCheck" type="checkbox" value="1" />
                            </div>


                            <div class="button primary-color-bg"> <input type="submit" value="Deliver to this address">
                            </div>