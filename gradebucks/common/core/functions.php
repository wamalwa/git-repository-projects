<?php
//error_reporting(E_ALL);
//use db;

class Functions
{
    private  $db;
    public $dateToday;
    public $userid;
    private $Gradebucks;
     //constructor
     function __construct() {
        $this->db        = new db();
        $this->dateToday = date('Y-m-d H:i:s');
        session_start();       
        $this->userid    = $_SESSION['userdetails']['userid'];
        $this->Gradebucks     = '../../Gradebucks';
     }

function dropdwonList($data,$options,$selectedKey){

  $properties = '';
  $properties .= !empty($options['id'])? "id='".$options['id']."'":'';
  $properties .= !empty($options['name'])? "name='".$options['name']."'":'';
  $properties .= !empty($options['class'])? "class='".$options['class']."'":'';
  $properties .= !empty($options['style'])? "style='".$options['style']."'":'';
  $properties .= !empty($options['disabled'])? "disabled='".$options['disabled']."'":'';

  echo "<select $properties >";

  foreach ($data as $key => $value) {
    if($selectedKey===$key ||$selectedKey==$key){        
    echo "<option selected='selected'  value='".$key."'>".$value."</option>";
    }
    else{
    echo "<option value='".$key."'>".$value."</option>";
    }
  }
 echo "</select>";
}


  
function format_datetime($datetime){
    //this is done by JAACOB PETRO
    
    // $datetime='2017-03-14 11:32:19';
    $strDateformat=''.$datetime;
    $datedetials=  explode(' ',$datetime);
    $_date=trim($datedetials[0]);
    $_time=trim($datedetials[1]);
    //split date
    $splitDate=explode('-',$_date);
    $_year=trim($splitDate[0]);
    $_month=trim($splitDate[1]);
    $_day=trim($splitDate[2]);
    $strMonth='';
    
    switch($_month){
        case 1:
              $strMonth='January'; 
                break;
           case 2:
             $strMonth='February'; 
                break;
           case 3:
             $strMonth='March'; 
                break;
          case 4:
             $strMonth='April'; 
                break;
          case 5:
             $strMonth='May'; 
                break;
            case 6:
             $strMonth='June'; 
                break;
           case 7:
             $strMonth='July'; 
                break;
           case 8:
             $strMonth='August'; 
                break;
          case 9:
             $strMonth='Septeember'; 
                break;
           case 10:
             $strMonth='October'; 
                break;      
             case 11:
             $strMonth='Novermber'; 
                break;
           case 12:
             $strMonth='December'; 
                break;    
            default:
               $strMonth=$_month;
                break;                
    }
     
    //current timestamp
    $_thisYear=trim(date('Y'));
    $_thisMonth=trim(date('m'));
    $_dateToday=trim(date('d'));
    $_thisHour=trim(date('H'));
    $_thisMinutes=trim(date('i'));
//    $_thisSeonds=$_today.getSeconds();

    //split time
    $splitTime=explode(':',$_time);
    $_hour=trim($splitTime[0]);
    $_minutes=trim($splitTime[1]);
//    $_seconds=$splitTime[2];
    
    //check if the year is current year
if($_year===$_thisYear){
        
        //this month
     if($_month===$_thisMonth){

        //today
         if($_day===$_dateToday)            
         {  
             //check hour
          if($_hour===$_thisHour){
               
               //check minutes
          if($_thisMinutes===$_minutes){                   
                  $strDateformat='Now';
               }
//               1minute ago
              else if($_thisMinutes>$_minutes && ($_thisMinutes-$_minutes)===1 && ($_thisMinutes-$_minutes)<60){
                  $strDateformat=$_thisMinutes-$_minutes.' minute Ago';
               }
               else if($_thisMinutes>$_minutes && ($_thisMinutes-$_minutes)<60){
                  $strDateformat=$_thisMinutes-$_minutes.' minutes Ago';
               }
             }
             //1 hour ago
            else if($_thisHour>$_hour && ($_thisHour-$_hour)===1 && ($_thisHour-$_hour)<12)
             {
               $strDateformat=$_thisHour-$_hour." hour ago";
             }
             else if($_thisHour>$_hour && ($_thisHour-$_hour)<12)
             {
               $strDateformat= $_thisHour-$_hour." hours ago";
             }
                else{
                  $strDateformat='Today';
               }
         }      
          else if($_dateToday>$_day && ($_dateToday - $_day)===1 && ($_dateToday - $_day)<7){
            $strDateformat='Yesterday';
         }
          else if($_dateToday>$_day && ($_dateToday - $_day)/7===1){
               $strDateformat=(($_dateToday - $_day)/7).' week ago';
         }
         else if($_dateToday>$_day && ($_dateToday - $_day)%7===0){
               $strDateformat=(($_dateToday - $_day)/7).' weeks ago';
         }
         else if($_dateToday>$_day){
            $strDateformat=$_dateToday - $_day.' days ago';
         } 
     }
     else
     {
        $strDateformat=$_day." ".$strMonth.", ".$_year;
     }
    
}
else
{
    $strDateformat=$_day." ".$strMonth.", ".$_year;
}

   return $strDateformat;
}

function DateFormater($datetime){
    //this is done by JAACOB PETRO
    
    $strDateformat = ''.$datetime;
//    $datetime='2017-03-14 11:32:19';
    $datedetials  = explode(' ',$datetime);
    $_date        = trim($datedetials[0]);
    $_time        = trim($datedetials[1]);
    //split date
    $splitDate    = explode('-',$_date);
    $_year        = trim($splitDate[0]);
    $_month       = trim($splitDate[1]);
    $_day         = trim($splitDate[2]);
    
    $strMonth     = '';
    
    switch($_month){
        case 1:
              $strMonth = 'January'; 
                break;
           case 2:
             $strMonth  = 'February'; 
                break;
           case 3:
             $strMonth  = 'March'; 
                break;
          case 4:
             $strMonth  = 'April'; 
                break;
          case 5:
             $strMonth  = 'May'; 
                break;
            case 6:
             $strMonth  = 'June'; 
                break;
           case 7:
             $strMonth  = 'July'; 
                break;
           case 8:
             $strMonth  = 'August'; 
                break;
          case 9:
             $strMonth  = 'Septeember'; 
                break;
           case 10:
             $strMonth  = 'October'; 
                break;      
             case 11:
             $strMonth  = 'Novermber'; 
                break;
           case 12:
             $strMonth  = 'December'; 
                break;    
            default:
             $strMonth  = $_month;
                break;                
    }     
    //current timestamp
    $_thisYear    = trim(date('Y'));
    $_thisMonth   = trim(date('m'));
    $_dateToday   = trim(date('d'));
    $_thisHour    = trim(date('H'));
    $_thisMinutes = trim(date('i'));
//    $_thisSeonds=$_today.getSeconds();

    //split time
    $splitTime  = explode(':',$_time);
    $_hour      = trim($splitTime[0]);
    $_minutes   = trim($splitTime[1]);
//    $_seconds=$splitTime[2];
    
    $strDateformat = $_day." ".$strMonth.", ".$_year;
//      $strDateformat=$_day." ".$strMonth.", ".$_year." at ".$_time;

   return $strDateformat;
}
   //setting flash messages
public function setFlash(){
    session_start();
    if(isset($_SESSION['message'])){

    $message = $_SESSION['message'];
    $status = $message['status'];//success, warning
    $data = $message['data'];
    echo '<div id="message" class="alert alert-'.$status.'">'.$data.'</div>';
    unset($_SESSION['message']);
    }

  } 
  
function log($info) {        
       //  $todayslogs = $this->eNews;
       //  if (!file_exists($todayslogs)) {
       //      mkdir($todayslogs, 07777, TRUE);
       //  }
       //  $file     = 'eTopiks_v2';               
       //  $filename = $todayslogs.'/'.$file . '_' .date('Ymd') . '.log';
       // file_put_contents($filename,$this->dateToday.' [] '.$info. PHP_EOL, FILE_APPEND);
      }

public function page_nav($page){
  $visible = $page['visible'];  
  $url     = $page['url'];
  $name    = $page['name'];
  $page   = $page['active'];
  if($visible==1 || $visible===true || $visible==='1'){
        if($url===$page){    
        echo '<li class="active"><a href="index.php?r='.$url.'&p='.$name.'">'.$name.'</a></li>';
        }
        else if($page ==='dropdown'){
            echo '<a class="drop" href="#">'.$name.'</a>';
        }
        else{    
        echo '<li><a href="index.php?r='.$url.'&p='.$name.'">'.$name.'</a></li>';
        }
  }
}

// $subject = "Congratulations!";
// $message = 'Thank you for Registering with us.Please use the following details as your login: "\n\n"  Email Address: '
//         . $email_to . '"\n\n" Password:' . $userpassword . '"\n\n"Please remember to change it the first time you login to secure your account."\n\n" Regards,"\n\n\n"Home Worker Jobs';
function sendMail($email_to, $subject, $message) {

        $success = 1;

        $email_from = 'admin@Rushmywriting.com';

        $body = 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

        if (@mail($email_to, $subject, $body, 'From: <' . $email_from . '>')) {
            $success = 0;
        } else {
            $success = 1;
        }
    }


function sendEmailAttachment($email_from,$name_from,$email_to, $subject, $bodytext,$file_to_attach,$filename,$bcc) {
require_once('smtpmail/PHPMailer.php');
$email = new PHPMailer();
$email->From      = $email_from;
$email->FromName  = $name_from;
$email->Subject   = $subject;
$email->Body      = $bodytext;
$email->AddAddress($email_to);

if(!empty($bcc)){
    $email->AddBCC($bcc);
}
$email->AddAttachment( $file_to_attach , $filename, 'base64', 'application/octet-stream');
return $email->Send();

}

function sendEmail($email_from,$name_from,$email_to, $subject, $bodytext,$bcc) {
require_once('smtpmail/PHPMailer.php');
$email = new PHPMailer();
$email->From      = $email_from;
$email->FromName  = $name_from;
$email->Subject   = $subject;
$email->Body      = $bodytext;
$email->AddAddress($email_to);

if(!empty($bcc)){
    $email->AddBCC($bcc);
}
return $email->Send();

}
 //other funtions       
function toCurrency($stringValue){
  $oneThousand      = 1000;
  $tenThousand      = 10000;
  $hundredThousand  = 100000;
  $oneMillion       = 1000000;
  $tenMillion       = 10000000;
  $hundredmillion   = 100000000;
  $oneBillion       = 1000000000;

  $intValue         = $stringValue;
  $formatedString   = $stringValue;
  $neg              = 0;//negative value
    
   if($intValue<0) {
       $formatedString  = substr($formatedString,1, strlen($formatedString)) ;
       $intValue        = $formatedString;
       $neg             = -1;
   }
    
   if($intValue<$oneThousand)
  {
    $formatedString = $stringValue;//return it vile iko
  }
  else if($intValue>=$oneThousand && $intValue<$tenThousand)
  {
    //break the string twice from index 0-1
      $thousand       = substr($formatedString,0,1);
      $tail           = substr($formatedString, 1, strlen($formatedString));
      $formatedString = $thousand.','.$tail;
  }
  else if($intValue>=$tenThousand && $intValue<$hundredThousand)
  {
    //break twice from the second text
       $thousand      = substr($formatedString,0,2);//formatedString.substring(0, 2);
       $tail          = substr($formatedString, 2, strlen($formatedString));//formatedString.substring(2,formatedString.length);
      $formatedString = $thousand.",".$tail;
  }

 else if($intValue>=$hundredThousand && $intValue<$oneMillion)
  {
       $thousand      = substr($formatedString,0,3);//formatedString.substring(0, 3);
       $tail          = substr($formatedString, 3, strlen($formatedString));//formatedString.substring(3,formatedString.length);
      $formatedString = $thousand.",".$tail;
  }

 else if($intValue>=$oneMillion && $intValue<$tenMillion)
  {
    
  //break it thrice
      $thousand       = substr($formatedString,0,1);//formatedString.substring(0, 1);
      $tail           = substr($formatedString,1,3);//formatedString.substring(1,4);
      $tail2          =substr($formatedString, 4, strlen($formatedString));//formatedString.substring(4,formatedString.length);
      $formatedString = $thousand.",".$tail.",".$tail2;
      }
 else if($intValue>=$tenMillion && $intValue<$hundredmillion)
  {
  //break it thrice
       $thousand        = substr($formatedString,0,2);//formatedString.substring(0, 2);
       $tail            = substr($formatedString,2,3);//formatedString.substring(2,5);
       $tail2           = substr($formatedString, 5, strlen($formatedString));//formatedString.substring(5,formatedString.length);
       $formatedString  = $thousand.",".$tail.",".$tail2;
     
  }

  else if($intValue>=$hundredmillion && $intValue<$oneBillion)
  {
   //break it thrice
     $thousand          = substr($formatedString,0,3);//formatedString.substring(0, 3);
     $tail              = substr($formatedString,3,3);//formatedString.substring(3,6);
     $tail2             = substr($formatedString, 6, strlen($formatedString));//formatedString.substring(6,formatedString.length);
     $formatedString    = $thousand.",".$tail.",".$tail2;
  }
  else if($intValue>=$oneBillion)
  {
     //break it four times
      $thousand       = substr($formatedString,0,1);//formatedString.substring(0, 1);
      $tail           = substr($formatedString,1,3);//formatedString.substring(1,4);
      $tail2          = substr($formatedString,4,3);//formatedString.substring(4,7);
      $tail3          = substr($formatedString, 7, strlen($formatedString));//formatedString.substring(7,formatedString.length);
      $formatedString = $thousand.",".$tail.",".$tail2.",".$tail3;
  }
  else
  {
    $formatedString     = $stringValue;
  }
  if($neg===-1){
      $formatedString   = "-". $formatedString; 
  }

  return $formatedString;

} 
//read the excel Sheet
function ReadExcelSheet($filename) {
     
//     if($fileExtension==='xls'){
         try{
        $excel = new PhpExcelReader;      // creates object instance of the class
        $excel->read($filename); 
        $excel_data = '';              // to store the the html tables with data of each sheet       
        $excel_data .= '<h4> ' . ('') . ' <em>' . '' . '</em></h4>' . $this->AddDatatoDB($excel->sheets[0],$filename) . '<br/>';
         }
         catch(Exception $e ){
              print_r('Exception:::'.$e->getMessage());
         }
//     }
//     else {
//         //"The file with extension ".$fileExtension." is still not allowed at the moment.");
//     }
    }   
function AddDatatoDB($sheet,$filename) {

    try{
        $errorFile    = 'CONTACTS_IMPORTATION_ERROR_DOC_' . date('dMY');
        $tbl_header   = '<table border="1"cellpadding= "2" cellspacing = "2" >';
        $tbl_footer   = '</table>';

$containErrors = 0;
        $tbl   = '';
        $tbl  .= '<tr>' . '<th>PHONENUMBER</th></tr>';

        $x    = 1;
        
$numRows      = $sheet['numRows']+1;
 do {
        $x++;       
        $validator = 0;

    if($x===$numRows){          break;   
         
       }

    else {             
           
            if(!empty($sheet['cells'][$x]) && $x<$numRows){ 
             //read the cell
                //the cells should be six                
                     if(!empty($sheet['cells'][$x][1])){
                      $PhoneNumber = $sheet['cells'][$x][1];
                         }
             
        //validate phone number
        if(!(strlen($PhoneNumber)===12))
          {          
            $validator = 1;
            $remarks   = "Invalid Phone number; The Phone number ".$PhoneNumber." length is not equal to 12";
            $tbl .='<tr><td style="color:red;">' . $remarks. '</td>' . '</tr>';
          }

    if($validator===0){        
      //INSERT EACH CONTACT DETAILS INTO THE DATABASE HERE  
       }
         else{  $containErrors=1;  }
        
       }
         else
        {
           //DEISPLAY ERROR MESSAGE HERE
        }
    }

}

while ($x <$numRows);

      if($containErrors===1){

            header('Content-Type: application/msexcel');
            header("Content-Disposition: attachment;Filename=$errorFile.xls");
            echo "<html>";
            echo "<meta http-equiv=\"Content-Type\ content=\"text/html; charset=Windows-1252\">";
            echo "<body>";
        //content gore here
            echo  $tbl_header ;
            echo $tbl; 
            echo $tbl_footer;
            echo "</body>
                </html>";
      //"Errors were found in the excel document uploaded,please check the downloaded file.");
         exit();

        }
        else if($containErrors===0)
        {                       
             $this->AddfiletoDB($filename);
        }
    } catch (Exception $e) {
                //'Sorry! Please upload the correct data format!'); 
      }

}
function AddfiletoDB($filename){
        $success = -1;
        try {           
                $params=array(':filename' => $filename,
               ':filestatus' => 0, 
               ':createdBY' => $_SESSION['username']);
        
        $stmtInst = $this->db->pdo->prepare("INSERT INTO `tbfileuploads`(`filename`, `filestatus`, `createdBY`)  "
                . "VALUES (:filename,:filestatus,:createdBY)");
               
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
        if($affected_rows>0){
        $success = 0;
        }
            
    }       
        catch (PDOException $e) {

            if ($e->getCode() === 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }

        return $success; 
     }     
function Login($username,$password){
    
 $userdetails = array();
try {
 
    $stmt = $this->db->pdo->prepare('SELECT `userid`, `lastname`, `firstname`, `emailaddress`, `phonenumber`, `username`,user_type, `active`, `groupid` 
      FROM `tbusers` 
      WHERE (emailaddress =:emailaddress OR phonenumber = :phonenumber) 
      AND userpassword = :password');

    $data = array(
      ':emailaddress' => $username
      ,':phonenumber' =>  $username
      , ':password'   => $password );
      
    $stmt->execute($data);
       
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($rows)>0)
        { 
            $rowdata     = $rows[0];
            $userdetails['userid']   = $rowdata['userid'];
            $userdetails['username'] = $rowdata['username'];
            $userdetails['phonenumber'] = $rowdata['phonenumber'];
            $userdetails['lastname'] = $rowdata['lastname'];
            $userdetails['firstname'] = $rowdata['firstname'];
            $userdetails['groupid'] = $rowdata['groupid'];
            $userdetails['emailaddress'] = $rowdata['emailaddress'];  
            $userdetails['active'] = $rowdata['active'];  
            $userdetails['user_type'] = $rowdata['user_type'];
                          
        }
        else
        {
            $userdetails = '-1'; 
        } 
        
        }
        catch (PDOException $e) {
//            $this->log('Function->Login:  PDOException e [] '.$e->getMessage());
            if ($e->getCode() === 1062) {
                 $success = $e;
            } else {
                 $success = $e;
            }
        }

//        $this->log('Function->Login: End....');
        return $userdetails;
   }
function ChangePassword($current_password,$new_password) {
       $success = -1;
    try {         
        $params    = array(
                      ':current_password'   => $current_password,
                      ':new_password' => $new_password, 
                      ':active'           =>1, 
                      ':updatedon'    =>$this->dateToday,
                      ':updatedby'    =>$this->userid,
                      ':id'           =>$this->userid);

        $stmtInst  = $this->db->pdo->prepare("UPDATE `tbusers` SET `userpassword`=:new_password,"
                . "`active`=:active,`updatedon`=:updatedon,`updatedby`=:updatedby "
                . "WHERE `userid`=:id AND `userpassword`=:current_password");
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();

        if($affected_rows>0){
        $success       = 'Succsesfull';
        }
        else{
           $success = 'Failed';
        }
    }
    catch (PDOException $e) {  
        if ($e->getCode() === 1062) {
            $success  = $e;
        } 
        else {
             $success = $e;
        }
    }
        return $success;
   } 
function find_all_services($type,$conditions){
  if(empty($conditions)){
        $conditions='1=1';
    }
    
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("SELECT `serviceid`, `servicename`, `serviceDescription`, A.`createdon`, B.`username`, A.`active` FROM `tbservices` A inner join `tbusers` B on(B.`userid`=A.`createdby`) WHERE $conditions order by `serviceid` asc"); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
        
         if($rows>0)
         {   
             $rowcount = 0;
             if($type ==='dropdown'){

               //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $details [$rowdata['serviceid']] .= $rowdata['servicename']; 
                   $rowcount++;
               }
             }
             else{
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   // $data    = array();
                   $data['serviceid']   = $rowdata['serviceid'];
                   $data['servicename'] =  $rowdata['servicename']; 
                   $data['serviceDescription'] =  $rowdata['serviceDescription']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username']; 
                   $data['active']    =  $rowdata['active']==1? 'Active':'Inactive';      
                 array_push($details, $data); 
                   $rowcount++;

               }
             }
         }

