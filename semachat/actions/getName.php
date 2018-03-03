<?php
if (isset($_POST['friend_id'])) {
    include 'config.php';
    
    $friend_id=$_POST['friend_id'];
    $getname=  mysql_query("SELECT `con_name` FROM `contacts` WHERE con_id=".$friend_id);
    $rows = mysql_num_rows($getname);
    $row = mysql_fetch_assoc($getname);
    
    if($rows!=0)
    {
        echo $row['con_name'];
    }
}
 else {
echo "No Name";    
}
?>
