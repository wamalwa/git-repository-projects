<?php 

function checkActive($page,$thispage){

	if($page===$thispage){
		echo 'class="current"';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<title><?= $thispage ?></title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/camera.css">
	<link rel="stylesheet" href="css/owl.carousel.css">

	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<script src='js/camera.js'></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.stellar.js"></script>
	<script src="js/script.js"></script>
	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/wow.js"></script>
	<script>
		$(document).ready(function () {
			if ($('html').hasClass('desktop')) {
				new WOW().init();
			}
		});
	</script>
	<!--<![endif]-->
	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
	 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
		 <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
	 </a>
	</div>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
	</head>
<body class="index">
<!--==============================header=================================-->
<header id="header">
	<div id="stuck_container">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<h1><a href="index.html">Laixa</a><span> Engineering Limited</span></h1>
					<nav>
						<ul class="sf-menu">
							<li <?php checkActive('index',$thispage); ?>><a href="index.php">Home</a>
								<!-- <ul>
									<li><a href="#">Lorem ipsum</a></li>
									<li><a href="#">Lorem ipsum</a>
										<ul>
											<li><a href="#">Lorem ipsum</a></li>
											<li><a href="#">Lorem ipsum</a></li>
											<li><a href="#">Lorem ipsum</a></li>
										</ul>
									</li>
									<li><a href="#">Lorem ipsum</a></li>
								</ul> -->
							</li>
							<li <?php checkActive('about',$thispage); ?>><a href="about.php">About</a></li>
							<li <?php checkActive('products',$thispage); ?>><a href="products.php">Products</a></li>
							<li <?php checkActive('services',$thispage); ?>><a href="services.php">Services</a></li>
							<li <?php checkActive('contacts',$thispage); ?>><a href="contacts.php">Contacts</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>