       return $details;  
   } 
function find_subjcet_area($type,$conditions) {
   if(empty($conditions)){
        $conditions='1=1';
    }

     $details = array(); 
     $stmt    = $this->db->pdo->prepare("SELECT `subjectid` , `subjectname` , `subjectdescription` , A.`createdon` , B.`username`
        FROM `tbsubjectarea` A
        INNER JOIN `tbusers` B ON ( B.`userid` = A.`createdby` )
        WHERE $conditions 
        ORDER BY `subjectid` ASC"); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
        
         if($rows>0)
         {   
             $rowcount = 0;
             if($type ==='dropdown'){

               //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $details [$rowdata['subjectid']] .= $rowdata['subjectname']; 
                   $rowcount++;
               }
             }
             else{
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   // $data    = array();
                   $data['subjectid']   = $rowdata['subjectid'];
                   $data['subjectname'] =  $rowdata['subjectname']; 
                   $data['subjectdescription'] =  $rowdata['subjectdescription']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username'];      
                 array_push($details, $data); 
                   $rowcount++;

               }
             }
         }

       return $details; 
 }
function find_paper_types($type,$conditions){
    if(empty($conditions)){
        $conditions='1=1';
    }
    
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("SELECT `typeid`, `typename`, `typedescription`, A.`createdon`, B.`username` FROM `tbpapertypes` A inner join `tbusers` B on(B.`userid`=A.`createdby`) WHERE $conditions  order by `typeid` asc"); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
        
         if($rows>0)
         {   
             $rowcount = 0;
             if($type ==='dropdown'){

               //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $details [$rowdata['typeid']] .= $rowdata['typename']; 
                   $rowcount++;
               }
             }
             else{
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['typeid']   = $rowdata['typeid'];
                   $data['typename'] =  $rowdata['typename']; 
                   $data['typedescription'] =  $rowdata['typedescription']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username'];      
                 array_push($details, $data); 
                   $rowcount++;

               }
             }
         }

       return $details;  
   } 
