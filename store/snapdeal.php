<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MyCutOff - Online Shopping Deals in India, Best Price Deals, Price Drop Alerts</title>
	<meta name="description" content="Get your favourite products at the best price possible with price drop alert for Flipkart, Jabong, Snapdeal, Ebay, Amazon, Infibeam ." />
	<!-- Included Bootstrap CSS Files -->
	<link rel="stylesheet" href="../beta/js/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../beta/js/bootstrap/css/bootstrap-responsive.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Includes FontAwesome -->
	<link rel="stylesheet" href="../beta/css/font-awesome/css/font-awesome.min.css" />

	<!-- Css -->
	<link rel="stylesheet" href="../beta/css/style.css" />

</head>
<body>

	<div  class="navbar navbar-inverse navbar-fixed-top " role="navigation">
		<div class="navbar-inner">
			<div class="container">
				<button class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="../index.php">MyCutOff (beta)</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
					<!--<li><a href="index.php">Home</a></li>-->
						</li>
					</ul>
					<form class="navbar-form form-search pull-right">
						<input id="search" type="text" placeholder="Coming Soon">
						<button type="submit" class="btn">Search</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="span3">
				<div class="well">
					<ul class="nav nav-list">
						<li class="nav-header">Offers</li>
						<li>
							<a href="#">50 % Discount offers</a>
						</li>
						<li>
							<a href="#">30 % Discount offers</a>
						</li>
						<li>
							<a href="#">20 % Discount offers</a>
						</li>
						<li>
							<a href="#">10 % Discount offers</a>
						</li>

						<li class="nav-header">Store wise offers</li>
						<li>
							<a href="./flipkart.php">Flipkart Offers</a>
						</li>
						<li class="active">
							<a href="./snapdeal.php">SnapDeal Offers</a>
						</li>
						<li>
							<a href="./amazon.php">Amazon.in Offers</a>
						</li>
						<li>
							<a href="./jabong.php">Jabong Offers</a>
						</li>
						<li>
							<a href="./infibeam.php">Infibeam Offers</a>
						</li>
						<li>
							<a href="./ebay.php">Ebay.in Offers</a>
						</li>
					</ul>
				</div>

				<div class="well">
				<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=25090&file_id=83069" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_AnniversarySale_Minimum40OFF_250x250.jpg" width="250" height="250" border="0" /></a>
				</div>

				<div class="well">
				<a href="http://tracking.vcommission.com/aff_c?offer_id=1018&aff_id=25090&file_id=90854" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/1018/Ebay_Laptops_CPS_250x250.jpg" width="250" height="250" border="0" /></a>
				</div>

				<div class="well">
					<form class="form login-form" method="post" action="login.php">
						<h2>Sign in</h2>
						<div>
							<label>Email address</label>
							<input id="Username" name="txtemail" type="email" required/>
							<label>Password</label>
							<input id="Password" name="txtupass" type="password" required/>
							<br /><br />
							<button type="submit" class="btn btn-success" name="btn-login">Login</button>
						</div>
						<br />
						<a href="signup.php">Register</a>&nbsp;&#124;&nbsp;<a href="fpass.php">Forgot password?</a>
					</form>
				</div>
			</div>

			<div class="span9">
				<div class="hero-unit">
					<h2 class="">Daily Deals & Price Drop Alerts</h2>
					<p class="">Get the best offers, handpicked deals, price drop alets directly to your in box. Stop waiting for coupon codes start making your own deals today.</p>
				</div>
	 <ul class="thumbnails">
<?php
include_once("../app/db.php");
$sql2 = "SELECT * FROM pdata WHERE storeName='Infibeam'";
$result1=mysqli_query($conn,$sql2);
$prnb=mysqli_num_rows($result1);
$pnum = ceil($prnb/12);
if($_GET){
$numg = $_GET["p"];
}
if(!$_GET){
$numg =1;
}
$start= (($numg-1)*12);
$end = 12;
$sql1 = "SELECT * FROM pdata LIMIT $start,$end";
//echo $sql1;
$result=mysqli_query($conn,$sql1);
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$price1 = $row['pcurr'];
	$price2 = $row['pricenow'];
	echo '<li class="span3">';
	echo '<div class="thumbnail">';
	echo '<img src="'.$row['pimg'].'"alt="">';
	echo '<div class="caption">';
	echo '<b>'.$row['ptitle'].'</b>';
	echo '<p>Rs.<strike>'.$row['pcurr'].'</strike>&nbsp'.$row['pricenow'];
	if($price1 > $price2){echo '&nbsp<span style="color:green"><i class="icon-arrow-down"></i></span>';}
	elseif($price1 < $price2){echo '&nbsp<span style="color:red"><i class="icon-arrow-up"></i></span>';}
	else{echo '&nbsp<span style="color:orange"><i class="icon-resize-vertical"></i>';};
	echo '</p>';
	echo '<p>Store Name: &nbsp<b>'.$row['storeName'].'</b></p>';
	echo '<a class="btn btn-primary" href="../watch.php">View</a>&nbsp';
	echo '<a class="btn btn-success" target="_blank" href="../store.php?id='.$row['id'].'">Buy Now</a>';
	echo '</div>';
	echo '</div>';
	echo '</li>';
}
?>
		</ul>
				<div class="pagination">
					<ul>
						<?php
						for($i = 1; $i <= $pnum; $i++){
						echo'<li><a href="flipkart.php?p='.$i.'">'.$i.'</a></li>';
						}
						?>
					</ul>
				</div>

			</div>
		</div>
	</div>

	<hr />

	<footer id="footer" class="vspace20">
		<div class="container">
			<div class="row">
				<div class="span4">
					<h4>Info</h4>
					<ul class="nav nav-stacked">
						<li><a href="#">Sell Conditions</a>
						<li><a href="#">Shipping Costs</a>
						<li><a href="#">Shipping Conditions</a>
						<li><a href="#">Returns</a>
						<li><a href="#">About Us</a>
					</ul>
				</div>

				<div class="span4">
					<h4>Location and Contacts</h4>
					<p><i class="icon-map-marker"></i>&nbsp;I do not Know Avenue, A City</p>
					<p><i class="icon-phone"></i>&nbsp;Phone: 234 739.126.72</p>
					<p><i class="icon-print"></i>&nbsp;Fax: 213 123.12.090</p>
					<p><i class="icon-envelope"></i>&nbsp;Email: info@mydomain.com</p>
					<p><i class="icon-globe"></i>&nbsp;Web: http://www.mydomain.com</p>
				</div>

				<div class="span4">
					<h4>Newsletter</h4>
					<p>Write you email to subscribe to our Newsletter service. Thanks!</p>
					<form class="form-newsletter">
						<div class="input-append">
							<input type="email" class="span2" placeholder="your email">
							<button type="submit" class="btn">Subscribe</button>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<div class="span6">
					<p>&copy; Copyright 2016.&nbsp;</p>
				</div>
				<div class="span6">
					<a class="pull-right" href="#" target="_blank">Made in India</a>
				</div>
			</div>
		</div>
	</footer>

	<script src="../beta/js/jquery-1.10.0.min.js"></script>
	<script src="../beta/js/bootstrap/js/bootstrap.min.js"></script>
	<script src="../beta/js/holder.js"></script>
	<script src="../beta/js/script.js"></script>
</body>
</html>
