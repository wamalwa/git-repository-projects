<?php
if(isset($_POST['chat_id']))
{
    include 'config.php';
    $chat_id=$_POST['chat_id'];
        
    $addF="DELETE FROM `chats` WHERE chat_id=".$chat_id;
     if(mysql_query($addF))
  {
      echo "Message Deleted successfully!";
       
  }
    else
    {
         echo "Error deleting Message:".  mysql_error();
    }
    
    
}

 else {
echo 'Error  in setting fields'.  mysql_error();    
}
?>
