
<!DOCTYPE html>
<html>
<head>
<title>Refer a Friend</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Quotation,Ric-Dotech Solutions,Receipt book printing, receipts printers, receipt book printing in Kenya, best receipt book printers in Kenya, delivery note book, invoice book, printing company in Kenya,weddings cards, invitation cards, wedding cards printers in Kenya, theme wedding cards, best wedding cards printers, printing company in Kenya, label , stickers, wedding programs" />
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

  <?php  $thispage = 'index'; require 'header.php'; ?>
	<div class="banner">
		<div class="_contact" >
			<div class="container">
				<div class="banner-text">
												
				</div>
			</div>
		</div>
	</div>
<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Refer a friend here</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--contact-starts-->
	<div class="contact well">
		<div class="container">
			<div class="contact-top heading">
				<h3>Refer a friend here</h3>
   <div id="not"><?php 
    session_start();
    if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    $status = $message['status'];//success, warning
    $data = $message['data'];
    echo '<div id="message" class="alert alert-'.$status.'">'.$data.'</div>';
    unset($_SESSION['message']);
    }                                
    ?></div>
			</div>
			
			<div class="contact-bottom">
				<div class="col-md-8 contact-right">
			<form action="sendmail.php" method="post">
				<div class="col-md-5 contact-left">
					<p>Please fill  details here</p>
                    </div>	
					<div class="col-md-6 c-left">
						<input type="text" placeholder="Enter Friend's Name" name="fname"  required="required">
						<input type="text" placeholder="Enter Friend's Email" name="femail"  required="required">

						<input type="text" placeholder="Enter Your Name" name="name"  required="required">
						<input type="text" placeholder="Enter Your Email" name="email"  required="required">

					<div class="clearfix"></div>
					<div class="submit-btn">
							<input type="submit" value="Tell a Friend" name="submitButton" id="btnSubmitButton">
					</div>										
					</div>
					</form>
				</div>
		
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

 <?php require 'footer.php'; ?>
</body>
</html>
<script type="text/javascript">
 $(document).ready(function(){
    
        $('#btnSubmitButton').click(function(){
           return confirm('Please confirm submission?');
        }) ; 
}) ;
</script>