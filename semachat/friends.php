<?php

session_start();
include 'actions/config.php';
$user_id = $_SESSION['user_id'];

                 
                    
$getfriends = "SELECT friends.friend_id, contacts.con_name, contacts.status_now FROM `friends` , contacts WHERE contacts.con_id = friends.friend_id AND friends.con_id =" . $user_id;

$execute = mysql_query($getfriends) or die(mysql_error());

  echo" <table style='width: 100%'><caption style='background-color: black;color: white'>Friends</caption> ";                 
                  while ($row = mysql_fetch_assoc($execute)) {
                        echo "<tr style='background-color:white;font-size:0.7em'><td><button id='viewChat' name='viewChat' onclick='GetChats(" . $row['friend_id'] . ")' style='width:220px;height:40px;font-size:1.0em'>"
                        . $row['con_name'] . "(" . $row['status_now'] . ")</button></td></tr>";
                    }
            echo"  </table>";

                  
?>
