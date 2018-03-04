<!DOCTYPE html>
<html>
<head>
<title>Bulk SMS  | Client Portal</title>
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
<body>  <?php 
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
                                <h1><a href="index.html"> Client Portal Login</a></h1>
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
	   <?php  $fn->LoadMenu('index.php');?>
	<!--script-for-menu-->
	<script>
		$("span.menu").click(function(){
			$(" ul.navig").slideToggle("slow" , function(){
			});
		});
	</script>
	
	<!--contact-starts-->
	<div class="contact">
		<div class="container">
     
        <div class="col-md-4 "></div>               
        <div class="col-md-4 contact-middle">
            <form method='POST' action='serverside/action.php'>	
                <div class="col-md-12 c-left">
   <div id='message'><?php 
                  if(!empty($_SESSION['message'])){
                   echo $_SESSION['message'];
                       session_destroy();}
 else {
      session_destroy();
 }
                       ?></div><br>
                    <input type="text" placeholder="Username" name='myusername' required="required">
                        <input type="password" placeholder="Password" name='mypassword' required="required">										
                            
                <div class="clearfix"></div>
                <div class="submit-btn">
               <input type="submit" value="LOGIN">
                </div>
               </div> 
                </form>
           
        </div>
          <div class="col-md-4 "></div>
<div class="clearfix"></div>
<br><br>
 <div class="row">
               <div class="col-md-4 "></div>               
               <div class="col-md-4 contact-right" style="text-align: center">
                 Don't have an Account?  <a href="sigup.php"> Create New Account</a>
               </div> 
                 <div class="col-md-4 "></div>
            </div>
			</div>
</div>
	
	<!--contact-end-->
		<?php 
$fn->loadFooter();
?>
</body>
</html>