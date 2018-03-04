<?php

//use db;

class Functions
{
     //constructor
     function __construct() {
       $db= new db();
         session_start();
     }
     
     //get the last three properties
    function GetSlides()
    {
        $propertydetails=array();
        $sql="SELECT (SELECT  `imagepath` FROM `tbimages` WHERE `propertyno`=Property_no AND imagepath is not null LIMIT 0,1) AS imagepath,"
                . "`PropertyName`,`description` FROM `property` WHERE active=1 ORDER BY _id DESC  LIMIT 0 , 3";
        $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        {
             $rowcount=0;
            //returns an array of property details
            while($rowcount<$num_rows){                
                $rowdata=mysql_fetch_array($execute);
//                var_dump($rowdata); exit();
                $data=$rowdata['imagepath'].":".$rowdata['PropertyName'].":".$rowdata['description'];      
                array_push($propertydetails, $data); 
                $rowcount++;
            }
        }
      return $propertydetails;  
    }
    
    //get new properties. It gets the last thress new properties
 function GetNewProperties()
 {
        $propertydetails=array();
        $sql="SELECT (SELECT  `imagepath` FROM `tbimages` WHERE `propertyno`=Property_no AND imagepath is not null LIMIT 0,1) AS imagepath,"
                . "`PropertyName`,`description`,`Property_no` FROM `property` WHERE active=1 ORDER BY _id DESC  LIMIT 0 , 3";
        $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        {
             $rowcount=0;
            //returns an array of property details
            while($rowcount<$num_rows){                
                $rowdata=mysql_fetch_array($execute);
//                var_dump($rowdata); exit();
                $data=$rowdata['imagepath'].":".$rowdata['PropertyName'].":".$rowdata['description'].":".$rowdata['Property_no'];      
                array_push($propertydetails, $data); 
                $rowcount++;
            }
        }
      return $propertydetails;  
    }
   //get all the properties  
 function GetAllProperties()
 {
      error_reporting(0);
    
     $search='';
     if(!empty($_SESSION['search']))
     {
         $search.=" AND PropertyName LIKE '%".$_SESSION['search']."%'";
         session_destroy();
     }
  session_destroy();
        $propertydetails=array();
        $sql="SELECT (SELECT  `imagepath` FROM `tbimages` WHERE `propertyno`=Property_no AND imagepath is not null LIMIT 0,1) AS imagepath,"
                . "`PropertyName`,`description`,`Property_no` FROM `property` WHERE active=1 $search ORDER BY _id DESC";
        $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        {
             $rowcount=0;
            //returns an array of property details
            while($rowcount<$num_rows){                
                $rowdata=mysql_fetch_array($execute);
//                var_dump($rowdata); exit();
                $data=$rowdata['imagepath'].":".$rowdata['PropertyName'].":".$rowdata['description'].":".$rowdata['Property_no'];      
                array_push($propertydetails, $data); 
                $rowcount++;
            }
        }
      return $propertydetails;  
    }
   
