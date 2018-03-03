<?php 

function sendMail_back($email_from,$email_to, $subject, $message) {
        $success = 1;
        $email_to = $email_to;

        $body = 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

        if (@mail($email_to, $subject, $body, 'From: <' . $email_from . '>')) {
            $success = 0;
        } else {
            $success = 1;
        }
    }
    


function sendEmailAttachment($email_from,$name_from,$email_to, $subject, $bodytext,$file_to_attach,$filename,$bcc) {
require_once('smtpmail/PHPMailer.php');
$email = new PHPMailer();
$email->From      = $email_from;
$email->FromName  = $name_from;
$email->Subject   = $subject;
$email->Body      = $bodytext;
$email->AddAddress($email_to);

if(!empty($bcc)){
    $email->AddBCC($bcc);
}
$email->AddAttachment( $file_to_attach , $filename, 'base64', 'application/octet-stream');
return $email->Send();

}

function sendEmail($email_from,$name_from,$email_to, $subject, $bodytext,$bcc) {
require_once('smtpmail/PHPMailer.php');
$email = new PHPMailer();
$email->From      = $email_from;
$email->FromName  = $name_from;
$email->Subject   = $subject;
$email->Body      = $bodytext;
$email->AddAddress($email_to);

if(!empty($bcc)){
    $email->AddBCC($bcc);
}
return $email->Send();

}

//post data

$submitButton = $_POST['submitButton'];
// print_r($_POST);exit;

switch ($submitButton) {

	case 'Get a Quotation':
    	$today = date('d-m-Y');
    # formulate a message with quotation details
        $email_from ='sales@ricdotechsolutions.com';
        $bcc ='mamairichard@gmail.com';
        $name_from = 'Sales Manager';
        $email_to 	= trim($_POST['email']); 
        $name  		= trim($_POST['name']); 
        $phone 		= trim($_POST['phone']);    
        # attachment file path
        $file = 'attachments/Quotation.docx';
        $file_to_attach = 'attachments/Quotation.docx';
        $filename = 'Quotation.docx';
        $subject 	= 'Quotation Form';
        $message 	= 
       "Dear $name, 
           
        Thank you for inquiry for $today.
        We offer a 5% discount for more than 500 pieces at a time.
        We do country wide distribution at our own expenses.
        
        If you need any further details  meet your specific requirements kindly feel free to call or send us an email.
        Please download and fill the attached form and reply to this email by attaching the filled form. 
         
        Yours Faithfully,
        Sales Manager,
        Ric-Dotech Solutions"; 
     //$success = sendEmailWithAttatchment($email_from,$name_from,$email_to, $subject, $message,$file);
    // sendMail($email_from,$email_to, $subject, $message);
      $success = sendEmailAttachment($email_from,$name_from,$email_to, $subject, $message,$file_to_attach,$filename,$bcc);
     if($success===true){
        $responseMessage = array('status'=>'success',
            'data'=> 'An email has been successfully sent to your email account. Kindly check your account for more information.'); 
    }
    else{  
        $responseMessage = array('status'=>'danger','data'=> 'Failed to send Email. '. $success);
      }
      session_start();
     $_SESSION['message'] = $responseMessage;
     header('location:'.$_SERVER['HTTP_REFERER']);
break;

case 'Tell a Friend':

    $today = date('d-m-Y');
    $email_from ='sales@ricdotechsolutions.com';
    $bcc ='mamairichard@gmail.com';
    $name_from = 'Sales Manager';

    $femail  = trim($_POST['femail']); 
    $fname  = trim($_POST['fname']);

    $email   = trim($_POST['email']); 
    $name    = trim($_POST['name']); 
    $fsubject   = 'Welcome to Ric-Dotech Solutions';
    $fmessage    = "Dear $fname, 

     Welcome to Ric-Dotech Solutions, your friend $name has referred you to us and we are happy to invite you to check out what we offer at www.ricdotechsolutions.com.

        Yours Faithfully,
        Sales Manager,
        Ric-Dotech Solutions";
 

  
    $subject   = 'Thank you for the Referal';
    $message    = "Dear $name, 

     Thank you so much for believing in Ric-Dotech Solutions to the point of sending a referal to $fname. We asure you of our professional services at all times.

        Yours Faithfully,
        Sales Manager,
        Ric-Dotech Solutions";

   $success = sendEmail($email_from,$name_from,$femail, $fsubject, $fmessage,null);
     if($success===true){

        $success_ = sendEmail($email_from,$name_from,$email, $subject, $message,null);

        if($success_===true){ 
            $responseMessage = array(
            'status'=>'success',
            'data'=> "Thank you $name for your referal. Your Friend will receive a welcome email and we will take it up from there."); 
        }
       
    }
    else{  
        $responseMessage = array('status'=>'danger','data'=> 'Failed to send Email. '. $success);
      }
     session_start();
     $_SESSION['message'] = $responseMessage;
     header('location:'.$_SERVER['HTTP_REFERER']);

break;
default:
 $responseMessage = array('status'=>'danger','data'=> 'Invaid Request');
session_start();
     $_SESSION['message'] = $responseMessage;
     header('location:'.$_SERVER['HTTP_REFERER']);
 break;
}

// function sendEmailWithAttatchment($email_from,$name_from,$email_to, $subject, $htmlContent,$file){

//     try{
// //email body content
// $htmlContent = '<h1>PHP Email with Attachment by CodexWorld</h1>
//     <p>This email has sent from PHP script with attachment.</p>';

// //header for sender info
// $headers = "From: $name_from"." <".$email_from.">";

// //boundary 
// $semi_rand = md5(time()); 
// $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

// //headers for attachment 
// $headers .= '\nMIME-Version: 1.0\n' . 'Content-Type: multipart/mixed;\n' . " boundary=\"{$mime_boundary}\""; 

// //multipart boundary 
// $message = "--{$mime_boundary}\n" . 'Content-Type: text/html; charset=\"UTF-8\"\n' .
// 'Content-Transfer-Encoding: 7bit\n\n' . $htmlContent . "\n\n"; 

// //preparing attachment
// if(!empty($file) > 0){
//     if(is_file($file)){
//         $message .= "--{$mime_boundary}\n";
//         $data = chunk_split(base64_encode(file_get_contents($file)));
//         $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
//         'Content-Disposition: attachment;\n' . " filename=\"".basename($file)."\"; size=".filesize($file).';\n' . 
//         'Content-Transfer-Encoding: base64\n\n' . $data . '\n\n';
//     }
// }
// $message .= "--{$mime_boundary}--";
// $returnpath = '-f' . $email_from;

// //send email
//  if (@mail($email_to, $subject, $message, $headers, $returnpath)) {
//             $success = 0;
//         } else {
//             $success = 1;
//         }
//     }  
//     catch (Exception $e){
//        $success = $e->getMessage();
//     }
    
//     return $success;
        
// }