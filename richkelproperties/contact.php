<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Richkel Property Managers  | Contact Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
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
<body>  <?php 
          include_once 'serverside/config.php'; 
          include_once('serverside/functions.php');
                        $fn = new Functions();
        ?>
	<!--header-top-->
	<div class="header-top" id="home">
		<div class="container">
			<div class="head-main">
				<div class="col-md-4 head-left">
					<ul>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="pin"> </span></a></li>
						<li><a href="#"><span class="rss"> </span></a></li>
					</ul>
				</div>
				<div class="col-md-4 head-middle">
					<h1><a href="index.html">Contact Us</a></h1>
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
	<!--//search-scripts-->
	   <?php  $fn->LoadMenu('contact.php');?>
	<!--script-for-menu-->
	<script>
		$("span.menu").click(function(){
			$(" ul.navig").slideToggle("slow" , function(){
			});
		});
	</script>
	<!--script-for-menu-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Contact Us</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--contact-starts-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h3>Contact Us</h3>
			</div>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d47753.14235372253!2d-87.8390792!3d41.57851990000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1skohl&#39;s!5e0!3m2!1sen!2sin!4v1436335323316" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="contact-bottom">
				<div class="col-md-4 contact-left">
					<h2>How to contact Us</h2>
					<p></p>
					<div class="add">						
						<h5>Address</h5>
							<address>
								<strong>Richkel Property Managers.</strong><br>
								 P. O Box 504-01001 KALIMONI, KENYA
							</address>					
					</div>
				</div>
				<div class="col-md-8 contact-right">
					<form>	
					<div class="col-md-6 c-left">
						<input type="text" placeholder="Name">
						<input type="text" placeholder="Email">
						<input type="text" placeholder="Phone">											
					</div>
					<div class="col-md-6 c-left">					
							<textarea placeholder="Message" required></textarea>
					</div>
					<div class="clearfix"></div>
					<div class="submit-btn">
							<input type="submit" value="SUBMIT">
					</div>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--contact-end-->
		<?php 
$fn->loadFooter();
?>
</body>
</html>