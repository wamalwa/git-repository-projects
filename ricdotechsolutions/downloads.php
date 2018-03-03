
<!DOCTYPE html>
<html>
<head>
<title>Downloads</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ricdotech,Solutions Organization" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
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
	<!--header-top-->

  <?php  $thispage = 'about'; require 'header.php'; ?>
	<div class="banner">
		<div class="_supplies" >
			<div class="container">
				<div class="banner-text">
												
				</div>
			</div>
		</div>
		 
    <?php require 'quicklinks.php'; ?>
	</div>

	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Why Us</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--starts-welcome-->
<div class="container well">
	<div class="welcome-top well heading col-md-9">
		<br>
	<h2>Our Downloads</h2>
<p>Here is a list of our downloads:</p>
<ul>
	<li><a href="#">Quotations</a></li>
	<li><a href="#">Services</a></li>
	<li><a href="#">Products</a></li>
	<li><a href="#">Company Profile</a></li>
	<li><a href="#">Supplies</a></li>
	<li><a href="#">Samples</a></li>
</ul>

</div>
</div>
	<!--welcome-End-->

 <?php require 'footer.php'; ?>
</body>
</html>