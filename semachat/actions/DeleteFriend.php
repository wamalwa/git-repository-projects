<?php
if(isset($_POST['con_id'])&& isset($_POST['friend_id']))
{
    include 'config.php';
    $friend_id=$_POST['friend_id'];
    $con_id=$_POST['con_id'];
        
    $addF="DELETE FROM `friends` WHERE (`friend_id`=".$friend_id." AND `con_id`=".$con_id.") OR (`friend_id`=".$con_id." AND `con_id`=".$friend_id.")";
     if(mysql_query($addF))
  {
      echo "Friend Deleted Successfully";
       
  }
    else
    {
         echo "Error Deleting friend:".  mysql_error();
    }
    
    
}

 else {
echo 'Error  in setting fields'.  mysql_error();    
}
?>
