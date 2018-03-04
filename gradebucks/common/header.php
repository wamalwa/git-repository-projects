<!DOCTYPE html>
<!--
Template Name: Jeren
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
Edited by Jacob Petero for this website
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title><?php echo $title; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="gradebucks,my revisions,my orders,order now,attachments,new order,testimonials" />
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout//styles/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="layout//styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/css/bootstrap.css.map" rel="stylesheet" type="text/css" media="all">  
<link rel="shortcut icon" href="images/favicon.jpg">
<script src="layout/scripts/js/jquery-1.6.2.min.js"></script>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php $fn = new Functions(); ?>      
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
   
    <div class="fl_right">    
      <ul class="nospace">
        <!-- <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li> -->
        <li><i class="fa fa-user"></i> <?php echo $_SESSION['username']; echo ', '. $fn->DateFormater(date('Y-m-d H:i:s'));?></li>
        <?php   if(!empty($_SESSION['username'])) {
          $fn->page_nav(array('url'=>'common/index','name'=>'Logout','active'=>$page,'visible'=>1)); 
        }
        else{
          $fn->page_nav(array('url'=>'common/login','name'=>'Login','active'=>$page,'visible'=>1)); 

        }?> 
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<?php require 'nav.php';