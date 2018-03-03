
<!DOCTYPE html>
<html>
<head>
<title>Ricdotech Solutions| Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ric-Dotech Solutions,Receipt book printing, receipts printers, receipt book printing in Kenya, best receipt book printers in Kenya, delivery note book, invoice book, printing company in Kenya,weddings cards, invitation cards, wedding cards printers in Kenya, theme wedding cards, best wedding cards printers, printing company in Kenya, label , stickers, wedding programs" />
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
    <?php 
      $thispage = 'index';
    require 'header.php'; ?>
	<!--banner-starts-->
	<div class="banner">
		<section class="slider">
            <div class="flexslider">
                <ul class="slides">
					<li>
					<div class="banner1">
						<div class="container">
							<div class="banner-text">
								<p>Business Cards Designs </p>								
							</div>
						</div>
					</div>
					</li>
					<li>
					<div class="banner2">
						<div class="container">
							<div class="banner-text">
								<p>Complimentary Slips</p>
							</div>
						</div>
					</div>
					</li>
					<li>
					<div class="banner3">
						<div class="container">
							<div class="banner-text">
								<p>Logo Designs</p>
							</div>
						</div>
					</div>
					</li>
					<li>
					<div class="banner4">
						<div class="container">
							<div class="banner-text">
								<p>Elegant Designs </p>
							</div>
						</div>
					</div>
					</li>
					
				</ul>
			</div>
		</section>
    
    <?php require 'quicklinks.php'; ?>
	</div>
	<!--banner-end-->
	<!--FlexSlider-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
	<!--End-slider-script-->

 <div class="clearfix"></div>
	<!--starts-welcome-->
<div class="container well">
<div class="welcome-top  heading col-md-9">
<br>
	<h2>Welcome</h2>
<p><b>Ric-Dotech Solutions</b> is a <b>Branding, Designing, Printing, and Supplies</b> company. We deal in quality service, cheaper prices, and fast outcomes despite working under tight time limits.
 We do extraordinary pursuits to guarantee our clients quality, and we strive to maintain this through strict quality guidelines.</p>
<br>
 <p>The vastly qualified crew allows us to offer quality services to a wide variety of customers, from small companies, to big organizations.
  We guide and offer each client with solutions that suit their speed, quality, and monetary requirements.  Also, we provide local and International resolutions.</p>

<br>
  <p> Our clients comprise of individuals, Non-governmental Organizations, Hotels, Corporate Companies, Clubs, Government Agencies, Educational Institutions, and Restaurants.</p>

<br>
<p><b>Ric-Dotech Solutions</b> is a Branding, Graphic design, & printing Company; in addition, we deal in Business cards design, Students Plastic ID’s, Advertisements, Posters design, Logo design, Banner design, Brochure design Promotional designs, Fliers design, Calendars design, Letterheads design, Vehicle Branding, Indoor & outdoor printing, Staff ID’s, Billboards Design, Pull up & Roll up Banners, Signs, among others.  
</p>
<br>
</div>	
<div class="welcome-top  heading col-md-3" style="margin-top: 250px;">
	
	<h4>Mission</h4>
	<p>Our mission is to build a world class printing company...<a href="about.php">More</a></p>

	<h4>Vision</h4>
	<p>Our vision is to establish a standard and world class printing company...<a href="about.php">More</a></p>
	<h4>Values</h4>
	<p>Our values reflect who we are and what we stand for as a company....<a href="about.php">More</a></p>
</div>		
</div>
	<!--welcome-End-->

    <?php require 'footer.php'; ?>
 
</body>
</html>