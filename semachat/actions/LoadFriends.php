<?php
if(isset($_POST['con_id']))
{
 include 'config.php';
$user_id = $_POST['con_id'];
//load all friends
$getfriends = "SELECT friends.friend_id,friends.message_number, contacts.con_name, contacts.status_now FROM `friends` , contacts WHERE contacts.con_id = friends.friend_id AND friends.con_id =" . $user_id;

$execute = mysql_query($getfriends) or die(mysql_error());

echo "<table style='width: 100%'>";
                  echo"<caption style='background-color: black;color: white'>Friends</caption>";                  
                    while ($row = mysql_fetch_assoc($execute)) {
                        echo "<tr style='background-color:white;font-size:0.7em'><td><button id='viewChat".$row['friend_id'] ."' name='viewChat".$row['friend_id'] ."' onclick='GetChats(" . $row['friend_id'] . ")' style='width:220px;height:40px;font-size:1.0em'><b>"
                        . $row['con_name'] . "</b>(<i>" . $row['status_now'] . "</i>)(<b>" . $row['message_number'] . "</b>)</button></td></tr>";
                  
                        }
                  
              echo "</table>";
}
 else {
    echo "No Friends";
}
?>
