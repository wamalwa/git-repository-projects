<?php

if(isset($_POST['search']) && !empty($_POST['search']))
{
    session_start();
    $_SESSION['search']=$_POST['search'];
    
    header('location:../index.php');
}

