<?php

if(isset($_POST['con_id'])&& isset($_POST['receiver'])&& isset($_POST['message']))
{ 
     include 'config.php';
    $con_id=filter_input(INPUT_POST, 'con_id', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $receiver=filter_input(INPUT_POST, 'receiver', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $message=filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);;
    $time=date(" g:i a,F j, Y");
    
  $postMessage="INSERT INTO `chats`(`chat_id`, `con_id`,`receiver`, `message`, `time_sent`) VALUES (NULL,"
               .$con_id.",".$receiver.",'".$message."','sent:".$time."')";
  
 
  if(mysql_query($postMessage))
  {
    $getNumber="SELECT  `message_number` FROM `friends` WHERE `friend_id` =".$con_id." AND `con_id` =".$receiver;
       $execute = mysql_query($getNumber) or die(mysql_error());
       $rows = mysql_num_rows($execute);
       $row = mysql_fetch_assoc($execute);
       if($rows!=0)
       {
           $update="UPDATE `friends` SET `message_number`=".($row['message_number']+1)." WHERE `con_id`=".$receiver." AND `friend_id`=".$con_id;
           
           if(mysql_query($update)){}
       }
  }
  else
  {
      echo 'Erro sending message';
  }

}
 else {
echo 'Error  in sending message'.  mysql_error();    
}
?>
