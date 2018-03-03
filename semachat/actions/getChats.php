<?php
if(isset($_POST['user_id'])&& isset($_POST['friend_id']))
{
    include 'config.php';
    $con_id=$_POST['user_id'];
    $friend_id=$_POST['friend_id'];
    
    $getchats="SELECT `chat_id`,chats.con_id,`con_name`,`message`, `time_sent` FROM `chats` LEFT JOIN contacts ON(contacts.con_id=chats.con_id) WHERE ((chats.con_id="
    .$friend_id." AND `receiver`=".$con_id.") OR (chats.con_id="
                .$con_id." AND `receiver`=".$friend_id.")) ORDER BY `chat_id` ASC" ;
    
    $execute = mysql_query($getchats) or die(mysql_error());
    $rows = mysql_num_rows($execute);
    if($rows==0)
    {
        echo 'Start Chat';
    }
    else
    {
       
        echo "<table style='width:750px'> ";
     while($row==mysql_fetch_assoc($execute)){  
         
	if($row['con_id']==$con_id)
	echo "<tr style='background-color:white;font-size:14px;'><td><b>".$row['con_name'].":</b>".$row['message']."</td><td>".$row['time_sent']."</td><td><button  onclick='DeleteMessage(".$row['chat_id'].")'>Detele</button></td></tr>";
	
	if($row['con_id']==$friend_id)
	echo "<tr style='background-color:black;color:white;font-size:14px;'><td><b>".$row['con_name'].":</b>".$row['message']." </td><td>".$row['time_sent']."</td><td><button  onclick='DeleteMessage(".$row['chat_id'].")'>Detele</button></td></tr>";
	
	}
        echo "</table>";
        
       $getNumber="SELECT  `message_number` FROM `friends` WHERE `friend_id` =".$friend_id." AND `con_id` =".$con_id;
       $execute = mysql_query($getNumber) or die(mysql_error());
       $rows = mysql_num_rows($execute);
       $row = mysql_fetch_assoc($execute);
       if($rows!=0)
       {
           $update="UPDATE `friends` SET `message_number`=0 WHERE `con_id`=".$con_id." AND `friend_id`=".$friend_id;
           
           if(mysql_query($update)){}
       } 
        
mysql_close();
    } 
}
else
{
    echo 'No contact seletced!';
}
        
?>
