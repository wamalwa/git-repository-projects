<?php
//error_reporting(E_ALL);
#this file is used to control all the actions for post and get which the web application usses.
include_once  'config.php';
include_once  'functions.php';
$fn           = new Functions();
$referer      = 'location:'.$_SERVER['HTTP_REFERER'];
$urlParams    = explode('?', $_SERVER['HTTP_REFERER']);
$rootUrl = 'location:'.$urlParams[0].'?r=';
$responseMessage = array('status'=>'danger','data'=>'Failed to Process Request. Caused by Invalid Request or you are not Authorized to perform this action.');
// print_r($_POST);
// print_r('<hr>');
// print_r($_FILES['uploadedfiles']);
// exit;
if(!empty($_POST['actiontype'])&& (!empty($_SESSION['username'])|| $_POST['actiontype']==='login'|| $_POST['actiontype']==='AddNewOrder'|| $_POST['actiontype']==='clientRegistration')){
    
$actionType = $_POST['actiontype'];  
    //login action

switch($actionType){
    
case 'login':
            //check if the input is 
    if(isset($_POST['myusername']) && !empty($_POST['myusername']) 
      && isset($_POST['mypassword']) && !empty($_POST['mypassword']))
    {
        session_destroy(); #clear old session
        session_start(); # start a new session

        $username = trim($_POST['myusername']);
        $password = trim($_POST['mypassword']);

        //call  login from functions.php
       $userdetails = $fn->Login($username, $password); 

          if(!empty($userdetails['username'])){ 
              $responseMessage       = array('status'=>'success','data'=> 'Welcome '.$userdetails['firstname'].' to your dashboard.');
               $_SESSION['message'] = $responseMessage;
               $_SESSION['userdetails']   = $userdetails;
               $_SESSION['username'] = $userdetails['username'];
               
               if($userdetails['active']===0 || $userdetails['active']=='0'){
                    header($rootUrl.'pages/changepassword&p=Password Change');                   
               } 
               //blocked user
               else if($userdetails['active']===2 || $userdetails['active']=='2'){
               $responseMessage       = array('status'=>'danger','data'=> 'Sorry your account has been blocked from accessing the system services. Please contact your Adminimistrator for further action.');
               $_SESSION['message'] = $responseMessage; 
               header($referer);                   
               }
               else{
                   //check if the user is client or admin
                   if($userdetails['user_type']==='Admin'){                       
                    header($rootUrl.'pages/admindashboard&p=Admin Dashboard');
                   }
                   else{                       
                    header($rootUrl.'pages/home&p=My Dashboard');
                   }                   
               }
          }
          else{
               $responseMessage       = array('status'=>'danger','data'=> 'Login Failed! Username or password are incorrect.Please try again.'. $response);
               $_SESSION['message'] = $responseMessage; 
               header($referer);
          }

    }
break;

case 'ChangePassword':
     if(isset($_POST['current_password'])===true && !empty($_POST['current_password'])===true) {
            $current_password    = trim($_POST['current_password']);
            $new_password        = trim($_POST['new_password']);
            $response            = $fn->ChangePassword($current_password,$new_password);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'Password Changed Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($rootUrl.'pages/home&p=My Dashboard');
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Change Passowrd. Please ensure you have entered the correct current password '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

break;
 //AddNewModule action
case 'AddNewModule':      
       //check input
     if(isset($_POST['roleName'])===true && !empty($_POST['roleName'])===true) {

            $roleName         = trim($_POST['roleName']);
            $roleDescription  =  trim($_POST['roleDescription']);
            $response         = $fn->AddNewModule($roleName,$roleDescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'New Module '.$roleName  .' Added Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Add New module. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }
    break;
case 'AddNewService': 
         //AddNewService     
       //check input
     if(isset($_POST['servicename'])===true && !empty($_POST['servicename'])===true) {

            $servicename         = trim($_POST['servicename']);
            $serviceDescription  =  trim($_POST['serviceDescription']);
            $response         = $fn->AddNewService($servicename,$serviceDescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'New Service '.$servicename  .' Added Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Add New Service. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }
     break;
case 'UpdateService':
     //UpdateService     
       //check input
     if(isset($_POST['id'])===true && !empty($_POST['id'])===true) {
            $id                  = trim($_POST['id']);
            $servicename         = trim($_POST['servicename']);
            $serviceDescription  =  trim($_POST['serviceDescription']);
            $response            = $fn->UpdateService($id,$servicename,$serviceDescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'Service '.$servicename  .' Updated Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Update Service. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

break;
  // AddNewPaperType
case 'AddNewPaperType':       
       //check input
     if(isset($_POST['typename'])===true && !empty($_POST['typename'])===true) {

            $typename         = trim($_POST['typename']);
            $typedescription  =  trim($_POST['typedescription']);
            $response         = $fn->AddNewPaperType($typename,$typedescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'New Paper Type '.$typename  .' Added Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Add New Paper Type. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

      break;
  //UpdatePaperType 
case 'UpdatePaperType':
     //UpdateService     
       //check input
     if(isset($_POST['id'])===true && !empty($_POST['id'])===true) {
            $id               = trim($_POST['id']);
            $typename         = trim($_POST['typename']);
            $typedescription  =  trim($_POST['typedescription']);
            $response         = $fn->UpdatePaperType($id,$typename,$typedescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'Paper Type '.$typename  .' Updated Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Update Paper Type. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

break;
//AddNewSubjectArea
case 'AddNewSubjectArea':       
       //check input
     if(isset($_POST['subjectname'])===true && !empty($_POST['subjectname'])===true) {

            $subjectname         = trim($_POST['subjectname']);
            $subjectdescription  =  trim($_POST['subjectdescription']);
            $response         = $fn->AddNewSubjectArea($subjectname,$subjectdescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'New Subject Area '.$subjectname  .' Added Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Add New Subject Area. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

      break;
//UpdateSubjectArea
case 'UpdateSubjectArea':  
       //check input
     if(isset($_POST['id'])===true && !empty($_POST['id'])===true) {
            $id                  = trim($_POST['id']);
            $subjectname        = trim($_POST['subjectname']);
            $subjectdescription =  trim($_POST['subjectdescription']);
            $response            = $fn->UpdateSubjectArea($id,$subjectname,$subjectdescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'Subject Area '.$subjectname  .' Updated Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Update Subject Area. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

break;
//AddNewCountry
case 'AddNewCountry':      
       //check input
     if(isset($_POST['country_name'])===true && !empty($_POST['country_name'])===true) {

            $country_name  = trim($_POST['country_name']);
            $currencycode  =  trim($_POST['currencycode']);
            $currencyname  =  trim($_POST['currencyname']);
            $country_description  =  trim($_POST['country_description']);
            $response         = $fn->AddNewCountry($country_name,$currencycode,$currencyname,$country_description);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'New Country '.$country_name  .' Added Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Add New Country. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

      break;
 // UpdateCountry
case 'UpdateCountry':
     //UpdateService     
       //check input
     if(isset($_POST['id'])===true && !empty($_POST['id'])===true) {
            $id                  = trim($_POST['id']);
            $country_name  = trim($_POST['country_name']);
            $currencycode  =  trim($_POST['currencycode']);
            $currencyname  =  trim($_POST['currencyname']);
            $country_description  =  trim($_POST['country_description']);
            $response            = $fn->UpdateCountry($id,$country_name,$currencycode,$currencyname,$country_description);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'Country '.$country_name  .' Updated Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Update Country. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

break;     
//AddNewAcademicLevel    
case 'AddNewAcademicLevel':      
       //check input
     if(isset($_POST['levelname'])===true && !empty($_POST['levelname'])===true) {

            $levelname         = trim($_POST['levelname']);
            $levelDescription  =  trim($_POST['levelDescription']);
            $response         = $fn->AddNewAcademicLevel($levelname,$levelDescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'New Academic Level '.$levelname  .' Added Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Add New Academic Level. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

      break;  
 //UpdateAcademicLevel
case 'UpdateAcademicLevel':  
       //check input
     if(isset($_POST['id'])===true && !empty($_POST['id'])===true) {
            $id                  = trim($_POST['id']);
            $levelname        = trim($_POST['levelname']);
            $levelDescription  =  trim($_POST['levelDescription']);
            $response            = $fn->UpdateAcademicLevel($id,$levelname,$levelDescription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'Academic Level '.$levelname  .' Updated Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Update Academic Level. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

break;
//AddNewUrgencyLevel
case 'AddNewUrgencyLevel':     
       //check input
     if(isset($_POST['urgency_value'])===true && !empty($_POST['urgency_value'])===true) {

            $urgency_value         = trim($_POST['urgency_value']);
            $urgency_name  =  trim($_POST['urgency_name']);
            $desscription  =  trim($_POST['desscription']);
            $response         = $fn->AddNewUrgencyLevel($urgency_value,$urgency_name,$desscription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'New Urgency Details '.$urgency_value  .' '.$urgency_name.' Added Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Add New Urgency Details. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

      break;
case 'UpdateUrgencyLevel':    
       //check input
     if(isset($_POST['id'])===true && !empty($_POST['id'])===true) {
            $id                  = trim($_POST['id']);
            $urgency_value  = trim($_POST['urgency_value']);
            $urgency_name  =  trim($_POST['urgency_name']);
            $desscription  =  trim($_POST['desscription']);
            $response            = $fn->UpdateUrgencyLevel($id,$urgency_value,$urgency_name,$desscription);
          }
      if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'Urgency Details '.$urgency_value  .' '.$urgency_name.' Updated Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Update Urgency Details. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

break; 
//AddNewOrder 
case 'AddNewOrder':     
       //check input
     if(isset($_POST['email_address'])===true && !empty($_POST['email_address'])===true) {
         //order details
            $type_service =  trim($_POST['type_service']);
            $paper_type   =  trim($_POST['paper_type']);
            $page_numbers =  trim($_POST['page_numbers']);
            $academic_level =  trim($_POST['academic_level']);
            $subjectname =  trim($_POST['subjectname']);
            $urgency_level  =  trim($_POST['urgency_level']);
            $topic =  trim($_POST['topic']);
            $topicdescription =  trim($_POST['topicdescription']);
            $spacing  =  trim($_POST['spacing']);
            $order_instructions  =  trim($_POST['order_instructions']);
            $total_price  =  trim($_POST['total_price']);
            $languagestyle  =  trim($_POST['languagestyle']);
            $writing_format  =  trim($_POST['writing_format']);
            
            //cleint deatils
            $email_address  = trim($_POST['email_address']);
            $firstname      =  trim($_POST['firstname']);
            $lastname       =  trim($_POST['lastname']);
            $gender         =  trim($_POST['gender']);
            $country        =  trim($_POST['country']);
            $phone_number   =  trim($_POST['phone_number']);
            $new_password   =  trim($_POST['new_password']);
            $new_client_response  = $fn->AddNewClient($email_address,$firstname,$lastname,$gender,$country,
                    $phone_number,$new_password);
            if($new_client_response==='Succsesfull'){
                
            $order_no = mt_rand(100,999).date('dHis');
            $new_order_response  = $fn->AddNewOrder($order_no,$type_service,$paper_type,$page_numbers,$subjectname,
                    $academic_level,$urgency_level,$topic,$topicdescription,$spacing,$order_instructions,
                    $total_price,$email_address,$languagestyle,$writing_format);
            }
            //attachments            
            $uploadedfiles  = $_FILES['uploadedfiles'];
            if(!empty($_FILES['uploadedfiles'])===true){ 
             $new_files_response  = $fn->AddNewFiles($order_no,$uploadedfiles,$email_address);
            }
          }
      if($new_order_response==='Succsesfull'){
         //send an email
          $email_to = $email_address;
          $subject = 'Successful Application for New order Number '.$order_no;
          $message = 'Congratulations your New Order has been received successfully.'
                  . 'A new account has been created for you to track the progress of your order and more please use the following details as your login here http://localhost/gradebucks/index.php?r=common/login&p=Login  "\n\n"  Email Address: '
                  . $email_to . '"\n\n" Password:'
                  . $new_password . '"\n\n"Please remember to change it the first time you login to secure your account."\n\n" Best Regards,"\n\n\n"Gradebucks';
          $sent_status = $fn->sendMail($email_to, $subject, $message);
          $responseMessage = array('status'=>'success','data'=> 'Dear <b>'.$firstname.' '.$lastname.'</b> thank you for placing an order with us. You are just a step away. An email has also been sent to your account with login credentials and more instructions');  
          $_SESSION['message'] = $responseMessage;
           header($rootUrl.'common/payment~id=' .$order_no . '&p=Almost there,Final Step!');
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Create New order. '. $new_order_response.',  '.$new_client_response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

      break;
//ADD USER GROUP action
case 'addUsergroup':  
  //check input
 if(isset($_POST['groupName'])===true && !empty($_POST['groupName'])===true) {

        $groupName        = trim($_POST['groupName']);
        $groupDescription = trim($_POST['groupDescription']);
       
        $fn->log("Action: ".$_POST['actiontype']." Call AddUsergroup($groupName,$groupDescription) function"); 
        $response = $fn->AddUsergroup($groupName,$groupDescription);            
        $responseMessage      = array('status'=>$response,'data'=> '');
      }
      
 $fn->log("Action: ".$_POST['actiontype']." echo response : $responseMessage and exit action");  
echo json_encode($responseMessage);
        
 exit;
 break;
//adduser
//ADD USER GROUP action
case 'clientRegistration':      
   //check input
 if(!empty($_POST['lastname'])===true) {

        $lastname         = trim($_POST['lastname']);
        $firstname        = trim($_POST['firstname']);
        $phonenumber      = trim($_POST['phonenumber']);
        $emailaddress     = trim($_POST['emailaddress']);
        $country          = trim($_POST['country']);
        $gender           = trim($_POST['gender']);
        $response         = $fn->ClientRegistration($lastname,$firstname,$phonenumber,$emailaddress,$country,$gender);

      }

      if($response==='Succsesfull'){
          $responseMessage       = array('status'=>'success','data'=> 'Thank you for Registering with Us,your login credentials have been sent to your email. Check your email to continue.');
           $_SESSION['message'] = $responseMessage; 
           header($rootUrl.'common/thankyou&p=Congratulations!');
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Register Client due to '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }
      break;
//MyNewOrder  
case 'MyNewOrder':     
       //check input
     if(isset($_POST['topic'])===true && !empty($_POST['topic'])===true) {
         //order details
            $type_service   =  trim($_POST['type_service']);
            $paper_type     =  trim($_POST['paper_type']);
            $page_numbers   =  trim($_POST['page_numbers']);
            $academic_level =  trim($_POST['academic_level']);
            $subjectname    =  trim($_POST['subjectname']);
            $urgency_level  =  trim($_POST['urgency_level']);
            $topic          =  trim($_POST['topic']);
            $topicdescription =  trim($_POST['topicdescription']);
            $spacing             =  trim($_POST['spacing']);
            $order_instructions  =  trim($_POST['order_instructions']);
            $total_price         =  trim($_POST['total_price']);
            $languagestyle       =  trim($_POST['languagestyle']);
            $writing_format      =  trim($_POST['writing_format']);
          
            $order_no = mt_rand(100,999).date('dHis');
            $new_order_response  = $fn->AddMyNewOrder($order_no,$type_service,$paper_type,$page_numbers,$subjectname,
                    $academic_level,$urgency_level,$topic,$topicdescription,$spacing,$order_instructions,
                    $total_price,$languagestyle,$writing_format);
          
            //attachments            
            $uploadedfiles  = $_FILES['uploadedfiles'];
            if(!empty($_FILES['uploadedfiles'])===true){ 
             $new_files_response  = $fn->AddMyNewFiles($order_no,$uploadedfiles);
            }
          }
      if($new_order_response==='Succsesfull'){
         //send an email
          $userdetails = $_SESSION['userdetails'];
          $email_to = $userdetails['email_address'];
          $firstname = $userdetails['firstname'];
          $lastname = $userdetails['lastname'];
          $subject = 'Successful Application for New order Number '.$order_no;
          $message = 'Congratulations your New Order has been received successfully.'
                  . 'A new account has been created for you to track the progress of your order and more please use the following link http://localhost/gradebucks/index.php?r=common/login&p=Login to login to your account to track your order processing.'
                  . '"\n\n" Best Regards,"\n\n\n"Gradebucks';
          $sent_status = $fn->sendMail($email_to, $subject, $message);
          $responseMessage = array('status'=>'success','data'=> 'Dear <b>'.$firstname.' '.$lastname.'</b> thank you for placing an order with us. You are just a step away. An email has also been sent to your account with more instructions');  
          $_SESSION['message'] = $responseMessage;
           header($rootUrl.'common/payment~id=' .$order_no . '&p= Almost there,Final Step!');
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Create New order. '. $new_order_response.',  '.$new_client_response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

      break;
   //SubmitMyRevision   
 case 'SubmitMyRevision':     
       //check input
     if(isset($_POST['order_no'])===true && !empty($_POST['order_no'])===true) {
         //order details
            $revision_description   =  trim($_POST['revision_description']);
            $urgency_level  =  trim($_POST['urgency_level']);
            $order_no =  trim($_POST['order_no']);
            $new_order_response  = $fn->SubmitMyRevision($order_no,$revision_description,$urgency_level);          
            //attachments            
            $uploadedfiles  = $_FILES['uploadedfiles'];
            if(!empty($_FILES['uploadedfiles'])===true){ 
             $new_files_response  = $fn->AddRevisionFiles($order_no,$uploadedfiles);
            }
          }
      if($new_order_response==='Succsesfull'){
         //send an email
          $userdetails = $_SESSION['userdetails'];
          $email_to = $userdetails['email_address'];
          $firstname = $userdetails['firstname'];
          $lastname = $userdetails['lastname'];
          $subject = 'Successful Application for Revision order Number '.$order_no;
          $message = 'Congratulations your Order Revision has been received successfully.'
                  . 'For more information please use the following link http://localhost/gradebucks/index.php?r=common/login&p=Login to login to your account to track your order processing.'
                  . '"\n\n" Best Regards,"\n\n\n"Gradebucks';
          $sent_status = $fn->sendMail($email_to, $subject, $message);
          $responseMessage = array('status'=>'success','data'=> 'Dear <b>'.$firstname.' '.$lastname.'</b> thank you for making a revision of the order, our team is looking at it and will get back to you immediately.');  
          $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to send Revision for order. '. $new_order_response.',  '.$new_client_response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }

      break;   

  case 'SubmitMyTestionial':      
   //check input
 if(!empty($_POST['testimony_description'])===true) {

        $testimony_description         = trim($_POST['testimony_description']);
        $order_no        = trim($_POST['order_no']);
        $response         = $fn->SubmitMyTestionial($testimony_description,$order_no);

      }

      if($response==='Succsesfull'){
          $responseMessage       = array('status'=>'success','data'=> 'Thank you for your Testimony. We are glad we shall continue providing you with the best services.');
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Register Client due to '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }
      break;
  case 'AddUser':
      if(!empty($_POST['lastname'])===true) {  
          
        unset($_POST['actiontype']);        
        $table = 'tbusers';
        $_post_data = $_POST;
        $userpassword = $fn->hashPIN(mt_rand(100000, 999999)); 
        $other_data = array();
        $other_data['username'] = strtolower($_post_data['lastname'].'.'.$_post_data['firstname']);  
        $other_data['userpassword'] = $userpassword;
        $other_data['active'] = 0;
        $other_data['createdON'] =  $fn->dateToday;
        $other_data['createdBY']=  $fn->userid;
        $post_data = array_merge($_post_data, $other_data);
        $response = $fn->save($table,$post_data);
        
  if($response==='Succsesfull'){
          $responseMessage      = array('status'=>'success','data'=> 'New user'.$levelname  .' Updated Successfully!');
           $_SESSION['message'] = $responseMessage;
           header($referer);
      }
      else{
          $responseMessage       = array('status'=>'danger','data'=> 'Failed to Update Academic Level. '. $response);
           $_SESSION['message'] = $responseMessage; 
           header($referer);
      }
      } 
      
      
 break;     
default :
        $responseMessage = array('status'=>'danger','data'=>'Failed to Process Request. We could not process your action type.');
         $_SESSION['message'] = $responseMessage; 
        header($referer);
        break;
}
    
}

else
{
  $_SESSION['message'] = $responseMessage; 
  header($referer);
}
