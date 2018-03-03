
<!DOCTYPE html>
<html>
<head>
<title>Richkel Property Managers | Downloads</title>
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
					<li class="active">Downloads</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--about-starts-->
	<div class="about">
		<div class="container">
			<div class="about-top heading">
				<h2>Downloads</h2>
                                <p>You can download all the documents you require for Richkel Property Managers here.Just click on the links below.</p>
			</div>
<div class="about-bottom">				
        <div class="col-md-6 about-left">
                <img src="images/w-1.jpg" alt="" style="width: 450px;height: 250px"/>
        </div>
        <div class="col-md-6 about-right">
            <p>Download:</p>
            <ul>
                <li>This is a <a href="serverside/Welcome Letter.pdf">Welcome Letter</a> .</li>
                <li>This is a <a href="serverside/Agreement RICHKEL PROPERTY MANAGERS.pdf">Agreement Letter</a></li>
                <li>This is a <a href="serverside/new-tenant-letter.pdf">New Tenant Form</a></li>
            </ul>    
        </div>
        <div class="clearfix"></div>
</div>
                </div>
            </div>
	<?php 
$fn->loadFooter();
?>
</body>
</html>