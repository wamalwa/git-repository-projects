
<!DOCTYPE html>
<html>
<head>
<title>Richkel Property Managers| Properties </title>
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
<!--script-->
	<script src="js/modernizr.custom.97074.js"></script>
<script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
		<!--light-box-files-->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('.gallery-grids a').Chocolat();
		});
		</script>
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
					<h1><a href="index.html">Properties </a></h1>
				</div>
				<div class="col-md-4 head-right">
					<div id="sb-search" class="sb-search">
                                            <form action="serverside/search.php" method="POST">
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
	   <?php  $fn->LoadMenu('properties.php');?>
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
					<li class="active">Property Management</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--blog-starts-->
	<div class="blog">
<div class="container">
<div class="col-md-6 blog-left heading">
<h4>Leasing/Letting</h4>
<p>We want good tenants just as much as you do. We pride ourselves on the quality of tenants we are able to attract. Our extensive tenant screening and leasing procedures help to insure this.<a href="#">Read more...</a></p>
<h4>Rent collection</h4>
<p>All rent is due on the 5th of each month and is considered late if received after the 6th of the month. Late notices are sent on the 7th, and eviction proceedings are initiated if the tenant does not make immediate arrangements for rent payment.</p>
<h4>Repair and Maintenance Services</h4>
<p>Timely, competent maintenance is the key to protecting your investment. Our goal is to provide you with this important service at a reasonable price using only the best qualified personnel.<a href="#">Read more...</a></p>
<h4>Management Fees</h4>
<p>Our monthly management fee is payable when the rent payment is received. It is automatically deducted from your account at the time the rent payment is posted. We do not have a set fee… our fees are based on the difficulty of the assignment and number of properties being managed.<a href="#">Read more...</a></p>
</div>
    <div class="col-md-6 blog-left heading">
     <h4>Moving</h4>
<p>Moving is a big job. In fact, many people say that moving is one of the most stressful and exhausting life experiences. Getting your things in order, changing your address, scheduling transportation and moving services,
    perhaps changing school systems or going through a simultaneous career adjustment - it can all present a massive amount of work.<a href="#">Read more...</a></p> 
 <h4>Accounting</h4>  
 <p>We pride ourselves on our thorough, accurate record-keeping. Our property management system allows us to provide services that would be difficult or impossible with a conventional, manual accounting system.<a href="#">Read more...</a></p>
 <h4>Consultancy</h4>  
 <P>We offer consultancy services to Property Owners across a wide range of sectors.  Our clients include investors, institutions,
     occupiers and managing agents occupying every conceivable building type from historic concert halls to new build industrial sheds.<a href="#">Read more...</a></P>
 <h4>Mortgage Payments</h4> 
 <P>If you wish, we will make the mortgage payment on your property for you. This additional service is offered assuming that we have cash on hand to cover your payment.</P>
    
    
    
    
</div>   
<div class="col-md-12 blog-bottom">
  <h3>Take a look at some of the properties we manage</h3>
            <?php 
                      $newprops = $fn->GetAllProperties();
//                  var_dump($newprops); exit();
                        for ($i = 0; $i < count($newprops); $i++) {
                            //break the string in the array
                            $fields = explode(":", $newprops[$i]);

 echo '<div class="col-md-4 blog-left">
    <div class="blog-one">
       <a href="propertydetails.php?propno='. $fields[3] . '"><img src="images/'. $fields[0] .'" alt="'. $fields[0] . '" style="width:350px;height:200px" />
        </a>
        <div class="blog-btm">
               <a href="propertydetails.php?propno='. $fields[3] . '"><h2>'. $fields[1] .'</h2></a>
                <p class="one">'. $fields[2] . '</p>
                <div class="b-btn">
                       <a href="propertydetails.php?propno='. $fields[3] . '">Read more</a>
                </div>
        </div>
</div>       
</div>';
//                            echo '<div class="col-md-4 prdt-left">
//                                <a href="propertydetails.php?propno='. $fields[3] . '"><img src="images/'. $fields[0] .'" alt="'. $fields[0] . '" style="width:350px;height:270px"/></a>
//                                <a href="propertydetails.php?propno='. $fields[3] . '"><h4>'. $fields[1] .'</h4></a>
//                                <p>'. $fields[2] . '</p>
//                            </div>';
                        }
                       ?>   


<!--<div class="col-md-4 blog-left">
        <div class="blog-one">
                <a href="single.html" >
                        <img class="img-responsive" src="images/b2.jpg" alt=""  />
                </a>
                <div class="blog-btm">
                        <a href="single.html"><h4>Nunc quis turpis sed tortor</h4></a>
                        <p>Post by <a href="#">Admin</a> March 02, 2015  <a href="#">5 comments</a></p>
                        <p class="one">Vestibulum mollis metus et ligula lacinia tempus. Duis aliquet mi pretium purus sagittis fringilla. Fusce vulputate varius erat quis egestas. Proin tempus condimentum sodales.</p>
                        <div class="b-btn">
                                <a href="single.html">Readmore</a>
                        </div>
                </div>
        </div>        
</div>-->
<!--<div class="col-md-4 blog-left">
        <div class="blog-one">
                <a href="single.html" >
                        <img class="img-responsive" src="images/b3.jpg" alt=""  />
                </a>
                <div class="blog-btm">
                        <a href="single.html"><h4>Nunc quis turpis sed tortor</h4></a>
                        <p>Post by <a href="#">Admin</a> March 02, 2015  <a href="#">5 comments</a></p>
                        <p class="one">Vestibulum mollis metus et ligula lacinia tempus. Duis aliquet mi pretium purus sagittis fringilla. Fusce vulputate varius erat quis egestas. Proin tempus condimentum sodales.</p>
                        <div class="b-btn">
                                <a href="single.html">Readmore</a>
                        </div>
                </div>
        </div>      
</div>-->
       
<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--blog-end-->
<?php 
//load the footer
$fn->loadFooter();
?>
</body>
</html>