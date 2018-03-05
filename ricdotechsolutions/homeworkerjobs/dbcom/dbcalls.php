<?php

#transType--------------meaning
# 0---------------------Login
# 1---------------------Register
# 2---------------------Create Account and Login
# 3---------------------Send Mail
# 4---------------------Get Order Details and put them on session for preview
# 5---------------------Order Now
# 6---------------------Update payment status
# 7---------------------
# 8---------------------keep order details in session sessionOrderDetails

if(isset($_POST['transType']) && $_POST['transType']==0 )
{
$result = "";
if(isset($_POST['emailaddress']) && isset($_POST['userpassword']))
{
$emailaddress = htmlspecialchars($_POST['emailaddress'], ENT_QUOTES);
$userpassword = htmlspecialchars($_POST['userpassword'], ENT_QUOTES);

include_once ("config.php");
include_once ("homeworkerjob_com.php");
$obj = new HomeWorkerJobsDAO();

$result = $obj->Login($emailaddress, $userpassword);

}
else {
$result = 'Login error!!!';
}
echo $result;
}

//register
if(isset($_POST['transType']) && $_POST['transType']==1 )
{
    $result = "";
    if (isset($_POST['surname']) &&
                    isset($_POST['firstname']) &&
                    isset($_POST['lastname']) &&
                    isset($_POST['phonenumber']) &&
                    isset($_POST['country']) &&
                    isset($_POST['emailaddress'])) {

    $surname= htmlspecialchars($_POST['surname'], ENT_QUOTES);
    $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
    $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
    $phonenumber = htmlspecialchars($_POST['phonenumber'], ENT_QUOTES);
    $country = htmlspecialchars($_POST['country'], ENT_QUOTES); 
    $emailaddress = htmlspecialchars($_POST['emailaddress'], ENT_QUOTES);

    include_once ("config.php");
    include_once ("homeworkerjob_com.php");
    $obj = new HomeWorkerJobsDAO();
    
    $obj->CreateAccount($emailaddress);    
    $result=$obj->Login($emailaddress, $obj->userpassword);
    if($result===0){
    $result = $obj->RegisterUser($surname, $firstname, $lastname, $phonenumber, $country, $obj->userId);
     }
    }
    else {
    $result = 'Registration error!!!'.  mysql_error();
    }
    echo $result;
}

//create a login account
if(isset($_POST['transType']) && $_POST['transType']==2 )
{
    $result = "";

    if (isset($_POST['emailaddress']) && isset($_POST['documenttype']) && isset($_POST['pagenumbers'])) {

    $emailaddress = htmlspecialchars($_POST['emailaddress'], ENT_QUOTES);

    include_once ("config.php");
    include_once ("homeworkerjob_com.php");
    $obj = new HomeWorkerJobsDAO();

    $result = $obj->CreateAccount($emailaddress);
    
    if($result==0)
    {
        session_start();
        $_SESSION["documenttype"] =$_POST['documenttype'] ; 
        $_SESSION["pagenumbers"] =$_POST['pagenumbers'];
        
       $result = $obj->userpassword; 
    }

    }
    else {
    $result = 'Create Account error!!!'.  mysql_error();
    }
    echo $result;
}



