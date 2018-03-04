<?php
require 'config.php'; 
require('functions.php');
$fn = new Functions();



if(!empty($_GET['type']) && isset($_GET['type'])){
   
    
     $postCode=$_GET['postCode'];  
      $link=$_GET['link'];
      
    if($_GET['type']=='linkUrl'){
             
     $fn->CountLinkClicks($postCode);
     header("location:".$link); 
     exit;
    }
    
   if($_GET['type']=='LikePost'){       
     $postCode=$_GET['postCode'];      
     $fn->CountLikes($postCode);
     header("location:".$link);
     exit;
   }
   //postCount
    if($_GET['type']=='postCount'){       
     $postCode=$_GET['postCode'];      
     $fn->CountClick($postCode);
     header("location:".$link."?postCode=$postCode"); 
     exit;
   }
    
}

if(!empty($_POST['actiontype']) && isset($_POST['actiontype'])){
  
    if($_POST['actiontype']=='PostComment'){  
       
        $postCode=trim($_POST['postCode']); 
        $visitorsname=trim($_POST['visitorsname']);
        $emailaddress=trim($_POST['emailaddress']); 
        $message_body=trim($_POST['message_body']); 
    echo $fn->PostComment($postCode,$visitorsname,$emailaddress,$message_body);
       
  exit;  
  }
}

