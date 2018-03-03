<?php

$hostname ="localhost";
$database ="semachat";
$username ="root";
$password ="";
$localhost = mysql_connect($hostname,$username,$password)
or
trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database, $localhost) or die(mysql_error());
?>
