<?php

class db{
    
    function __construct() {
        $hostname ="localhost";
        $database ="richkel";
        $username ="root";
        $password ="";
//        $hostname ="richkelproperties.com";
//        $database ="richkel1_properties";
//        $username ="richkel1_jp";
//        $password ="Maisha@123";
        $localhost = mysql_connect($hostname,$username,$password)
        or
        trigger_error(mysql_error(),E_USER_ERROR); 
        
        mysql_select_db($database, $localhost) or die(mysql_error());
}

    
}

//  $hostname ="richkelproperties.com";
//        $database ="richkel1_properties";
//        $username ="richkel1_jp";
//        $password ="Maisha@123";