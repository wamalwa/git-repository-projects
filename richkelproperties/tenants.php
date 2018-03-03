
<!DOCTYPE html>
<html>
<head>
<title>Richkel Property Managers | Tenant Services</title>
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
					<h1><a href="tenants.php">Tenant Services</a></h1>
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
	   <?php  $fn->LoadMenu('tenants.php');?>
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
					<li class="active">Tenant Services</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--about-starts-->
	<div class="about">
		<div class="container">
<div class="col-md-6 blog-left heading">
<h4>Application Fee Agreement & Guidelines</h4>
<p>Please complete the entire online application and our office will contact you to collect the Kshs.
    500 application fee (check, pay-bill) for each adult applicant. Once an application is approved, 
    we require the immediate payment of the deposit to guarantee and hold the unit.
    If Payment is not received within 24 hours, we will continue to market the home for rent.</p>
<h4>Application Process</h4>
<p>We process each application as rapidly as possible. Items that may delay the process are:
•	Incomplete applications.
•	Inability to contact previous landlords, or slow response from prior landlords.
If we are unable to verify information on an application, the application will be denied.
</p>
<h4>View or Rent a property</h4>
<ul>
    <li>Tenant Portal – Log In     (Create account/ LOGIN/SIGN OUT)</li>
<li>Tenancy agreement form (download)</li>
<li>New tenant form (download)</li>
<li>Pay rent (pay-bill/ bank)</li>
<li>30 Day Notice to Vacate (A simple form is located here, for your convenience)</li>
<li>Rent status</li>
<li>Utility bill</li>
<li>Request maintenance</li>
</ul>
</div>
                    
<div class="col-md-6 blog-left heading">
<h4>Screening Guidelines</h4>
<p><b>Complete Applications</b>
We will not review incomplete applications. If pets are accepted there will be an increased security deposit; a copy of the latest vaccination record will be required at time of signing the rental agreement.
</p>
<h4>Credit/criminal/public records check</h4>
<p>Negative reports may result in denial of application. Any individual who is a current illegal substance abuser, 
    or has been convicted of the illegal manufacture or distribution of a controlled substance or any other violent felony may be denied tenancy.</p>

</div>                    
 
		</div>
	</div>
	<?php 
$fn->loadFooter();
?>
</body>
</html>