function find_countries($type,$conditions){
    if(empty($conditions)){
        $conditions='1=1';
    }
    
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("SELECT `contryid`, `country_name`, `country_description`, `currencycode`, `currencyname` ,A.`createdon`, B.`username` FROM `tbcountries` A inner join `tbusers` B on(B.`userid`=A.`createdby`) WHERE $conditions "); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
        
         if($rows>0)
         {   
             $rowcount = 0;
             if($type ==='dropdown'){

               //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $details [$rowdata['contryid']] .= $rowdata['country_name']; 
                   $rowcount++;
               }
             }
             else{
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['contryid']   = $rowdata['contryid'];
                   $data['country_name'] =  $rowdata['country_name']; 
                   $data['country_description'] =  $rowdata['country_description']; 
                   $data['currencycode'] =  $rowdata['currencycode']; 
                   $data['currencyname'] =  $rowdata['currencyname'];  
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username'];          
                 array_push($details, $data); 
                   $rowcount++;

               }
             }
         }

       return $details;  
   }
function find_academiclevels($type,$conditions){ 
 if(empty($conditions)){
        $conditions='1=1';
    }
    
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("SELECT `levelid`, `levelname`, `levelDescription`, A.`createdon`, B.`username` FROM `tbacademiclevels` A inner join `tbusers` B on(B.`userid` = A.`createdby`)  WHERE $conditions order by `levelid` asc"); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
        
         if($rows>0)
         {   
             $rowcount = 0;
             if($type ==='dropdown'){

               //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $details [$rowdata['levelid']] .= $rowdata['levelname']; 
                   $rowcount++;
               }
             }
             else{
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['levelid']   = $rowdata['levelid'];
                   $data['levelname'] =  $rowdata['levelname']; 
                   $data['levelDescription'] =  $rowdata['levelDescription']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username'];      
                 array_push($details, $data); 
                   $rowcount++;

               }
             }
         }

       return $details;   
}  
function find_urgencies($type,$conditions){
    if(empty($conditions)){
        $conditions='1=1';
    }
    
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("SELECT `urgencyid` ,`urgency_value`,`urgency_name`, CONCAT(`urgency_value`, ' ',`urgency_name`) AS duration, `desscription` , A.`createdon` , B.`username`
                FROM `tburgencies` A
                INNER JOIN `tbusers` B ON ( B.`userid` = A.`createdby` )
                WHERE $conditions
                ORDER BY `urgencyid` ASC"); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
        
         if($rows>0)
         {   
             $rowcount = 0;
             if($type ==='dropdown'){

               //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $details [$rowdata['urgencyid']] .= $rowdata['duration']; 
                   $rowcount++;
               }
             }
             else{
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['urgencyid']   = $rowdata['urgencyid'];
                   $data['urgency_value'] =  $rowdata['urgency_value']; 
                   $data['urgency_name'] =  $rowdata['urgency_name']; 
                   $data['duration'] =  $rowdata['duration']; 
                   $data['desscription'] =  $rowdata['desscription']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username'];      
                 array_push($details, $data); 
                   $rowcount++;

               }
             }
         }

       return $details;   
} 
function find_all_orders($conditions){
    if(empty($conditions)){
        $conditions='1=1';
    }
 $details = array(); 
     $stmt    = $this->db->pdo->prepare("SELECT `orderid` , `approved` , A.`createdon` ,A.`createdby` ,B.`username`, CONCAT( `urgency_value` , ' ', `urgency_name` ) AS duration, CONCAT( B.`firstname` , ' ', B.`lastname` ) AS `username` , D.`servicename` , E.`levelname` , F.`typename` , G.`subjectname` , `topic` , `topicdescription` , `pagesorwords` , `spacing` , `order_instructions` , `order_no` , `total_price`,writing_format, `languagestyle`
    FROM `tborders` A
    INNER JOIN `tbusers` B ON ( B.`userid` = A.`createdby` )
    INNER JOIN `tburgencies` C ON ( A.`urgencyid` = C.`urgencyid` )
    INNER JOIN `tbservices` D ON ( A.`serviceid` = D.`serviceid` )
    INNER JOIN `tbacademiclevels` E ON ( A.`academiclevelid` = E.`levelid` )
    INNER JOIN `tbpapertypes` F ON ( A.`typeid` = F.`typeid` )
    INNER JOIN `tbsubjectarea` G ON ( A.`subjectid` = G.`subjectid` ) WHERE $conditions"); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
        
         if($rows>0)
         {   
             $rowcount = 0;
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['orderid']   = $rowdata['orderid'];
                   $data['approved'] =  $rowdata['approved']; 
                   $data['servicename'] =  $rowdata['servicename'];
                   $data['servicename'] =  $rowdata['servicename'];
                   $data['levelname'] =  $rowdata['levelname'];
                   $data['typename'] =  $rowdata['typename'];
                   $data['subjectname'] =  $rowdata['subjectname']; 
                   $data['topic'] =  $rowdata['topic'];
                   $data['topicdescription'] =  $rowdata['topicdescription'];
                   $data['pagesorwords'] =  $rowdata['pagesorwords'];
                   $data['spacing'] =  $rowdata['spacing'];
                   $data['order_instructions'] =  $rowdata['order_instructions'];
                   $data['order_no'] =  $rowdata['order_no'];
                   $data['total_price'] =  $rowdata['total_price'];
                   $data['duration'] =  $rowdata['duration']; 
                   $data['username'] =  $rowdata['username']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username']; 
                   $data['writing_format'] =  $rowdata['writing_format'];
                   $data['languagestyle'] =  $rowdata['languagestyle'];      
                 array_push($details, $data); 
                   $rowcount++;

               }
         }

       return $details;   
} 
function GetUserProfile() {
      $groupid   = $_SESSION['fields'][3];
      $userroles = array();         
          $stmt  = $this->db->pdo->prepare('SELECT  `roleid` FROM `tbprofile` WHERE `usergroupid`=:groupid');  
          $stmt->bindValue(':groupid', $groupid, PDO::PARAM_STR);
          // $this->log('Function->GetUserProfile: Prepare Statement: '.current($stmt));
          $stmt->execute();
          // $this->log('Function->GetUserProfile:  Call execute');
         $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows     = count($num_rows);
        
         if($rows>0)
         {
              $rowcount  = 0;
               // $this->log('Function->GetUserProfile: rows>0: '.$rows);
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata = $num_rows[$rowcount];
                 $data    = $rowdata['roleid'];      
                 array_push($userroles, $data); 
                 $rowcount++;
             }
                
         }
           // $this->log('Function->GetUserProfile: End....');
       return $userroles; 
 }
