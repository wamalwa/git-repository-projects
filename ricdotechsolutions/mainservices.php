
<!DOCTYPE html>
<html>
<head>
<title>Our Main Services</title>
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
	<!--header-top--><?php  $thispage = 'about'; require 'header.php'; ?>	
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
					<li class="active">Our Main Services</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--starts-welcome-->
<div class="container well">
    <div class="welcome-top well heading col-md-9">
	<br>
   <h2>Main Services We Offer</h2>
<p>Below are some of the main services we offer. From the huge companies to local startup businesses, everyone gets the same love!</p>

<p><b><i>Design:</i></b> You want a specific look? Tell us your vision. We will make it happen.</p>
<p><b><i>Branding:</i></b>  See & be seen. Let’s make sure your brand stands out from the rest.</p>
<p><b><i>Printing:</i></b>  Best quality printers offer the best quality jobs. You will see the difference.</p>
<p><b><i>Installation:</i></b>  Let us add the finishing touches that complete the job.</p>



</div>
</div>
	<!--welcome-End-->

 <?php require 'footer.php'; ?>
</body>
</html>