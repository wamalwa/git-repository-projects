<?php

if(isset($_POST['screenName'])&& isset($_POST['newUsername'])&& isset($_POST['newPassword']))
{ 
    include ('config.php');
    $screenName=filter_input(INPUT_POST, 'screenName', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $newUsername=filter_input(INPUT_POST, 'newUsername', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $newPassword=filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);;
    $status=date('d-m-Y @ H:i',  time());
    
  $createAccount="INSERT INTO `contacts`(`con_id`,`con_name` ,`username` , `password` ,`status_now`) VALUES (NULL,'"
                  .$screenName."','".$newUsername."','".$newPassword."','".$status."')";
  
 
  if(mysql_query($createAccount))
  {
      echo "Account Successfully created!..You can now Login!";
       
  }
  else
  {
      echo 'Erro creating account';
  }

}
 else {
echo 'Error in creating account'.  mysql_error();    
}
?>