function CheckRoleAccess($roleID,$userroles,$currectPage,$pagename,$pageheader){
     //this function checks if a user is allowed to access some menu or not
     $totaluserroles = count($userroles);
     $pagename       = $pagename.'.php';
     //loop through all the roles and check if they exist in the array
     for($index = 0;$index<$totaluserroles;$index++)
     {
         if($userroles[$index]===$roleID){
             
             if($currectPage===$pagename) { 
                 
              echo'  <li class="active"><a href="'
              .$pagename.'">'
              .$pageheader.'</a></li>';
                } 
                else{ 
               echo ' <li><a href="'
               .$pagename.'">'
               .$pageheader.'</a></li>';
                } 
             
             break;
         }
     }
 }
function CheckPageAccess($roleID,$userroles){
     //this function checks if a user is allowed to access some menu or not
     $totaluserroles = count($userroles);
     $userpage       = 0;//this should be displayed when the user is not allowed to access current page
     //loop through all the roles and check if they exist in the array
     for($index = 0;$index<$totaluserroles;$index++)
     {
         if($userroles[$index]===$roleID){             
              $userpage = 1; 
             break;
         }
        
     }
     
   return $userpage;
     
 }
function CheckButtonAccess($roleID,$userroles){
     //this function checks if a user is allowed to access some menu or not
     $totaluserroles = count($userroles);
     $showbutton     = 'style="display:none"';
     //loop through all the roles and check if they exist in the array
     for($index=0;$index<$totaluserroles;$index++)
     {
         if($userroles[$index]===$roleID){
             
             $showbutton = 'style="display:block"';
             
             break;
         }
     }
     return $showbutton;
 }
