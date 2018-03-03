
<!DOCTYPE html>
<html>
<head>
<title>Richkel Property Managers | About Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Decolux Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="icon"  href="images/logo.jpg"/> 
<script src="js/jquery.min.js"></script>
<!--start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smoth-scrolling-->
</head>
<body>
     <?php 
     include_once 'serverside/config.php';     
     include_once('serverside/functions.php');
                        $fn = new Functions();
        ?>
	<!--header-top-->
	<div class="header-top" id="home">
		<div class="container">
			<div class="head-main">
				<div class="col-md-3 head-left">
					<ul>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="pin"> </span></a></li>
						<li><a href="#"><span class="rss"> </span></a></li>
					</ul>
				</div>
				<div class="col-md-10 head-middle">
					<h1><a href="about.php">About Us</a></h1>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--header-top-->
	<!--search-scripts-->
	<script src="js/classie.js"></script>
	<script src="js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>
	   <?php  $fn->LoadMenu('about.php');?>
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>
	<!-- script-for-menu -->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">About Us</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--about-starts-->
	<div class="about">
		<div class="container">
			<div class="about-top heading">
				<h2>About Us</h2>
			</div>
			<div class="about-bottom">				
				<div class="col-md-6 about-left">
					<img src="images/r-2.jpg" alt="" style="width: 450px;height: 250px"/>
				</div>
				<div class="col-md-6 about-right">
                                    <p>We are a licensed property management company that is based in Kenya. We are in the business of RENT COLLECTION, MAINTENANCE, MOVING, LETTING/LEASING, ACCOUNTING & CONSULTANCY to help our clients meet their needs and achieve their goals with little or no stress. </p>
                                    <p>We look forward to helping a larger percentage of property owners and other concerned stakeholders manage their properties in any part of Kenya. We strive to minimize the risk of litigation, and the risk of damage to rental units and we have perfected strategies to maximize profits by simply slashing vacancy rates and repair and maintenance costs of all properties under our care.</p>
                                    <p>As a property management company, we abide by the legal guidelines in Kenya, which means not singling out one particular demographic group when sourcing for tenants for our properties. We will leverage on all available means to advertise our vacant properties and will not restrict our properties to any group of tenants but to anyone who is qualified and can afford the rent.</p>
				</div>
				<div class="clearfix"></div>
			</div>
                    
     <div class="our-top">
                    <div class="col-md-7 our-left heading">
                        <h3>Our Vision Statement </h3>
                        <p>Our Vision is to become the preferred choice of property owners and tenants when it comes to property rentals in the whole of Kenya. </p>
                    </div>
                    <div class="col-md-5 our-right">
                        <a href="single.html"><img src="images/o-1.jpg" alt="" style="width: 400px;height: 250px"/></a>
                    </div>
                    <div class="clearfix"></div>
       </div>
    <div class="our-top">
                    <div class="col-md-7 our-left heading">
                        <h3>Our Mission Statement  </h3>
                        <p>We are a company that is established with the aim of helping tenants (people and businesses) get the properties of their choice, and to help property owners and group owners of properties effectively manage and maximize their properties in Kenya.   </p>
                    </div>
        <div class="col-md-5 our-right" >
                        <a href="single.html"><img src="images/o-1.jpg" alt="" style="width: 400px;height: 250px"/></a>
                    </div>
                    <div class="clearfix"></div>
       </div>
		</div>
	</div>
	<!--about-end-->
	
	<!--team-starts-->
	<div class="team">
		<div class="container">
			<div class="team-top heading">
				<h3>Our Team</h3>
			</div>
			<div class="team-bottom">
				<div class="col-md-3 team-left">
					<div class="view fifth-effect">
						<a href="#" title="Full Image"><img src="images/team-3.jpg" alt=""/></a>
						<div class="mask1"></div>
					</div>
					<div class="team-text">
						<h4>Richard </h4>
						<p>Founder and CEO</p>
					</div>

				</div>
				<div class="col-md-3 team-left">
					<div class="view fifth-effect">
						<a href="#" title="Full Image"><img src="images/team-2.jpg" alt=""/></a>
						<div class="mask1"></div>
					</div>
					<div class="team-text">
						<h4>Kelvin</h4>
						<p>Founder and CEO</p>
					</div>

				</div>	
<!--				<div class="col-md-3 team-left">
					<div class="view fifth-effect">
						<a href="#" title="Full Image"><img src="images/team-1.jpg" alt=""/></a>
						<div class="mask1"></div>
					</div>
					<div class="team-text">
						<h4>David</h4>
						<p>Etiam maximus eget</p>
					</div>
				</div>	-->
				<div class="col-md-3 team-left">
					<div class="view fifth-effect">
						<a href="#" title="Full Image"><img src="images/team-4.jpg" alt=""/></a>
						<div class="mask1"></div>
					</div>
					<div class="team-text">
						<h4>Jacob Petro</h4>
						<p>Developer</p>
					</div>
				</div>					
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--team-end-->
	<?php 
$fn->loadFooter();
?>
</body>
</html>