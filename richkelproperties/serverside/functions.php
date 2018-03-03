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
    echo ' <!--//search-scripts--> <!--navigation-starts--> <div class="navigation"><span class="menu"></span> 
            <ul class="navig cl-effect-16">';
    //index.php   
     if($activepage=='index.php') {  echo' <li class="active"><a href="index.php">Home</a></li>'; 
     }
    else {    echo '<li><a href="index.php">Home</a></li>';
    }
     //about.php      
     if($activepage=='about.php'){  echo' <li class="active"><a href="about.php">About</a></li>'; 
     }
    else {    echo '<li><a href="about.php">About</a></li>';
    }
     //properties.php      
     if($activepage=='properties.php')  {  echo' <li class="active"><a href="properties.php">Property Management</a></li>'; 
     }
    else { echo '<li><a href="properties.php">Property Management</a></li>';
    }                                
     //tenants.php      
     if($activepage=='tenants.php') {  echo' <li class="active"><a href="tenants.php">Tenant Services</a></li>'; 
     }
    else {  echo '<li><a href="tenants.php">Tenant Services</a></li>';
    } 
    //contact.php      
     if($activepage=='contact.php'){  echo' <li class="active"><a href="contact.php">Contact Us</a></li>'; 
     }
    else {    echo '<li><a href="contact.php">Contact Us</a></li>';
    }     
      //portal.php      
     if($activepage=='portal.php')   {   echo' <li class="active"><a href="portal.php">Client Portal</a></li>'; 
     }
    else {    echo '<li><a href="portal.php">Client Portal</a></li>';
    }               
     echo'</ul> </div> <!--navigation-end-->  <!--script-for-menu-->';
 }
 
  function LoadLandlordMenu($activepage)
 {
    echo ' <!--//search-scripts--> <!--navigation-starts--> <div class="navigation"><span class="menu"></span> 
            <ul class="navig cl-effect-16">';
    //index.php   
     if($activepage=='index.php') {  echo' <li class="active"><a href="index.php">Home</a></li>'; 
     }
    else {    echo '<li><a href="index.php">Home</a></li>';
    }
     //myproperties.php      
     if($activepage=='myproperties.php'){  echo' <li class="active"><a href="myproperties.php">My Properties</a></li>'; 
     }
    else {    echo '<li><a href="myproperties.php">My Properties</a></li>';
    }
     //myincome.php      
     if($activepage=='myincome.php')  {  echo' <li class="active"><a href="myincome.php">My Income</a></li>'; 
     }
    else { echo '<li><a href="myincome.php">My Income</a></li>';
    }                                
     //tenants.php      
     if($activepage=='portal.php') {  echo' <li class="active"><a href="../portal.php">Logout</a></li>'; 
     }
    else {  echo '<li><a href="../portal.php">Logout</a></li>';
    } 
//    //contact.php      
//     if($activepage=='contact.php'){  echo' <li class="active"><a href="contact.php">Contact Us</a></li>'; 
//     }
//    else {    echo '<li><a href="contact.php">Contact Us</a></li>';
//    }     
//      //portal.php      
//     if($activepage=='portal.php')   {   echo' <li class="active"><a href="portal.php">Client Portal</a></li>'; 
//     }
//    else {    echo '<li><a href="portal.php">Client Portal</a></li>';
//    }               
//     echo'</ul> </div> <!--navigation-end-->  <!--script-for-menu-->';
 }
 
  function LoadTenantMenu($activepage)
 {
    echo ' <!--//search-scripts--> <!--navigation-starts--> <div class="navigation"><span class="menu"></span> 
            <ul class="navig cl-effect-16">';
    //index.php   
     if($activepage=='index.php') {  echo' <li class="active"><a href="index.php">Home</a></li>'; 
     }
    else {    echo '<li><a href="index.php">Home</a></li>';
    }
     //myrooms.php      
     if($activepage=='myrooms.php'){  echo' <li class="active"><a href="myrooms.php">My Room(s)</a></li>'; 
     }
    else {    echo '<li><a href="myrooms.php">My Room(s)</a></li>';
    }
     //myexpense.php      
     if($activepage=='myexpense.php')  {  echo' <li class="active"><a href="myexpense.php">My Expenses</a></li>'; 
     }
    else { echo '<li><a href="myexpense.php">My Expenses</a></li>';
    }                                
     //tenants.php      
     if($activepage=='portal.php') {  echo' <li class="active"><a href="../portal.php">Logout</a></li>'; 
     }
    else {  echo '<li><a href="../portal.php">Logout</a></li>';
    } 
//    //contact.php      
//     if($activepage=='contact.php'){  echo' <li class="active"><a href="contact.php">Contact Us</a></li>'; 
//     }
//    else {    echo '<li><a href="contact.php">Contact Us</a></li>';
//    }     
//      //portal.php      
//     if($activepage=='portal.php')   {   echo' <li class="active"><a href="portal.php">Client Portal</a></li>'; 
//     }
//    else {    echo '<li><a href="portal.php">Client Portal</a></li>';
//    }               
//     echo'</ul> </div> <!--navigation-end-->  <!--script-for-menu-->';
 }
   //load the footer here
   function loadFooter()
   {
        echo' <!--footer-starts--> 
            <div class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="col-md-3 footer-left">
                        <div class="a-1">
                            <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                            <p>Richkel Properties, P. O Box 504-01001 KALIMONI, KENYA.</p>
                        </div>
                        <div class="a-2">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            <p><a href="mailto:info@richkelproperties.com">info@richkelproperties.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-3 footer-left">
                        <div class="a-1">
                            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                            <p>+2457 80 622 722</p>
                        </div>
                        <div class="a-2">
                            <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                            <p>+2547 05 871 646</p>
                        </div>
                    </div>
                    <div class="col-md-6 footer-right">
                        <form>
                            <input type="text" value="Your Email" onfocus="this.value = ;" onblur="if (this.value == ) {
                                                            this.value = Your Email;
                                                        }">
                            <input type="submit" value="Subscribe">
                        </form>
                        <p>© 2016 Richkel Properties. All Rights Reserved | Design by  <a href="http://univeit.com/" target="_blank">Univeit</a> </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
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