function AddNewModule($roleName,$roleDescription){
       $success = -1;
       try {
               
           // $this->log('Function->AddCategory: Start....');
           
         $stmtSel = $this->db->pdo->prepare('SELECT `roleid` 
          FROM `tbroles` 
          WHERE `roleName` = :roleName');
         $stmtSel->bindValue(':roleName'
        , $roleName, PDO::PARAM_STR);
         
         // $this->log("Function->AddCategory: Prepare Statement: ".current($stmtSel));
         $stmtSel->execute();
//          $this->log("Function->AddCategory:  Call execute");
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params    = array(':roleName'   => $roleName,
                      ':roleDescription' => $roleDescription, 
                      ':createdON'           =>$this->dateToday,
                      ':createdBY'           =>$this->userid);
  
        $stmtInst  = $this->db->pdo->prepare("INSERT INTO `tbroles`(`roleName`, `roleDescription`, `createdON`, `createdBY`)  "
                . "VALUES (:roleName,:roleDescription,:createdON,:createdBY)");
//                 $this->log("Function->AddCategory: Prepare Statement: ".current($stmtInst));
       if(count($num_rows)<=0)
        {  
            $stmtInst->execute($params);
              // $this->log("Function->AddCategory:  Call execute");
            $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }
          }
        }
        catch (PDOException $e) {
//        $this->log("Function->AddCategory:  PDOException e [] ".$e->getMessage());  
            if ($e->getCode() === 1062) {
                $success  = $e;
            } 
            else {
                 $success = $e;
            }
        }
     $this->log("Function->AddCategory: End....");
        return $success;
   }   
   
function UpdateAcademicLevel($id,$levelname,$levelDescription) {
       $success = -1;
    try {         
        $params = array(':levelname'      => $levelname,
                      ':levelDescription' => $levelDescription, 
                      ':updatedon'        =>$this->dateToday,
                      ':updatedby'        =>$this->userid,
                      ':id'               =>$id);
        $stmtInst  = $this->db->pdo->prepare("UPDATE `tbacademiclevels` SET `levelname`=:levelname,`levelDescription`=:levelDescription,`updatedon`=:updatedon,`updatedby`=:updatedby WHERE `levelid`=:id");
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();

        if($affected_rows>0){
        $success       = 'Succsesfull';
        }
        else{
           $success = 'Failed';
        }
    }
    catch (PDOException $e) {  
        if ($e->getCode() === 1062) {
            $success  = $e;
        } 
        else {
             $success = $e;
        }
    }
        return $success;
   }          
function UpdateSubjectArea($id,$subjectname,$subjectdescription) {
       $success = -1;
    try {         
        $params = array(':subjectname'      => $subjectname,
                      ':subjectdescription' => $subjectdescription, 
                      ':updatedon'        =>$this->dateToday,
                      ':updatedby'        =>$this->userid,
                      ':id'               =>$id);
        $stmtInst  = $this->db->pdo->prepare("UPDATE `tbsubjectarea` SET `subjectname`=:subjectname,`subjectdescription`=:subjectdescription,`updatedon`=:updatedon,`updatedby`=:updatedby WHERE `subjectid`=:id");
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();

        if($affected_rows>0){
        $success       = 'Succsesfull';
        }
        else{
           $success = 'Failed';
        }
    }
    catch (PDOException $e) {  
        if ($e->getCode() === 1062) {
            $success  = $e;
        } 
        else {
             $success = $e;
        }
    }
        return $success;
   } 

function UpdateUrgencyLevel($id,$urgency_value,$urgency_name,$desscription) {
       $success = -1;
    try {         
        $params    = array(':urgency_value'   => $urgency_value,
                      ':urgency_name' => $urgency_name, 
                      ':desscription' => $desscription, 
                      ':updatedon'           =>$this->dateToday,
                      ':updatedby'           =>$this->userid,
                      ':id'              =>$id);
        $stmtInst  = $this->db->pdo->prepare("UPDATE `tburgencies` SET `urgency_value`=:urgency_value,`urgency_name`=:urgency_name,`desscription`=:desscription,`updatedon`=:updatedon,`updatedby`=:updatedby WHERE `urgencyid`=:id");
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();

        if($affected_rows>0){
        $success       = 'Succsesfull';
        }
        else{
           $success = 'Failed';
        }
    }
    catch (PDOException $e) {  
        if ($e->getCode() === 1062) {
            $success  = $e;
        } 
        else {
             $success = $e;
        }
    }
        return $success;
   }  
   
function UpdatePaperType($id,$typename,$typedescription) {
       $success = -1;
    try {         
        $params    = array(':typename'   => $typename,
                      ':typedescription' => $typedescription, 
                      ':updatedon'           =>$this->dateToday,
                      ':updatedby'           =>$this->userid,
                      ':id'              =>$id);
        $stmtInst  = $this->db->pdo->prepare("UPDATE `tbpapertypes` SET `typename`=:typename,"
                . "`typedescription`=:typedescription,"
                . "`updatedon`=:updatedon,"
                . "`updatedby`=:updatedby WHERE `typeid`=:id");
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();

        if($affected_rows>0){
        $success       = 'Succsesfull';
        }
        else{
           $success = 'Failed';
        }
    }
    catch (PDOException $e) {  
        if ($e->getCode() === 1062) {
            $success  = $e;
        } 
        else {
             $success = $e;
        }
    }
        return $success;
   }          
