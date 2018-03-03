<?php
if(isset($_POST['con_id'])&& isset($_POST['friend_id']))
{
    include 'config.php';
    $friend_id=$_POST['friend_id'];
    $con_id=$_POST['con_id'];
        
    $addF="INSERT INTO friends(`f_id`,`con_id`,`friend_id`) VALUE(NULL,".$con_id.",".$friend_id.");";
     if(mysql_query($addF))
  {
      echo "New Friend Successfully added";
       
  }
    else
    {
         echo "Error adding friend:".  mysql_error();
    }   
    
}

 else {
echo 'Error  in setting fields'.  mysql_error();    
}


?>
