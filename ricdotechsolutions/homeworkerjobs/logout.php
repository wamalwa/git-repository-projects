<?php

    session_start();
   if(!empty($_SESSION["UserID"]) && !empty($_SESSION["firstName"]))
       {
          session_destroy();
           header("location:index.php");
       }
          header("location:index.php");  
?>