    //get available properties to be rented
   function GetAvailableProperties(){
     
   $propertydetails=array();//initiate an array
        $sql="SELECT DISTINCT A.propertyno,(SELECT  `imagepath` FROM `tbimages` 
	WHERE `propertyno`=B.Property_no AND imagepath is not null LIMIT 0,1) AS imagepath,B.`PropertyName`,B.`description`
	FROM `room` A INNER JOIN property B ON ( A.propertyno = B.`Property_no` )
        WHERE (A.active =0 AND B.active=1) ORDER BY B._id DESC  LIMIT 0 , 3";
        $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        {
             $rowcount=0;
            //returns an array of property details
            while($rowcount<$num_rows){                
                $rowdata=mysql_fetch_array($execute);
//                var_dump($rowdata); exit();
                $data=$rowdata['imagepath'].":".$rowdata['PropertyName'].":".$rowdata['description'].":".$rowdata['propertyno'];      
                array_push($propertydetails, $data); 
                $rowcount++;
            }
        }
      return $propertydetails; 
   } 
   
   //get all property details
   function GetPropertyDetails($propertyNo){
       
       $propertydetails=array();//initiate an array
        $sql="SELECT (SELECT  `imagepath` FROM `tbimages` WHERE `propertyno`=Property_no AND imagepath is not null LIMIT 0,1) AS imagepath,"
                . "`PropertyName`,`description`,`location`, `physicaladdress`, `numberofrooms`, `numberoffloors`  "
                . "FROM `property` WHERE `Property_no`='$propertyNo' AND `active`=1";
        $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        {
             $rowcount=0;
            //returns an array of property details
            while($rowcount<$num_rows){                
                $rowdata=mysql_fetch_array($execute);
                $data=$rowdata['imagepath'].":".$rowdata['PropertyName'].":".$rowdata['description'].":".$rowdata['location'].":"
                        .$rowdata['physicaladdress'].":".$rowdata['numberofrooms'].":".$rowdata['numberoffloors'];      
                array_push($propertydetails, $data); 
                $rowcount++;
            }
        }
      return $propertydetails; 
   }
  
     //get all property details
   function GetPRoomDetails($_id){
       
       $roomdetails=array();//initiate an array
        $sql="SELECT room.`_id`,(SELECT  `imagepath` FROM `tbimages` WHERE `roomnumber`=room.roomnumber AND imagepath is not null LIMIT 0,1) AS imagepath, `roomnumber`,room.`propertyno`, B.`PropertyName`,`floornumber`,
              room.`description`,rentgroup.`amount`   FROM room INNER JOIN rentgroup ON (rentgroup.rentgroupid=room.rentgroupid) INNER JOIN `property` B ON(room.`propertyno`=B.`Property_no`) WHERE room.`_id`='".$_id."'";
        $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        {
             $rowcount=0;
            //returns an array of property details
            while($rowcount<$num_rows){                
                $rowdata=mysql_fetch_array($execute);
                $data=$rowdata['_id'].":".$rowdata['imagepath'].":".$rowdata['roomnumber'].":".$rowdata['propertyno'].":"
                        .$rowdata['PropertyName'].":".$rowdata['floornumber'].":".$rowdata['description'].":".$rowdata['amount'];      
                array_push($roomdetails, $data); 
                $rowcount++;
            }
        }
      return $roomdetails; 
   }
  
   
  function GetAllRoomsforthisPropertyPerFloor($propertyNo,$floorId)
  {
        $roomdetails=array();//initiate an array
        $sql="SELECT `_id`, (SELECT  `imagepath` FROM `tbimages` WHERE `roomnumber`=room.roomnumber AND imagepath is not null LIMIT 0,1) AS imagepath, `roomnumber`, room.`description`,rentgroup.`amount`   FROM room INNER JOIN rentgroup ON (rentgroup.rentgroupid=room.rentgroupid)  WHERE active=1 AND floornumber ="
             .$floorId." AND  room.propertyno='".$propertyNo."'";
        $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        {
             $rowcount=0;
            //returns an array of property details
            while($rowcount<$num_rows){                
                $rowdata=mysql_fetch_array($execute);
                $data=$rowdata['imagepath'].":".$rowdata['roomnumber'].":".$rowdata['description'].":".$rowdata['amount'].":"
                        .$rowdata['_id'];      
                array_push($roomdetails, $data); 
                $rowcount++;
            }
        }
      return $roomdetails; 
  }
   
  function GetFloorName($id)
  {
      $floorname='';
      $sql='SELECT `floorid`, `floorname` FROM `floors` WHERE floorid='.$id;
       $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        { 
            $rowdata=mysql_fetch_array($execute);
            $floorname=$rowdata['floorname'];
        }else
        {
            $floorname=$id; 
        }
        return $floorname;
  }
  
  //display functions 
  //load the main menu and check which is active
 function LoadMenu($activepage)
 {
     if($activepage=='index.php'){
         
     }
     else{
    echo ' <!--//search-scripts--> <!--navigation-starts--> <div class="navigation"><span class="menu"></span> 
            <ul class="navig cl-effect-16">';
//    //index.php   
     if($activepage=='dashboard.php') {  echo' <li class="active"><a href="dashboard.php">Home</a></li>'; 
     }
    else {    echo '<li><a href="dashboard.php">Home</a></li>';
    }
     //about.php      
     if($activepage=='about.php'){  echo' <li class="active"><a href="about.php">Send SMS</a></li>'; 
     }
    else {    echo '<li><a href="about.php">Send SMS</a></li>';
    }
     //properties.php      
     if($activepage=='properties.php')  {  echo' <li class="active"><a href="properties.php">Transactions</a></li>'; 
     }
    else { echo '<li><a href="properties.php">Transactions</a></li>';
    }                                
     //tenants.php      
     if($activepage=='tenants.php') {  echo' <li class="active"><a href="tenants.php">Account</a></li>'; 
     }
    else {  echo '<li><a href="tenants.php">Account</a></li>';
    } 
    //contact.php      
     if($activepage=='contact.php'){  echo' <li class="active"><a href="contact.php">Users</a></li>'; 
     }
    else {    echo '<li><a href="contact.php"> Users</a></li>';
    }     
      //portal.php      
     if($activepage=='portal.php')   {   echo' <li class="active"><a href="portal.php">My Account</a></li>'; 
     }
    else {    echo '<li><a href="portal.php">My Account</a></li>';
    } 
     }
     echo'</ul> </div> <!--navigation-end-->  <!--script-for-menu-->';
 }
 
   //load the footer here
   function loadFooter()
   {
        echo' <!--footer-starts--> 
            <div class="footer">
                    <div class="col-md-12">                       
                       © 2016 Univeit Bulk SMS Portal. All Rights Reserved | Design by  <a href="http://univeit.com/" target="_blank">Univeit</a> 
                    </div> 
            <script type="text/javascript">
                $(document).ready(function() {  
                    $().UItoTop({easingType: easeOutQuart});
                });
            </script>
            <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
        </div>        <!--footer-end-->';
   }
    
   
   function Login($username,$password)
   {
        $userdetails='';
      $sql="SELECT `_id`, `usernumber`, `firstname`, `secondname`, `lastname`, `username`, `gender`, `emailaddress`, '
              . '`phonenumber`, `country`, `usertype`,`physical_address` FROM `users` WHERE `username`='$username' AND `password`='$password'";
       $execute = mysql_query($sql) or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows>0)
        { 
            $rowdata=mysql_fetch_array($execute);
            $userdetails=$rowdata['_id'].":".$rowdata['usertype'].":".$rowdata['firstname'].":".$rowdata['secondname'].":"
                    .$rowdata['lastname'].":".$rowdata['gender'].":".$rowdata['emailaddress'].":".$rowdata['phonenumber'].":"
                    .$rowdata['country'].":".$rowdata['usernumber'].":".$rowdata['physical_address'];
        }else
        {
            $userdetails="Sorry No user was found"; 
        }
        return $userdetails;
   }
   
   
   
   
   
    
     
}




?>