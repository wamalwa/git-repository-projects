<?php
 include_once '../serverside/config.php';
include_once('../serverside/functions.php');
$fn=new Functions();
$_SESSION['message']='';

//check if the input is 
if(isset($_POST['myusername']) && !empty($_POST['myusername']) 
  && isset($_POST['mypassword']) && !empty($_POST['mypassword']))
{
    session_destroy();
    session_start();
    $_SESSION['myusername']=$_POST['myusername'];
    $username=$_POST['myusername'];
    $password=$_POST['mypassword'];
    $user_type='tenant2';
    //clean the input to prevent sql iinjection
//    $username=  trim($username);
//    $password=  trim($password);
    //call  login
   $userdetails= $fn->Login($username, $password);
    $fields = explode(":", $userdetails);

    if(!empty($fields[1])){
        
    $_SESSION['fields']=$fields;
    //check if its tenant
    if($fields[1]=='Tenant'){
    header('location:../tenant/index.php');
    }
    //check if its landlord
    else if($fields[1]=='Landlord'){
         header('location:../landlord/index.php');
    }
    else{
          $_SESSION['message']=$fields[1]." Portal Still under construction";
             header('location:../portal.php');
    }
  
    }
    //none of the above
    else {

         $_SESSION['message']='Invalid username or password or both';
        header('location:../portal.php');
}
}
//no input data
 else {
     $_SESSION['message']='Please fill all the data before submitting';
        header('location:../portal.php');
}

