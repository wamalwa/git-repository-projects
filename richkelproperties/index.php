
<!DOCTYPE html>
<html>
    <head>
        <title>Richkel Property Managers</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Goyeafrica,Charity Organization" />
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
                $(".scroll").click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var $_Tawk_API={},$_Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57ed60d30251ff280798a5af/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
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
                    <div class="col-md-12 head-middle">
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
new UISearch(document.getElementById('sb-search'));
        </script>
     <?php  $fn->LoadMenu('index.php');?>
        <script>
            $("span.menu").click(function() {
                $(" ul.navig").slideToggle("slow", function() {
                });
            });
        </script>
        <!--script-for-menu-->
        <!--banner-starts-->
        <div class="banner">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
  <?php
                $slides = $fn->GetSlides();
                        for ($i = 0; $i < count($slides); $i++) {
                            //break the string in the array
                            $fields = explode(":", $slides[$i]);

                            echo "<li>
                <div class='banner1' style='background: url(images/" . $fields[0] . ") no-repeat;background-size: cover;min-height: 350px;'>
                        <div class='container'>
                                <div class='banner-text'>
                                        <p>" . $fields[1] . "</p>
                                        <h3>" . $fields[2] . "</h3>
                                </div>
                        </div>
                </div>
                </li>";
                        }
   ?> 

                    </ul>
                </div>
            </section>
            <div class="down">
                <h3>Ouick Links</h3>
                <ul>
                    <li><a href="whyus.php" class="hvr-bounce-to-right">Why Us</a></li>
                    <li><a href="downloads.php" class="hvr-bounce-to-right ">Downloads</a></li>
                    <li><a href="#" class="hvr-bounce-to-right ">Careers</a></li>
                    <li><a href="rentroom.php" class="hvr-bounce-to-right">Rent a Room</a></li>
                </ul>
            </div>
        </div>
        <!--banner-end-->
        <!--FlexSlider-->
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            start: function(slider) {
                                $('body').removeClass('loading');
                            }
                        });
                    });
        </script>
        <!--End-slider-script-->
        <!--starts-welcome-->
        <div class="welcome" id="welcome">
            <div class="container">
                <div class="welcome-top heading">
                    <h2>Welcome</h2>
                    <p>We offer a thorough, honest and professional lettings/Leasing & full management service throughout Kenya. 
                        As a professional property managers, we strive to apply our years of property experience and only deal with quality tenants,
                        quality properties and can guarantee a top quality level of service at all times. </p>
                </div>
                <div class="welcome-bottom heading">
                    <h3>Available Properties</h3>
                    <br>
             <?php
                $props = $fn->GetAvailableProperties();
                        for ($i = 0; $i < count($props); $i++) {
                            //break the string in the array
                            $fields = explode(":", $props[$i]);

                     echo '<div class="col-md-4 welcome-left">
                        <img src="images/'. $fields[0] .'" alt="'. $fields[0] . '" style="width:350px;height:270px"/>
                        <div class="welcome-btm">
                            <a href="propertydetails.php?propno='. $fields[3] . '">' . $fields[1] . ' <span class="arw"> </span></a>
                        </div>
                    </div>';
                        }
                        ?>            
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--welcome-End-->
        <!--our-starts-->
        <div class="our" id="furniture">
            <div class="container">
                <div class="our-top">
                    <div class="col-md-7 our-left heading">
                        <h3>Property Presentation</h3>
                        <p>We present your property to the largest available rental market.
                            We are always aware of current market conditions. This allows us to rent your property at its maximum value.
                            We use a broad range of advertising media, including signs and Internet marketing syndicated to 50+ rental sites.
                            .</p>
                    </div>
                    <div class="col-md-5 our-right">
                        <a href="index.php"><img src="images/o-1.jpg" alt="" /></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="our-top">
                    <div class="col-md-7 o-left">					
                        <a href="single.html"><img src="images/o-2.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-5 o-right  heading">
                        <h3>Tenant Screening</h3>
                        <p>We lease/Let only to qualified, responsible tenants.
                            We are experienced in judging credit worthiness. We have designed a point system similar to what banks use to qualify their loan applicants.
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="our-top">
                    <div class="col-md-7 our-left heading">
                        <h3>Property Protection</h3>
                        <p>Our comprehensive screening procedures assure you of desirable tenants.
                            We maintain and update an inventory of all the personal items that are part of your property.
                            We perform spot checks and, upon client request, announced, routine inspections.
                            Our key-control procedures protect you and the tenant against unauthorized entry.
                        </p>
                    </div>
                    <div class="col-md-5 our-right">
                        <a href="single.html"><img src="images/o-3.jpg" alt="" /></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--our-End-->
        <!--product-starts-->
        <div class="product" id="product">
            <div class="container">
                <div class="product-top">
                    <div class="col-md-12 product-right heading">
                        <h3>New Properties</h3>
                        <div class="prdt col-md-12">
               <?php 
                      $newprops = $fn->GetNewProperties();
//                  var_dump($newprops); exit();
                        for ($i = 0; $i < count($newprops); $i++) {
                            //break the string in the array
                            $fields = explode(":", $newprops[$i]);

                            echo '<div class="col-md-4 prdt-left">
                                <a href="propertydetails.php?propno='. $fields[3] . '"><img src="images/'. $fields[0] .'" alt="'. $fields[0] . '" style="width:350px;height:270px"/></a>
                                <a href="propertydetails.php?propno='. $fields[3] . '"><h4>'. $fields[1] .'</h4></a>
                                <p>'. $fields[2] . '</p>
                            </div>';
                        }
                       ?> 
                                                     
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--product-end-->
<?php 
//load the footer
$fn->loadFooter();
?>
    </body>
</html>