if(isset($_POST['transType']) && $_POST['transType']==3 )
{
    $result = "";
    if (isset($_POST['emailaddress'])) {
    $emailaddress = htmlspecialchars($_POST['emailaddress'], ENT_QUOTES);
    
    include_once ("config.php");
    include_once ("homeworkerjob_com.php");
    $obj = new HomeWorkerJobsDAO();
    
    $obj->sendMail($emailaddress,$obj->userpassword);
      $result=0;
    
    }
    else {
    $result = 'Send Mail error!!!'.  mysql_error();
    }
    echo $result;
}
if(isset($_POST['transType']) && $_POST['transType']==4 )
{
     $result = 1;
              
    if(isset($_POST['iduser']) && isset($_POST['surname']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phonenumber']) 
            &&    isset($_POST['country']) &&  isset($_POST['emailaddress'])&&  isset($_POST['totalcost'])){
    $iduser= htmlspecialchars($_POST['iduser'], ENT_QUOTES);   
    $surname= htmlspecialchars($_POST['surname'], ENT_QUOTES);
    $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
    $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
    $phonenumber = htmlspecialchars($_POST['phonenumber'], ENT_QUOTES);
    $country = htmlspecialchars($_POST['country'], ENT_QUOTES); 
    $emailaddress = htmlspecialchars($_POST['emailaddress'], ENT_QUOTES);
    
    #---order details--#
    $topic= htmlspecialchars($_POST['topic'], ENT_QUOTES);
    $typeofdocument = htmlspecialchars($_POST['typeofdocument'], ENT_QUOTES);
    $writing_style = htmlspecialchars($_POST['writing_style'], ENT_QUOTES);
    $SubujectArea = htmlspecialchars($_POST['SubujectArea'], ENT_QUOTES);
    $numberofpages = htmlspecialchars($_POST['numberofpages'], ENT_QUOTES); 
    $urgency = htmlspecialchars($_POST['urgency'], ENT_QUOTES);
    $language=htmlspecialchars($_POST['language'], ENT_QUOTES);
     $academic_level = htmlspecialchars($_POST['academic_level'], ENT_QUOTES);
    $instruction = htmlspecialchars($_POST['instruction'], ENT_QUOTES);
    $spacing = htmlspecialchars($_POST['spacing'], ENT_QUOTES); 
    $receivecalls = htmlspecialchars($_POST['receivecalls'], ENT_QUOTES);
    $uploadedfiles=$_POST['uploadedfiles'];
    #-- total cost--#
    
    $totalcost = htmlspecialchars($_POST['totalcost'], ENT_QUOTES);     
    include_once ("config.php");
    include_once ("homeworkerjob_com.php");
    $obj = new HomeWorkerJobsDAO();
    
   $result=  $obj->RegisterUser($surname, $firstname, $lastname, $phonenumber, $country, $iduser); 
  if($result===0){
    $result = $obj->getOrderDetails($surname,$firstname,$lastname,$phonenumber,$country,$emailaddress,
             $topic,$typeofdocument,$writing_style,$SubujectArea,$numberofpages,$urgency,$language,
             $academic_level,$instruction,$spacing,$receivecalls,$totalcost,$uploadedfiles);
   }
 else {
       $obj->updateUser($surname, $firstname, $lastname, $phonenumber, $country, $iduser);        
        $result = $obj->getOrderDetails($surname, $firstname, $lastname, $phonenumber, $country, $emailaddress,
                          $topic, $typeofdocument, $writing_style, $SubujectArea, $numberofpages, 
                          $urgency,$language, $academic_level, $instruction, $spacing, $receivecalls, $totalcost,$uploadedfiles);
   }
  
 }
    echo $result;
}
if(isset($_POST['transType']) && $_POST['transType']==5 )
{
 $result = "";
  $iduser= htmlspecialchars($_POST['iduser'], ENT_QUOTES);
     #---order details--#
    $orderno= htmlspecialchars($_POST['orderno'], ENT_QUOTES);
    $topic= htmlspecialchars($_POST['topic'], ENT_QUOTES);
    $typeofdocument = htmlspecialchars($_POST['typeofdocument'], ENT_QUOTES);
    $writing_style = htmlspecialchars($_POST['writing_style'], ENT_QUOTES);
    $SubujectArea = htmlspecialchars($_POST['SubujectArea'], ENT_QUOTES);
    $numberofpages = htmlspecialchars($_POST['numberofpages'], ENT_QUOTES); 
    $urgency = htmlspecialchars($_POST['urgency'], ENT_QUOTES);
    $language=htmlspecialchars($_POST['language'], ENT_QUOTES);
     $academic_level = htmlspecialchars($_POST['academic_level'], ENT_QUOTES);
    $instruction = htmlspecialchars($_POST['instruction'], ENT_QUOTES);
    $spacing = htmlspecialchars($_POST['spacing'], ENT_QUOTES); 
    $receivecalls = htmlspecialchars($_POST['receivecalls'], ENT_QUOTES);
    #-- total cost--#    
    $totalcost = htmlspecialchars($_POST['totalcost'], ENT_QUOTES);     
    include_once ("config.php");
    include_once ("homeworkerjob_com.php");
    $obj = new HomeWorkerJobsDAO();
	
	$result=$obj->OrderNow($iduser,$orderno,$topic,$typeofdocument,$SubujectArea,$numberofpages,$spacing,$urgency,$writing_style,$academic_level,$language,
             $instruction,$totalcost,$receivecalls);
echo $result;
}
if(isset($_POST['transType']) && $_POST['transType']==6 )
{
 $result = "";
   $iduser= htmlspecialchars($_POST['iduser'], ENT_QUOTES);
     #---order details--#
    $orderno= htmlspecialchars($_POST['orderno'], ENT_QUOTES);
    $statusid= htmlspecialchars($_POST['statusid'], ENT_QUOTES);
	
  include_once ("config.php");
    include_once ("homeworkerjob_com.php");
    $obj = new HomeWorkerJobsDAO();
	$result=$obj->updateStatus($statusid, $orderno,$iduser);
	
 echo $result;

}

if(isset($_POST['transType']) && $_POST['transType']==7 )
{	
 if(isset($_POST['fileno'])){
 $result = "";
    $fileno=$_POST['fileno'];
for($no=0;$no<$fileno;$no++)
{
    if(!empty($_FILES['uploadedfiles_'.$no]))
    {	
        $uploadedfiles=$_FILES['uploadedfiles_'.$no];       
        include_once ("config.php");
        include_once ("homeworkerjob_com.php");
        $obj = new HomeWorkerJobsDAO();	
        $result.=$obj-> uploadAttachments($uploadedfiles);
   
    }
    
}

 echo $result;
}
}


if(isset($_POST['transType']) && $_POST['transType']==8 )
{
  $orderno= htmlspecialchars($_POST['orderno'], ENT_QUOTES);;
  
 include_once ("config.php");
    include_once ("homeworkerjob_com.php");
    $obj = new HomeWorkerJobsDAO();
    
    $result=$obj->sessionOrderDetails($orderno);  
echo $result;
}





?>
