<?php
if(isset($_GET['q']))
{
     include 'config.php';
    $con_id=$_GET['q'];    
    $time=date(" g:i a,F j, Y");    
     $updatestatus="UPDATE `contacts` SET `status_now`='Last seen:".$time."'  WHERE `con_id`=".$con_id;
        
        if(mysql_query($updatestatus))
            {
             header("location:http://localhost/semachat/index.php");
            }
    
}
else
{
    echo 'Error Logging out!';
}

?>