// UpdateService  
function UpdateService($id,$servicename,$serviceDescription) {
       $success = -1;
    try {         
        $params    = array(':servicename'   => $servicename,
                      ':serviceDescription' => $serviceDescription, 
                      ':updatedon'           =>$this->dateToday,
                      ':updatedby'           =>$this->userid,
                      ':id'              =>$id);
        $stmtInst  = $this->db->pdo->prepare("UPDATE `tbservices` SET 
                                            `servicename`=:servicename,
                                            `serviceDescription`=:serviceDescription,
                                            `updatedon`=:updatedon,
                                            `updatedby`=:updatedby
                                            WHERE `serviceid`=:id");
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();

        if($affected_rows>0){
        $success       = 'Succsesfull';
        }
        else{
           $success = 'Failed';
        }
    }
    catch (PDOException $e) {  
        if ($e->getCode() === 1062) {
            $success  = $e;
        } 
        else {
             $success = $e;
        }
    }
        return $success;
   }   

function  UpdateCountry($id,$country_name,$currencycode,$currencyname,$country_description){
     $success = -1;
    try {         
        $params    = array(':country_name'   => $country_name,
                      ':country_description' => $country_description, 
                      ':currencycode'   => $currencycode,
                      ':currencyname' => $currencyname, 
                      ':updatedon'           =>$this->dateToday,
                      ':updatedby'           =>$this->userid,
                      ':id'              =>$id);
        $stmtInst  = $this->db->pdo->prepare("UPDATE `tbcountries` "
                . "SET `country_name`=:country_name,"
                . "`country_description`=:country_description,"
                . "`currencycode`=:currencycode,"
                . "`currencyname`=:currencyname,"
                . "`updatedon`=:updatedon,"
                . "`updatedby`=:updatedby WHERE `contryid`=:id");
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();

        if($affected_rows>0){
        $success       = 'Succsesfull';
        }
        else{
           $success = 'Failed';
        }
    }
    catch (PDOException $e) {  
        if ($e->getCode() === 1062) {
            $success  = $e;
        } 
        else {
             $success = $e;
        }
    }
        return $success;
}
function AddUsergroup($groupName,$groupDescription){
        
    $success = -1;
   try {
         // $this->log("Function->AddUsergroup: Start....");
         $stmtSel = $this->db->pdo->prepare("SELECT `groupid` FROM `tbusergroup` WHERE `groupName`=:groupName");
         $stmtSel->bindValue(':groupName', $groupName, PDO::PARAM_STR);
         
         // $this->log("Function->AddUsergroup: Prepare Statement: ".current($stmtSel));
         $stmtSel->execute();
         
          // $this->log("Function->AddUsergroup:  Call execute");
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
         $params   = array(':groupName'   => $groupName,
                      ':groupDescription' => $groupDescription, 
                      ':createdON'        =>$this->dateToday,
                      ':createdBY'        =>  $this->userid);
        
         $stmtInst = $this->db->pdo->prepare("INSERT INTO `tbusergroup`(`groupName`, `groupDescription`, `createdON`, `createdBy`) "
                . "VALUES (:groupName,:groupDescription,:createdON,:createdBY)");
        
        // $this->log("Function->AddUsergroup: Prepare Statement: ".current($stmtInst));
       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        // $this->log("Function->AddUsergroup:  Call execute");
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }

          }
        }
        catch (PDOException $e) {
//            $this->log("Function->AddUsergroup:  PDOException e [] ".$e->getMessage());            
            if ($e->getCode() === 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }
             // $this->log("Function->AddUsergroup: End....");
        return $success;
   }  
 
function hashPIN($pin){
  // $base64  = base64_encode($pin);
  // $encrypt = hash_hmac('SHA128', $base64, 'mysecreto');
  return $pin;

}

function get_createdby($email_address){
    $stmtSel_userid = $this->db->pdo->prepare("SELECT `userid` FROM `tbusers` WHERE `emailaddress`=:emailaddress");
    $stmtSel_userid->bindValue(':emailaddress', $email_address, PDO::PARAM_STR);

    $stmtSel_userid->execute();         
    $_rows = $stmtSel_userid->fetchAll(PDO::FETCH_ASSOC);
    $createdby = $_rows[0]['userid'];
    return $createdby;
}

function AddNewOrder($order_no,$type_service,$paper_type,$page_numbers,$subjectname,
                    $academic_level,$urgency_level,$topic,$topicdescription,$spacing,$order_instructions,
                    $total_price,$email_address,$languagestyle,$writing_format){
 $success = -1;
       try {
        $createdby = $this->get_createdby($email_address);  
        $stmtSel = $this->db->pdo->prepare('SELECT `order_no` 
          FROM `tborders` 
          WHERE `order_no` = :order_no');
         $stmtSel->bindValue(':order_no'
        , $order_no, PDO::PARAM_STR);
         
       $stmtSel->execute();
       $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);         
       $params = array(':approved'   => 0,
                      ':urgencyid' => $urgency_level,
                      ':serviceid' => $type_service, 
                      ':total_price' => $total_price, 
                      ':typeid'   => $paper_type,
                      ':subjectid' => $subjectname,
                      ':academiclevelid'=>$academic_level,
                      ':topic' => $topic, 
                      ':topicdescription' => $topicdescription,
                      ':pagesorwords'   => $page_numbers,
                      ':spacing' => $spacing,
                      ':order_instructions' => $order_instructions, 
                      ':languagestyle' => $languagestyle,
                      ':writing_format' => $writing_format, 
                      ':order_no' => $order_no, 
                      ':createdon' =>$this->dateToday,
                      ':createdby' =>$createdby);
  
       $stmtInst  = $this->db->pdo->prepare("INSERT INTO `tborders`(`createdon`, `createdby`, `approved`, `urgencyid`, `serviceid`, `total_price`, `typeid`, `subjectid`, `topic`, `topicdescription`, `pagesorwords`, `spacing`, `order_instructions`, `order_no`,`academiclevelid`,`languagestyle`,writing_format) "
               . "VALUES (:createdon,:createdby,:approved,:urgencyid,:serviceid,:total_price,:typeid,:subjectid,:topic,:topicdescription,:pagesorwords,:spacing,:order_instructions,:order_no,:academiclevelid,:languagestyle,:writing_format)");
       if(count($num_rows)<=0)
        {  
            $stmtInst->execute($params);
            $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }
          }
        }
        catch (PDOException $e) { 
            if ($e->getCode() === 1062) {
                $success  = $e;
                } 
            else {
                 $success = $e;
            }
        }
        return $success;    
}

function AddNewClient($email_address,$firstname,$lastname,$gender,$country,
                    $phone_number,$new_password){
    $success = -1;            
      try {
          
        $stmtSel = $this->db->pdo->prepare("SELECT `userid` FROM `tbusers` WHERE `emailaddress`=:emailaddress");
        $stmtSel->bindValue(':emailaddress', $email_address, PDO::PARAM_STR);
         
        $stmtSel->execute();
         
        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
        $params    = array(':lastname'     => $lastname,
                      ':firstname'    => $firstname, 
                      ':emailaddress' => $email_address,
                      ':phonenumber'  => $phone_number, 
                      ':gender'  => $gender, 
                      ':country'       => $country, 
                      ':username'     => strtolower($lastname.'.'.$firstname) ,
                      ':userpassword' => $new_password,
                      ':active'       => 0,
                      ':groupid'      => 2,
                      ':createdON'    =>  $this->dateToday,
                      ':createdBY'    =>  1,
                      ':user_type'    =>  'Client');
     
        $stmtInst = $this->db->pdo->prepare("INSERT INTO `tbusers`(`lastname`, `firstname`, `emailaddress`, `phonenumber`, `country`,"
                . " `username`, `userpassword`, `active`, `groupid`, `createdON`, `createdBY`,`user_type`,`gender`) "
                . "VALUES (:lastname,:firstname,:emailaddress,:phonenumber,:country,:username,:userpassword,:active,:groupid,:createdON,:createdBY,:user_type,:gender)");
        
       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }

          }
        }
        catch (PDOException $e) {
        
            if ($e->getCode() === 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }
        return $success;   
    
}

