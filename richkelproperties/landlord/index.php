<!DOCTYPE html>
<html>
<head>
<title>Richkel Property Managers | Landord Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link rel="icon"  href="../images/logo.jpg"/> 
<script src="../js/jquery.min.js"></script>
<!--start-smoth-scrolling-->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
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
 <?php    include_once '../serverside/config.php';
          include_once('../serverside/functions.php');
                        $fn = new Functions();
                    if(empty($_SESSION['fields'])){
                       header('location:../portal.php');
                    }
                      $fields=$_SESSION['fields'];  
             
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
                                    <h1><a href="#"><?php echo $fields[1]." ".$fields[4]." ".$fields[2]; ?>  Details</a></h1>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--header-top-->
	<!--search-scripts-->
	<script src="../js/classie.js"></script>
	<script src="../js/uisearch.js"></script>
		<script>
		new UISearch( document.getElementById( 'sb-search' ) );
		</script>
	<!--//search-scripts-->
	  <?php  $fn->LoadLandlordMenu('index.php');?>
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
                                        <li><a href="#"><?php echo $fields[1]; ?>  Portal</a> </li>
                                        <li class="active"> <?php echo $fields[1]; ?> Details</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--single-starts-->
 <br><br>
        <p>Welcome <?php echo $fields[4]." ".$fields[2]; ?> to your <?php echo $fields[1]; ?> Portal, help us serve you better.</p>
	<br><br>
        <h6>This <?php echo $fields[1]; ?> Portal is still under construction.</h6>
        
	<!--single-end-->
<?php 
//load the footer
$fn->loadFooter();
?>
</body>
</html>