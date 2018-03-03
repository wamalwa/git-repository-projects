<!DOCTYPE html>
<html>
<head>
<title>Richkel Property Managers | Room Details</title>
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
 <?php    include_once 'serverside/config.php';
          include_once('serverside/functions.php');
                        $fn = new Functions();
                        
              if($_GET['_id']) {  
                  
                  $_id=$_GET['_id'];
//                  var_dump($_id);exit();
                   $fields=array();
                  $details = $fn->GetPRoomDetails($_id);
                        for ($i = 0; $i < count($details); $i++) {
                            //break the string in the array
                            $fields = explode(":", $details[$i]);
                        }
              }
        ?>
	<!--header-top-->
	<div class="header-top" id="home">
		<div class="container">
			<div class="head-main">
				<div class="col-md-2 head-left">
					<ul>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="pin"> </span></a></li>
						<li><a href="#"><span class="rss"> </span></a></li>
					</ul>
				</div>
				<div class="col-md-10 head-middle">
                                    <h1><a href="roomdetails.php">Room Number: <?php echo $fields[2]; ?> </a></h1>
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
	  <?php  $fn->LoadMenu('properties.php');?>
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
					<li><a href="index.php">Home</a></li>
                                        <li><a href="roomdetails.php">Room Details</a> </li>
                                        <li class="active">Room Number: <?php echo $fields[2]; ?></li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--single-starts-->
	<div class="single">
		<div class="container">
			<div class="single-top">
				<img class="img-responsive" src="images/<?php echo $fields[1]; ?>"  alt="<?php echo $fields[1]; ?>" style="width: 1140px;height: 450px" />
			</div>
			<div class="single-bottom">
				<h4><?php echo $fields[2]; ?></h4>
				<p class="one"><?php echo $fields[2]; ?></p>
			</div>
                    <br>
<div class="row heading">
				<h2>Property Details</h2> <hr>
				<div class="col-md-3">
					<div class="media-left">
						<a href="#"><img src="images/<?php echo $fields[1]; ?>" alt="<?php echo $fields[1]; ?>" style="width: 70px;height: 70px"></a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $fields[3]; ?></h4>
                                                <div class="clearfix"> </div>
                                                <p>Location</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="media-left">
						<a href="#"><img src="images/<?php echo $fields[0]; ?>" alt="<?php echo $fields[1]; ?>" style="width: 70px;height: 70px"></a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $fields[4]; ?></h4>
						<div class="clearfix"> </div>
						<p>Physical Address</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="media-left">
						<a href="#"><img src="images/<?php echo $fields[1]; ?>" alt="<?php echo $fields[1]; ?>" style="width: 70px;height: 70px"></a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $fields[5]; ?></h4>
						<div class="clearfix"> </div>
						<p>Number of Rooms</p>
					</div>
				</div>
                                <div class="col-md-3">
					<div class="media-left">
						<a href="#"><img src="images/<?php echo $fields[1]; ?>" alt="<?php echo $fields[1]; ?>" style="width: 70px;height: 70px"></a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $fields[6]; ?></h4>
						<div class="clearfix"> </div>
						<p>Number of Floors</p>
					</div>
				</div>
</div>
                    <br>

<!--			<div class="rly heading">
				<h3>Leave A Comment</h3>
					<div class="rly-top">
						<form>							
							<input type="text" placeholder="Name">
							<input type="text" placeholder="Email" >
							<textarea  placeholder="Message" required></textarea>
							<input type="submit" value="Send">
						</form>
					</div>
			</div>-->
		</div>
	</div>
	<!--single-end-->
	<?php 
//load the footer
$fn->loadFooter();
?>
</body>
</html>