function AddNewFiles($order_no,$uploadedfiles,$email_address){    
    
        $createdby = $this->get_createdby($email_address);
        $todayslogs = '../attachments';
        if (!file_exists($todayslogs)) {
            mkdir($todayslogs, NULL, TRUE);
        }
        $target_dir="../attachments/";
        $timeStamp='_'.date('Ymdhms');
        $fileCount = count($uploadedfiles['name']);
        
        for($f = 0;$f<$fileCount; $f++){
         $target_file = $target_dir.$timeStamp.basename($uploadedfiles['name'][$f]);
         if($uploadedfiles['size'][$f]>900000){
            $responseMessage = " Failed!  The  Image size ".$uploadedfiles['size'][$f]." is too large.";  
         }
         else{
         if (move_uploaded_file($uploadedfiles['tmp_name'][$f], $target_file)) {  
              $mediaPath = 'attachments/'.$timeStamp.basename($uploadedfiles['name'][$f]);
              $responseMessage = $this->UploadNewMedia($order_no,$mediaPath,'Client upload',$createdby);
                         
         }
         }  
        }
   
}

function UploadNewMedia($order_no,$filepath,$uploadtype,$createdby){
 $success = -1;
      try {  
         $stmtSel = $this->db->pdo->prepare('SELECT `uploadid` 
          FROM `tbattachments` 
          WHERE `filepath` = :filepath');
          $stmtSel->bindValue(':filepath'
        , $filepath, PDO::PARAM_STR);
            $stmtSel->execute();
            $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params    = array(':filepath'   => $filepath,
                      ':order_no' => $order_no, 
                      ':uploadtype' => $uploadtype, 
                      ':createdon'           =>$this->dateToday,
                      ':createdby'           =>$createdby);
  
        $stmtInst  = $this->db->pdo->prepare("INSERT INTO `tbattachments`(`filepath`, `createdon`, `createdby`, `order_no`, `uploadtype`)"
                . " VALUES (:filepath,:createdon,:createdby,:order_no,:uploadtype)");
       if(count($num_rows)<=0)
        {  
             $resp =  $stmtInst->execute($params);
            $affected_rows = $stmtInst->rowCount();
            if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }
          }
        }
        catch (PDOException $e) {  
            if ($e->getCode() === 1062) {
                $success  = $e;
            } 
            else {
                 $success = $e;
            }
        }
        return $success;     
     }  

function find_count($table,$conditions){
    $num_rows = 0;
    if(empty($conditions)){
        $conditions='1=1';
    }
    if(!empty($table)){
     $stmt   = $this->db->pdo->prepare("SELECT count(*) as TOTAL FROM `$table` WHERE $conditions"); 
     $stmt->execute();
     $_num_rows = $stmt->fetch();  
     $_rows = $_num_rows['TOTAL'];
     $num_rows = number_format($_rows);
    }
       return $num_rows;    
}
  
function AddMyNewOrder($order_no,$type_service,$paper_type,$page_numbers,$subjectname,
                    $academic_level,$urgency_level,$topic,$topicdescription,$spacing,$order_instructions,
                    $total_price,$languagestyle,$writing_format){
 $success = -1;
       try { 
        $stmtSel = $this->db->pdo->prepare('SELECT `order_no` 
          FROM `tborders` 
          WHERE `order_no` = :order_no');
         $stmtSel->bindValue(':order_no'
        , $order_no, PDO::PARAM_STR);
         
       $stmtSel->execute();
       $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);         
       $params = array(':approved'   => 0,
                      ':urgencyid' => $urgency_level,
                      ':serviceid' => $type_service, 
                      ':total_price' => $total_price, 
                      ':typeid'   => $paper_type,
                      ':subjectid' => $subjectname,
                      ':academiclevelid'=>$academic_level,
                      ':topic' => $topic, 
                      ':topicdescription' => $topicdescription,
                      ':pagesorwords'   => $page_numbers,
                      ':spacing' => $spacing,
                      ':order_instructions' => $order_instructions, 
                      ':languagestyle' => $languagestyle,
                      ':writing_format' => $writing_format, 
                      ':order_no' => $order_no, 
                      ':createdon' =>$this->dateToday,
                      ':createdby' =>$this->userid);
  
       $stmtInst  = $this->db->pdo->prepare("INSERT INTO `tborders`(`createdon`, `createdby`, `approved`, `urgencyid`, `serviceid`, `total_price`, `typeid`, `subjectid`, `topic`, `topicdescription`, `pagesorwords`, `spacing`, `order_instructions`, `order_no`,`academiclevelid`,`languagestyle`,writing_format) "
               . "VALUES (:createdon,:createdby,:approved,:urgencyid,:serviceid,:total_price,:typeid,:subjectid,:topic,:topicdescription,:pagesorwords,:spacing,:order_instructions,:order_no,:academiclevelid,:languagestyle,:writing_format)");
       if(count($num_rows)<=0)
        {  
            $stmtInst->execute($params);
            $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }
          }
        }
        catch (PDOException $e) { 
            if ($e->getCode() === 1062) {
                $success  = $e;
                } 
            else {
                 $success = $e;
            }
        }
        return $success;        
}


function SubmitMyRevision($order_no,$revision_description,$urgency_level){
   try{
    $params = array(
                      ':urgency_id' => $urgency_level,
                      ':revision_description' => $revision_description, 
                      ':order_no' => $order_no, 
                      ':createdon' =>$this->dateToday,
                      ':createdby' =>$this->userid);
  
       $stmtInst  = $this->db->pdo->prepare("INSERT INTO `tbmyrevisions`(createdon,createdby,order_no,urgency_id,revision_description) VALUES (:createdon,:createdby,:order_no,:urgency_id,:revision_description)");
      
            $stmtInst->execute($params);
            $affected_rows = $stmtInst->rowCount();        
            if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }         
        }
        catch (PDOException $e) { 
            if ($e->getCode() === 1062) {
                $success  = $e;
                } 
            else {
                 $success = $e;
            }
        }
        return $success;        
}
function AddMyNewFiles($order_no,$uploadedfiles){
  
        $createdby = $this->userid;
        $todayslogs = '../attachments';
        if (!file_exists($todayslogs)) {
            mkdir($todayslogs, NULL, TRUE);
        }
        $target_dir="../attachments/";
        $timeStamp='f'.date('His').mt_rand(100,999);
        $fileCount = count($uploadedfiles['name']);
        
        for($f = 0;$f<$fileCount; $f++){
         $target_file = $target_dir.$timeStamp.basename($uploadedfiles['name'][$f]);
         if($uploadedfiles['size'][$f]>900000){
            $responseMessage = " Failed!  The  Image size ".$uploadedfiles['size'][$f]." is too large.";  
         }
         else{
         if (move_uploaded_file($uploadedfiles['tmp_name'][$f], $target_file)) {  
              $mediaPath = 'attachments/'.$timeStamp.basename($uploadedfiles['name'][$f]);
              $responseMessage = $this->UploadNewMedia($order_no,$mediaPath,'Client upload',$createdby);
                         
         }
         }  
        }  
}

