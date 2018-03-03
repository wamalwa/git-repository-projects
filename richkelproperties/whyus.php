
<!DOCTYPE html>
<html>
<head>
<title>Richkel Property Managers | Why Us</title>
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
				<div class="col-md-4 head-left">
					<ul>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="pin"> </span></a></li>
						<li><a href="#"><span class="rss"> </span></a></li>
					</ul>
				</div>
				<div class="col-md-4 head-middle">
					<h1><a href="index.html">Richkel Property Managers</a></h1>
				</div>
				<div class="col-md-4 head-right">
					<div id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Search" type="search" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"> </span>
						</form>
					</div>
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
	   <?php  $fn->LoadMenu('whyus.php');?>
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
					<li class="active">Why Us</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--about-starts-->
	<div class="about">
		<div class="container">
			<div class="about-top heading">
				<h2>Why Us</h2>
			</div>
			<div class="about-bottom">				
				<div class="col-md-6 about-left">
					<img src="images/r-2.jpg" alt="" style="width: 450px;height: 250px"/>
				</div>
				<div class="col-md-6 about-right">
                                    <p>We:</p>
                                    <ul>
                <li>Offer competitive rates.</li>
               <li>Carefully screen all prospective tenants based on credit, tenant history and employment.</li>
               <li>Collect and account for all fees and rents and pay out exactly according to owners' instructions.</li>
               <li>Operate a full-time bookkeeping and accounting department.</li>
               <li>Handle ALL tenant relations.</li>
               <li>Manage all necessary maintenance and repairs.</li>
               <li>Pass on all volume cost savings to owners.</li>
               <li>Provide owners with monthly and year-end statements.</li>
               <li>Deal only with reputable, licensed (Where applicable), bonded and insured maintenance and repair vendors.</li>
               <li>Perform regular property inspections and provide condition reports to owners.</li>
                                    </ul>    
                                </div>
				<div class="clearfix"></div>
			</div>
            <div class="col-md-10 about-right" >
                <h2 class="heading">We Always Respond</h2>
            <p>We will always respond to our clients when they reach out to us.  
                We promise to respond to you within 24 hours, although usually much sooner. 
                One of the most common complaints we hear from clients who switch to RICHKEL PROPERTY MANAGERS is the lack of communication from their previous manager.
                We won’t ever be put in that category.</p>
            
            <h2 class="heading">100% Satisfaction Promise</h2>
            <p>We don’t just sit back and collect fees every month.  At RICHKEL PROPERTY MANAGERS, we earn our money.  We’re here to earn your business and keep you happy.  We always want our clients to be happy with the work we do and we welcome any feedback that helps make us even better.</p>
            
        </div>
                </div>
            </div>
        
        
	<?php 
$fn->loadFooter();
?>
</body>
</html>