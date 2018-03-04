<!-- HEADER -->
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title><?php  echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="eTopiks,Politics,Business, entertainment,Lifestyle,Jobs">
        <meta name="author" content="">

        <link rel="shortcut icon" href="images/favcon.png">

        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/colors/" rel="stylesheet" type="text/css" id="colors" />
        <link rel="stylesheet" href="css/menu.css" type="text/css">
        <link rel="stylesheet" href="css/menu1.css" type="text/css">
        
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="js/superfish.min.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/animate.js" type="text/javascript"></script>
        <script src="js/myscript.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
       
</head>
<body >
      <!-- PAGE -->
 <div id="page" class="single_page">
<header>
  <!-- CONTAINER -->
 
        <!-- MENU BLOCK -->
<div class="menu_block" > 
      <div class="logo_search">
                <!-- LOGO -->
       <div class="logo pull-left"><a href="<?php echo $currectPage; ?>">
         <img src="images/favcon.png" alt="logo" style="height:90px;width:110px" /></a>          
       </div><!-- //LOGO -->

        </div>
    <!-- //MENU BLOCK -->
                <!-- MENU -->
     <!--<div class="pull-right">-->
                        <nav class="navmenu center">
                        <ul>                                   
                            <li class="first scroll_btn <?php echo $fn->CheckActivePage('index.php',$currectPage);?>"><a href="index.php">News</a></li>
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Sports'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Sports</a></li> 
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Business'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Business</a></li>
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Entertainment'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Entertainment</a></li>                                        
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Lifestyle'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Lifestyle</a></li>                                        
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Videos'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Videos</a></li>                                        
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('How To'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="#">Live Streaming</a>
                                <ul class="scroll_btn">
                                      <li class="<?php echo $fn->CheckActivePage("livetv.php",$currectPage);?>"><a href="livetv.php">Live TV</a></li>
                                       <li class="<?php echo $fn->CheckActivePage("onlineradio.php",$currectPage);?>"><a href="onlineradio.php">Online Radio</a></li>
                                       <li class="<?php echo $fn->CheckActivePage("advertisement.php",$currectPage);?>"><a href="advertisement.php">Advertisement</a></li>
                                </ul>
                            </li>                                                                    
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Jobs'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Bet Prediction</a></li>
                        </ul>
                                     
                    </nav>
                <!--</div> //MENU -->
       <div class="pull-right" >
<!--        <nav class="navmenu center" style="margin-top: 5%;padding-left: 50px">
           
        </nav>-->
           <div id="search-form" class="pull-right" style="right:25%">
                <form method="get" id="frmSearch" action="search_results.php">
                <input type="text" name="Search" value="Search" onFocus="if (this.value == 'Search') this.value = '';" 
                               onBlur="if (this.value == '') this.value = 'Search';" />                
                <input type="submit" value=">>" id="btnSearch"/>
                </form>
        </div>
     </div> 
</div><!-- //CONTAINER -->
 
</header><!-- //HEADER -->