function AddRevisionFiles($order_no,$uploadedfiles){
  
        $createdby = $this->userid;
        $todayslogs = '../attachments';
        if (!file_exists($todayslogs)) {
            mkdir($todayslogs, NULL, TRUE);
        }
        $target_dir="../attachments/";
        $timeStamp='f'.date('His').mt_rand(100,999);
        $fileCount = count($uploadedfiles['name']);
        
        for($f = 0;$f<$fileCount; $f++){
         $target_file = $target_dir.$timeStamp.basename($uploadedfiles['name'][$f]);
         if($uploadedfiles['size'][$f]>900000){
            $responseMessage = " Failed!  The  Image size ".$uploadedfiles['size'][$f]." is too large.";  
         }
         else{
         if (move_uploaded_file($uploadedfiles['tmp_name'][$f], $target_file)) {  
              $mediaPath = 'attachments/'.$timeStamp.basename($uploadedfiles['name'][$f]);
              $responseMessage = $this->UploadNewMedia($order_no,$mediaPath,'Client Revision',$createdby);
                         
         }
         }  
        }  
}
function find_order_attachments($order_no,$conditons){
     if(empty($conditons)){
        $conditons = '';
    }
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("SELECT uploadid,filepath,createdon,order_no,uploadtype FROM tbattachments WHERE order_no='$order_no' $conditons;"); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
         if($rows>0)
         {   
             $rowcount = 0;
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['uploadid']   = $rowdata['uploadid'];
                   $data['filepath'] =  $rowdata['filepath']; 
                   $data['uploadtype'] =  $rowdata['uploadtype']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['order_no'] =  $rowdata['order_no'];      
                 array_push($details, $data); 
                   $rowcount++;

               }
             
         }

       return $details; 
}
function find_revisions($conditons){
    if(empty($conditons)){
        $conditons = '1=1';
    }
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("select A.ID, A.order_no,A.createdby,CONCAT( B.`urgency_value` , ' ', B.`urgency_name` ) AS duration,revision_description,A.createdon,CONCAT( C.`firstname` , ' ', C.`lastname` ) AS `username`,A.approved  from tbmyrevisions A 
                                        inner join tburgencies B on(A.urgency_id=B.urgencyid) 
                                        inner join tbusers C on(A.createdby=C.userid) WHERE $conditons"); 
  
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
         if($rows>0)
         {   
             $rowcount = 0;
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['ID']   = $rowdata['ID'];
                   $data['order_no']   = $rowdata['order_no'];
                   $data['duration'] =  $rowdata['duration']; 
                   $data['revision_description'] =  $rowdata['revision_description']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['createdby']; 
                   $data['approved'] =  $rowdata['approved'];      
                 array_push($details, $data); 
                   $rowcount++;
               }             
         }

       return $details; 
}

function SubmitMyTestionial($testimony_description,$order_no){
   try{
    $params = array(
                      ':testimony' => $testimony_description, 
                      ':order_no' => $order_no, 
                      ':createdon' =>$this->dateToday,
                      ':createdby' =>$this->userid);
  
       $stmtInst  = $this->db->pdo->prepare("INSERT INTO `tbtestimonials` (`createdon`, `createdby`,`testimony`, `order_no`)
                        VALUES (  :createdon, :createdby,:testimony,:order_no);");
      
            $stmtInst->execute($params);
            $affected_rows = $stmtInst->rowCount();        
            if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }         
        }
        catch (PDOException $e) { 
            if ($e->getCode() === 1062) {
                $success  = $e;
                } 
            else {
                 $success = $e;
            }
        }
        return $success;        
}

function find_testimonials($conditons){
    if(empty($conditons)){
        $conditons = '1=1';
    }
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("select A.id, CONCAT( B.`firstname` , ' ', B.`lastname` ) AS `username`,A.createdon,A.testimony,A.order_no "
             . "from tbtestimonials A inner join tbusers B on(A.createdby=B.userid) WHERE $conditons"); 
  
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
         if($rows>0)
         {   
             $rowcount = 0;
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['ID']   = $rowdata['ID'];
                   $data['order_no']   = $rowdata['order_no'];
                   $data['testimony'] =  $rowdata['testimony']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username'];    
                 array_push($details, $data); 
                   $rowcount++;
               }             
         }

       return $details; 
}

function find_users($conditons){
    if(empty($conditons)){
        $conditons = '1=1';
    }
     $details = array(); 
     $stmt    = $this->db->pdo->prepare("select userid,lastname,firstname,emailaddress,phonenumber,gender,user_type,username,B.groupName,country_name,A.createdON,clientid,A.createdby,active from tbusers A 
      inner join tbusergroup B on(A.groupid=B.groupid) 
      inner join tbcountries c on(A.country=c.contryid)  WHERE $conditons"); 
  
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
         if($rows>0)
         {   
             $rowcount = 0;
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $data['userid']   = $rowdata['userid'];
                   $data['clientid']   = $rowdata['clientid'];
                   $data['country']   = $rowdata['country_name'];
                   $data['lastname']   = $rowdata['lastname'];
                   $data['firstname'] =  $rowdata['firstname']; 
                   $data['emailaddress']   = $rowdata['emailaddress'];
                   $data['phonenumber'] =  $rowdata['phonenumber']; 
                   $data['gender']   = $rowdata['gender'];
                   $data['user_type'] =  $rowdata['user_type']; 
                   $data['username']   = $rowdata['username'];
                   $data['groupName'] =  $rowdata['groupName']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['createdby'];  
                   $data['active'] =  $rowdata['active'];     
                 array_push($details, $data); 
                   $rowcount++;
               }             
         }

       return $details; 
}

function find_usergroups($type,$conditions) {
   if(empty($conditions)){
        $conditions='1=1';
    }

     $details = array(); 
     $stmt    = $this->db->pdo->prepare("select A.groupid,groupName,groupDescription,A.`createdon` , B.`username` from tbusergroup A
        INNER JOIN `tbusers` B ON ( B.`userid` = A.`createdby`)
        WHERE $conditions 
        ORDER BY A.groupid ASC"); 
     $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows     = count($num_rows);
        
         if($rows>0)
         {   
             $rowcount = 0;
             if($type ==='dropdown'){

               //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   $details [$rowdata['groupid']] .= $rowdata['groupName']; 
                   $rowcount++;
               }
             }
             else{
              //returns an array of property details
               while($rowcount<$rows){
                   $rowdata = $num_rows[$rowcount];
                   // $data    = array();
                   $data['groupid']   = $rowdata['groupid'];
                   $data['groupName'] =  $rowdata['groupName']; 
                   $data['groupDescription'] =  $rowdata['groupDescription']; 
                   $data['createdon'] =  $rowdata['createdon']; 
                   $data['createdby'] =  $rowdata['username'];      
                 array_push($details, $data); 
                   $rowcount++;

               }
             }
         }

       return $details; 
 }

function save($table,$post_data){
    $success = -1;            
    try {
        $post_data_size = count($post_data);
         $params = array();
         
        if($post_data_size>0){           
         foreach ($post_data as $key => $value) {
            $params[':'.$key.'']= trim($value);
         } 
         }
    $query = "INSERT INTO ".$table."(";  
    $columns = '';
    $values = '';
    $count = 0;
    foreach ($post_data as $key => $value) {
      if($count===0 || $count===$post_data_size){
            $columns = $columns.$key;        
        } 
        else{
             $columns = $columns.','.$key; 
        }
       $count = $count+1;                
    }    
    foreach ($params as $key => $value) {
      if($count===0 || $count==$post_data_size){
        $values = $values.$key;         
        } 
        else{
             $values = $values.','.$key; 
        }
       $count = $count+1;                
    }
    $query = $query .$columns.')  ';
    $query = $query .'VALUES('.$values.')';  
    $stmtInst = $this->db->pdo->prepare($query);  
    $stmtInst->execute($params);
    $affected_rows = $stmtInst->rowCount();
        
       if($affected_rows>0){
            $success       = 'Succsesfull';
            }
            else{
               $success = 'Failed';
            }
        }
        catch (PDOException $e) {
        
            if ($e->getCode() === 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }
        return $success;   
}



}