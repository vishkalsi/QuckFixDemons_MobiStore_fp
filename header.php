 <?php
 include "sessions-file.php";
require 'databaseconnection.php';
$phoneNumberCart="";
if(isset($_SESSION['guest']))
{
$phoneNumberCart=$_SESSION['guest'];
}
if(isset($_SESSION[$authToken]))
{
$authTokenCart=$_SESSION[$authToken];
 $resultCart= mysqli_query($connection,"select * from users WHERE user_id='$authTokenCart'");
 $rowCart=mysqli_fetch_array($resultCart);
 $phoneNumberCart=$rowCart['user_id'];
}

$resultCartNumber= mysqli_query($connection,"select * from mycart WHERE user_id='$phoneNumberCart'");
$rowCartNumber=mysqli_num_rows($resultCartNumber);
 ?>
<script>
var check=0; 
     

   if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){
   check=1;
window.addEventListener('scroll', function() {
  
       $("#menuLists").slideUp();
       var dropdown=document.getElementById('dropDownList');
if(dropdown.style.display == "block")
{
dropdown.style.display="none";
}
});

   var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
        $("#header").hide();
   } else {
         $("#header").show();
   }
   lastScrollTop = st;
});

}

function checkDropDownMenu()
{    

if(check==1)
{
 $("#menuLists").hide();
var dropdown=document.getElementById('dropDownList');
if(dropdown.style.display == "block")
{
dropdown.style.display="none";
}
else
{
dropdown.style.display="block";
}
}
}

</script>


 <div class="head primary-color-bg" id="header" >
    		<a href='index.php'><span><div class="left" >
				Mobi<b>STORE</b>
			</div></span></a>
    <div class="center">
     <ul class="categoryList">
    
<li  onclick="menuToggle()" onmouseover="menuToggle(event)"  onmouseover="menuDisable(event)" id="shopByCategory">
	Shop By<br> Categories <img src="images/sort-down.png" width="14"  style="margin-left: 2px; float: right"> 
	<ul onmouseout="menuDisable(event)" class="dropDown">
		 <?php
     $query="select * from category order by category_id asc";
$resultOfMenu2=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($resultOfMenu2))
{
$start="KNnfhd";

$cuttingPoint='a';
$end="ltiosnBnsmDSgf";
$categoryIdHeader=$rows['category_id'];
$URL=$start.$cuttingPoint.$categoryIdHeader.$cuttingPoint.$end;
?>
<li onclick="location.href='product-list.php?cid=<?php echo $URL ?>'">
	<?php echo $rows['cat_name'] ?>
</li>
<?php
}
?>		
</ul>
</li>


</ul>
     <ul class="categoryList2">
     
     <?php
     $query="select * from (select * from category order by category_id asc limit 3) sub ORDER BY category_id desc";
$resultOfMenu=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($resultOfMenu))
{
$start="KNnfhd";

$cuttingPoint='a';
$end="ltiosnBnsmDSgf";
$categoryIdHeader=$rows['category_id'];
$URL=$start.$cuttingPoint.$categoryIdHeader.$cuttingPoint.$end;
?>
<li onclick="location.href='product-list.php?cid=<?php echo $URL ?>'">
	<?php echo $rows['cat_name'] ?>
</li>
<?php
}
?>
 <li style="margin-top:-5px; font-size: 11px; text-align: left" onclick="menuToggle()" onmouseover="menuToggle()">
	Shop By<br> Categories <img src="images/sort-down.png" width="14" style="margin-left: 2px; float: right">
	<ul onmouseout="menuDisable(event)" class="dropDown">
		 <?php
     $query="select * from category order by category_id asc";
$resultOfMenu2=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($resultOfMenu2))
{
$start="KNnfhd";

$cuttingPoint='a';
$end="ltiosnBnsmDSgf";
$categoryIdHeader=$rows['category_id'];
$URL=$start.$cuttingPoint.$categoryIdHeader.$cuttingPoint.$end;
?>
<li onclick="location.href='product-list.php?cid=<?php echo $URL ?>'">
	<?php echo $rows['cat_name'] ?>
</li>
<?php
}
?>
</ul>
</li>
</ul>
   
</div>
        <div class="right" id="right">
       
        <?php
           
                if(isset($_SESSION[$authToken])) {
               
                
                    ?>
                 
                    <ul class="menuDropDown">
		
		<li  class="myProfile " onclick="checkDropDownMenu()">
			My Profile <img src="images/sort-down.png" width="14" style="margin-left: 2px; float: right">
			<ul onmouseout="menuDisable(event)" class="dropDown" id="dropDownList">
			<li onclick="location.href='my-orders.php'">
		My Orders</li>
		 	<li onclick="location.href='settings.php'">
			change password</li>
			<li onclick="location.href='logout.php'">
			LOGOUT</li>	
		
</ul>
		</li>
		</ul>
                <?php
                }
            else
            {
                ?>
                <ul>
		<li onclick="location.href='login.php'">
			LOG IN
		</li>
		<li onclick="location.href='sign-up.php'">
			SIGN UP		
		</li>
		</ul>
            <?php
            }
            ?>
		
			
        </div>
        	<div class="right-search" style="display: none" id="searchBox">
       		<form id="formSearch" method="get" action="search-result.php">
		<ul>
		<li>
			<input placeholder="Seach Product Here..." type="text" name="key" required id="searchField">
		</li>
		<li style="float: left; ">
			<img src="images/cancel.png" onclick="hideSearch()">	
		</li>
		<li style="float: left; ">
			<img src="images/search.png"  onclick="searchFunction()">	
		</li>
		</form>	
		</ul>
			
        </div>
         <div class="icons" id="icons">
			  <div class="icon-list"> <div class="icon-image-cart" onclick="location.href='my-cart.php'"> <span id="cartnumber"><?php echo $rowCartNumber 
 ?></span></span><img src="images/shopping-bag.png"></div>
			   <div class="icon-image-search"> <img src="images/search.png" onclick="searchShow()"></div></div>
			 
			</div>
	<div class="menu">
	<div class="menu-icon">
		<img src="images/menu-circular-button.png" onclick="menuToggle()">
		<div class="menu-list" id="menuLists" style="display: none" >
		<ul onmouseout="menuDisable(event)">
		 <?php
     $query="select * from category order by category_id ";
$resultOfMenu2=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($resultOfMenu2))
{
$start="KNnfhd";

$cuttingPoint='a';
$end="ltiosnBnsmDSgf";
$categoryIdHeader=$rows['category_id'];
$URL=$start.$cuttingPoint.$categoryIdHeader.$cuttingPoint.$end;
?>
<li onclick="location.href='product-list.php?cid=<?php echo $URL ?>'">
	<?php echo $rows['cat_name'] ?>
</li>
<?php
}
?>
			</ul>
		
		
		</div>
		</div>
	</div>
    </div>
    
        <script>
                   
            
     
      if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){	
 
}
else
{
var path = window.location.pathname;
var page = path.split("/").pop();

if(page == "index.php" || page == "" || page == "index")
{

	$(".head").addClass("passive");
		$(window).on("scroll", function() {
    if($(window).scrollTop() > 530) {
        $(".head").addClass("active");
        $(".head").removeClass("passive");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".head").removeClass("active");
       $(".head").addClass("passive");
    }
});

}
}

		
                    </script>
          <table class="full-screen-cover" id="cover">
      <tr>
          <td>
                <div class="loader"></div>
              </td>
          </tr>
    </table>  