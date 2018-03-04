<?php
$page_title="Bulk SMS  | Send SMS";
$head="Send SMS";
$currectPage='sendsms.php';
 include_once 'serverside/config.php';  
 include_once 'header.php';
 include_once('serverside/functions.php');
 $fn = new Functions();
 $allcontacts=$fn->GetAllmyConatcts();

