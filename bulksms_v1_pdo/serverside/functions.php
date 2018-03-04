<?php

//use db;

class Functions
{
    private  $db;
     //constructor
     function __construct() {
       $this->db= new db();
         session_start();
     }
     
function Login($username,$password){
    
     $userdetails='';
      try {
          
    $stmt = $this->db->pdo->prepare('SELECT `userid`, `msisdn`, `username`, `clientID`, `roleid` FROM `tbusers` '
            . ' WHERE (username=:username OR msisdn=:msisdn) AND userpassword=:password AND active=:active');
    $data= array(':username' => $username,':msisdn'=>$username, ':password' => $password,':active'=>'1');
    $stmt->execute($data);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($rows)>0)
        { 
            $rowdata=$rows[0];
            $userdetails=$rowdata['userid'].":".$rowdata['msisdn'].":".$rowdata['username'].":".$rowdata['clientID'].":"
                    .$rowdata['roleid'];
        }else
        {
            $userdetails="-1"; 
        } 
        
        }
        catch (PDOException $e) {
            if ($e->getCode() == 1062) {
                 $success = $e;
            } else {
                 $success = $e;
            }
        }
        return $userdetails;
   }
   
function AddCounty($CountyName){
     $success = -1;
    try {
         $stmtSel = $this->db->pdo->prepare("SELECT `countyID` FROM `tbcounty` WHERE `countyName`=:CountyName");
         $stmtSel->bindValue(':CountyName', $CountyName, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
       if(count($num_rows)<=0)
        {   
        $data=array(':CountyName' => $CountyName, ':createdBY' => $_SESSION['username']);
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbcounty`(`countyName`,`createdBY`) VALUES (:CountyName,:createdBY)");
        $stmtInst->execute($data);
        $affected_rows = $stmtInst->rowCount();
        
        if($affected_rows>0){
        $success = 0;        
        }
        
      }
        }
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                 $success = $e;
            } else {
                 $success = $e;
            }
        }
         return $success;
   }
function AddCounty_($CountyName){

    $success = -1;
        try {
            //check if county exist
        $execute = mysql_query("SELECT `countyID` FROM `tbcounty` WHERE `countyName`='$CountyName'") or die(mysql_error());
        $num_rows=mysql_num_rows($execute);
        if($num_rows<=0)
        {             
            if (mysql_query("INSERT INTO `tbcounty`(`countyName`,`createdBY`) VALUES ('"
            .$CountyName."','".$_SESSION['username']."')")) {
                $success = 0;
            } 
            else {
                $success .= mysql_error();
            }
        }
        } catch (Exception $e) {
            $success = $e;
        }

        return $success;

       
   }

function AddPost($PostName,$PostDescription,$postScope){
        $success = -1;
         try {
             
         $stmtSel = $this->db->pdo->prepare("SELECT `postID`  FROM `tbpost` WHERE  `postName`=:PostName");
         $stmtSel->bindValue(':PostName', $PostName, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params=array(':PostName' => $PostName,
                    ':PostDescription' => $PostDescription, 
                    ':postScope' => $postScope, 
                    ':createdBY' => $_SESSION['username']);
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbpost`(`postName`, `PostDescription`,`postScope` ,`createdBY`)  "
                . "VALUES (:PostName,:PostDescription,:postScope,:createdBY)");
         
       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;

            }

          }
        }
        catch (PDOException $e) {
            if ($e->getCode() == 1062) {
                $success = $e;
            } else {
                $success = $e;
            }
        }

        return $success;
   }
   
function AddRole($RoleName,$RoleDescription){
        $success = -1;
          try {
             
         $stmtSel = $this->db->pdo->prepare("SELECT `roleid` FROM `tbroles` WHERE `roleName`=:RoleName");
         $stmtSel->bindValue(':RoleName', $RoleName, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params=array(':RoleName' => $RoleName,
                      ':RoleDescription' => $RoleDescription, 
                      ':createdBY' => $_SESSION['username']);
        
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbroles`(`roleName`, `roleDescription`, `createdBy`)  "
                . "VALUES (:RoleName,:RoleDescription,:createdBY)");
         
       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;

            }

          }
        }
        catch (PDOException $e) {
            if ($e->getCode() == 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }
        return $success;
   }
  
function  AddConstituency ($constituencyName,$countyID) {
    $success = -1;
     try {
             
         $stmtSel = $this->db->pdo->prepare("SELECT `constituencyID` FROM `tbconstituency` WHERE `constituencyName`=:constituencyName");
         $stmtSel->bindValue(':constituencyName', $constituencyName, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params=array(':constituencyName' => $constituencyName,
                      ':countyID' => $countyID, 
                      ':createdBY' => $_SESSION['username']);
        
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbconstituency`(`constituencyName`, `countyID`, `createdBY`)  "
                . "VALUES (:constituencyName,:countyID,:createdBY)");
         
       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;
            }
          }
        }
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }
        return $success;       
   }
   
   //AddWard ($wardName,$ConstituencyID)
function AddWard ($wardName,$ConstituencyID){
       $success = -1;
       try {
             
         $stmtSel = $this->db->pdo->prepare("SELECT `wardID` FROM `tbward` WHERE `wardName`=:wardName");
         $stmtSel->bindValue(':wardName', $wardName, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params=array(':wardName' => $wardName,
                      ':constituencyID' => $ConstituencyID, 
                      ':createdBY' => $_SESSION['username']);
        
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbward`(`wardName`, `constituencyID`, `createdBY`)  "
                . "VALUES (:wardName,:constituencyID,:createdBY)");
         
       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;
            }
          }
        }
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }

        return $success;
   }
   
function  CreateAccount($surName, $firstName,$nationalID,$gender, $emailAddress,$phoneNumber,
                    $physicalAddress,$postID,$regionID){
      $success = -1;
        try {
             
         $stmtSel = $this->db->pdo->prepare("SELECT `clientID` FROM `tbclient` WHERE `nationalID`=:nationalID");
         $stmtSel->bindValue(':nationalID', $nationalID, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params=array(':surName' => $surName,
                      ':firstName' => $firstName, 
                      ':nationalID' => $nationalID,
                      ':gender' => $gender, 
                      ':emailAddress' => $emailAddress,
                      ':phoneNumber' => $phoneNumber, 
                      ':physicalAddress' => $physicalAddress,
                      ':postID' => $postID,
                      ':regionToVie' => $$regionID,
                      ':createdBY' => $_SESSION['username'], 
                      ':Active' => 1);
        
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbclient`(`surName`, `firstName`, `nationalID`, `gender`, "
                    . "`emailAddress`, `phoneNumber`, `physicalAddress`, `postID`, `regionToVie`, `createdBY`, `Active`)  "
                . "VALUES (:surName,:firstName,:nationalID,:gender,:emailAddress,:phoneNumber,:physicalAddress,:postID,:regionToVie,:createdBY,:Active)");
         
       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;
            }
          }
        }
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }
        return $success;
   } 

//       //get the GetAllCounties()
function GetAllCounties(){
    
         $countydetails=array();
         
         $stmt = $this->db->pdo->prepare("SELECT `countyID`, `countyName`  FROM `tbcounty` WHERE 1");      
         $stmt->execute();
         $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['countyID'].":".$rowdata['countyName'];      
                 array_push($countydetails, $data); 
                 $rowcount++;
             }
         }
       return $countydetails;  
     }
     
function GetAllCountiesFormated() {
        $data='';
        $stmt = $this->db->pdo->prepare("SELECT `countyID`, `countyName`  FROM `tbcounty` WHERE 1");      
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                 $data.= "<option value='".$rowdata['countyID']."'>".$rowdata['countyName']."</option>";
                 $rowcount++;
             }
         }
       return $data;  
     }
     
    //getallposts
function  GetAllPosts(){
    
        $postdetails=array(); 
        $stmt = $this->db->pdo->prepare("SELECT `postID`, `postName` FROM `tbpost` WHERE 1");      
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['postID'].":".$rowdata['postName'];      
                 array_push($postdetails, $data); 
                 $rowcount++;
             }
         }
       return $postdetails;  
   }
   
function GetAllActiveAccounts(){    
        $accountdetails=array();
         
        $stmtSel = $this->db->pdo->prepare("SELECT `clientID`,`surName`, `firstName` FROM `tbclient` WHERE `Active`=:Active");      
        $stmtSel->bindValue(':Active', 1, PDO::PARAM_INT);
        $stmtSel->execute();
        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['clientID'].":".$rowdata['surName'].":".$rowdata['firstName']; ;      
                 array_push($accountdetails, $data); 
                 $rowcount++;
             }
         }
       return $accountdetails;  
   }
   //getallposts
function  GetAllPostsFormated(){
         $data='';
         $stmt = $this->db->pdo->prepare("SELECT `postID`, `postName` FROM `tbpost` WHERE 1");      
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                $data.= "<option value='".$rowdata['postID']."'>".$rowdata['postName']."</option>";      
                 $rowcount++;
             }
         }
       return $data;  
   }
   
function   GetAllRoles(){
         $data='';
        $stmt = $this->db->pdo->prepare("SELECT `roleid`, `roleName` FROM `tbroles` WHERE 1");      
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount]; 
                $data.= "<option value='".$rowdata['roleid']."'>".$rowdata['roleName']."</option>";      
                 $rowcount++;
             }
         }
       return $data;  
   }
function GetConstituenciesofCounty ($countyID){
        
        $data='';
        $stmt = $this->db->pdo->prepare("SELECT `constituencyID`, `constituencyName` FROM `tbconstituency` "
                . "WHERE `countyID`=:countyID");   
        $stmt->bindValue(':countyID', $countyID, PDO::PARAM_STR);
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data.= "<option value='".$rowdata['constituencyID']."'>".$rowdata['constituencyName']."</option>";
                 $rowcount++;
             }
         }
       return $data; 
     }
     
function   GetRegiontoViewForPost($postID){
        //this requires certain logic, based on the post one can either be in county, constituecny or ward
           $data='';
      //MP
           //get the scope using the postID
        $_stmt = $this->db->pdo->prepare("SELECT  `postScope`  FROM `tbpost` WHERE `postID`=:postID");
        $_stmt->bindValue(':postID', $postID, PDO::PARAM_INT);
        $_stmt->execute();
        $_num_rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);
        $_rows=count($_num_rows);
        
         if($_rows>0)
         {  
             $_rowdata=$_num_rows[0];
             $scope=$_rowdata['postScope'];
             
        switch ($scope){
        case 1:case '1':
                     //county
        $data='';
        $stmt = $this->db->pdo->prepare("SELECT `countyID`, `countyName`FROM `tbcounty` WHERE 1");   
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data.= "<option value='".$rowdata['countyID']."'>".$rowdata['countyName']."</option>";
                 $rowcount++;
             }
         }
        break;
        
      case 2:case '2':
        //Constituency
        $stmt = $this->db->pdo->prepare("SELECT `constituencyID`, `constituencyName` FROM `tbconstituency` WHERE 1");   
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                  
                 $rowdata=$num_rows[$rowcount];
                 $data.= "<option value='".$rowdata['constituencyID']."'>".$rowdata['constituencyName']."</option>";
                 $rowcount++;
             }
         }
        break;
    
      case 3:case '3':
        //Ward
        $data='';
        $stmt = $this->db->pdo->prepare("SELECT `wardID`, `wardName` FROM `tbward` WHERE 1");   
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                 $data.= "<option value='".$rowdata['wardID']."'>".$rowdata['wardName']."</option>";
                 $rowcount++;
             }
         }
        break;

    default:
        //any other post is given county for now
        $data='';
        $stmt = $this->db->pdo->prepare("SELECT `countyID`, `countyName`FROM `tbcounty` WHERE 1");   
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data.= "<option value='".$rowdata['countyID']."'>".$rowdata['countyName']."</option>";
                 $rowcount++;
             }
         }
    break;
             }
         }
   
       return $data; 
     }
     
function CreateUser($clientID,$RoleID){
        $success = -1;
        try {
            //get the client details
            $accountdetails=$this->GetAccountDetails($clientID);
             $fields = explode(":", $accountdetails[0]);
             $emailAddress=$fields[1];
             $phoneNumber=$fields[2];             
             $userpassword=mt_rand(100000, 999999);
            //check if user exist
        $stmt = $this->db->pdo->prepare("SELECT `userid` FROM `tbusers` WHERE `msisdn`=:phoneNumber' OR `username`=:emailAddress");   
        $stmt->bindValue(':$phoneNumber', $$phoneNumber, PDO::PARAM_STR);
        $stmt->bindValue(':emailAddress', $emailAddress, PDO::PARAM_STR);
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
           
        $params=array(':msisdn' => $phoneNumber,
                      ':username' => $emailAddress, 
                      ':userpassword' => $userpassword,
                      ':clientID' => $clientID, 
                      ':roleid' => $RoleID,
                      ':createdBY' => $_SESSION['username'], 
                      ':active' => 1);
        
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbusers`(`msisdn`, `username`, `userpassword`, `active`, `clientID`, `roleid`, `createdby`)  "
                . "VALUES (:msisdn,:username,:userpassword,:active,:clientID,:roleid,:createdBY)");
         
       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;
            }
          }
        }
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }

        return $success; 
     }

function GetAccountDetails($clientID) {
    
        $accountdetails=array();
        $stmt = $this->db->pdo->prepare("SELECT `clientID`, `emailAddress`, `phoneNumber`, `postID`, `regionToVie` FROM `tbclient` WHERE `clientID`=:clientID");   
        $stmt->bindValue(':clientID', $clientID, PDO::PARAM_INT);
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                $rowdata=$num_rows[$rowcount];
                $data=$rowdata['clientID'].":".$rowdata['emailAddress'].":".$rowdata['phoneNumber'].":"
                        .$rowdata['postID'].":".$rowdata['regionToVie'];       
                array_push($accountdetails, $data); 
                $rowcount++;
            }
        }
      return $accountdetails;  
    }   
      
public function toCurrency($stringValue){
  $oneThousand=1000;
  $tenThousand=10000;
  $hundredThousand=100000;
  $oneMillion=1000000;
  $tenMillion=10000000;
  $hundredmillion=100000000;
 $oneBillion=1000000000;

    $intValue=$stringValue;
    $formatedString=$stringValue;
    $neg=0;//negative value
    
   if($intValue<0) {
       $formatedString=substr($formatedString,1, strlen($formatedString)) ;
       $intValue=$formatedString;
       $neg=-1;
   }
    
   if($intValue<$oneThousand)
  {
    $formatedString=$stringValue;//return it vile iko
  }
  else if($intValue>=$oneThousand && $intValue<$tenThousand)
  {
    //break the string twice from index 0-1
      $thousand= substr($formatedString,0,1);
      $tail= substr($formatedString, 1, strlen($formatedString));
      $formatedString=$thousand.",".$tail;
  }
  else if($intValue>=$tenThousand && $intValue<$hundredThousand)
  {
    //break twice from the second text
       $thousand= substr($formatedString,0,2);//formatedString.substring(0, 2);
       $tail=substr($formatedString, 2, strlen($formatedString));//formatedString.substring(2,formatedString.length);
      $formatedString=$thousand.",".$tail;
  }

 else if($intValue>=$hundredThousand && $intValue<$oneMillion)
  {
    $thousand= substr($formatedString,0,3);//formatedString.substring(0, 3);
       $tail=substr($formatedString, 3, strlen($formatedString));//formatedString.substring(3,formatedString.length);
      $formatedString=$thousand.",".$tail;
  }

 else if($intValue>=$oneMillion && $intValue<$tenMillion)
  {
    
  //break it thrice
      $thousand= substr($formatedString,0,1);//formatedString.substring(0, 1);
      $tail= substr($formatedString,1,3);//formatedString.substring(1,4);
      $tail2=substr($formatedString, 4, strlen($formatedString));//formatedString.substring(4,formatedString.length);
      $formatedString=$thousand.",".$tail.",".$tail2;
      }
 else if($intValue>=$tenMillion && $intValue<$hundredmillion)
  {
  //break it thrice
   $thousand= substr($formatedString,0,2);//formatedString.substring(0, 2);
       $tail= substr($formatedString,2,3);//formatedString.substring(2,5);
       $tail2=substr($formatedString, 5, strlen($formatedString));//formatedString.substring(5,formatedString.length);
      $formatedString=$thousand.",".$tail.",".$tail2;
     
  }

  else if($intValue>=$hundredmillion && $intValue<$oneBillion)
  {
   //break it thrice
   $thousand= substr($formatedString,0,3);//formatedString.substring(0, 3);
       $tail= substr($formatedString,3,3);//formatedString.substring(3,6);
       $tail2=substr($formatedString, 6, strlen($formatedString));//formatedString.substring(6,formatedString.length);
      $formatedString=$thousand.",".$tail.",".$tail2;
  }
  else if($intValue>=$oneBillion)
  {
     //break it four times
        $thousand= substr($formatedString,0,1);//formatedString.substring(0, 1);
       $tail= substr($formatedString,1,3);//formatedString.substring(1,4);
       $tail2= substr($formatedString,4,3);//formatedString.substring(4,7);
      $tail3=substr($formatedString, 7, strlen($formatedString));//formatedString.substring(7,formatedString.length);
      $formatedString=$thousand.",".$tail.",".$tail2.",".$tail3;
  }
  else
  {
    $formatedString=$stringValue;
  }
  if($neg==-1){
      $formatedString="-". $formatedString; 
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
        $errorFile = 'CONTACTS_IMPORTATION_ERROR_DOC_' . date('dMY');
        $tbl_header = '<table border="1"cellpadding= "2" cellspacing = "2" >';
        $tbl_footer = '</table>';

$containErrors=0;
        $tbl = '';
        $tbl .= '<tr>' . '<th>PHONENUMBER</th></tr>';

        $x = 1;
        
$numRows=$sheet['numRows']+1;
 do {
        $x++;       
        $validator=0;

    if($x==$numRows){          break;   
         
       }

    else {             
           
            if(!empty($sheet['cells'][$x]) && $x<$numRows){ 
             //read the cell
                //the cells should be six                
                     if(!empty($sheet['cells'][$x][1])){
                      $PhoneNumber = $sheet['cells'][$x][1];
                         }
             
        //validate phone number
        if(!(strlen($PhoneNumber)==12))
          {          
            $validator=1;
            $remarks="Invalid Phone number; The Phone number ".$PhoneNumber." length is not equal to 12";
            $tbl .='<tr><td style="color:red;">' . $remarks. '</td>' . '</tr>';
          }

    if($validator==0){        
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

      if($containErrors==1){

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
        else if($containErrors==0)
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
        
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbfileuploads`(`filename`, `filestatus`, `createdBY`)  "
                . "VALUES (:filename,:filestatus,:createdBY)");
               
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
        if($affected_rows>0){
        $success = 0;
        }
            
    }       
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                $success = $e;
            } 
            else {
                 $success = $e;
            }
        }

        return $success; 
     }

function  GetAllWards(){
        $data='';
        $stmt = $this->db->pdo->prepare("SELECT `wardID`, `wardName` FROM `tbward` WHERE 1");   
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                 $data.= "<option value='".$rowdata['wardID']."'>".$rowdata['wardName']."</option>";
                 $rowcount++;
             }
         }
       return $data;  
   }
   
   //ADDCONTACT
function AddContact($firstName,$otherNames,$phoneNumber,$gender,$yob,$addaccountselectRegion){
       $success = -1;
        try {
             
         $stmtSel = $this->db->pdo->prepare("SELECT `profileID` FROM `tbprofile` WHERE `msisdn`=:phoneNumber");
         $stmtSel->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params=array(':firstName' => $firstName,
                      ':otherNames' => $otherNames, 
                      ':clientID' => $_SESSION['fields'][0],
                      ':gender' => $gender, 
                      ':YOB' => $yob,
                      ':msisdn' => $phoneNumber, 
                      ':regionID' => $addaccountselectRegion,
                      ':createdBY' => $_SESSION['username']);
        
$stmtInst= $this->db->pdo->prepare("INSERT INTO `tbprofile`(`msisdn`,`firstName`,`otherNames`,`clientID`,`YOB`,`gender`,`regionID`,`createdBY`)"
        . "  VALUES(:msisdn,:firstName,:otherNames,:clientID,:gender,:YOB,:regionID,:createdBY)");

       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;
            }
          }
        }
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                $success = '-1';
            } 
            else {
                 $success = '-1';
            }
        }
        return $success; 
   }
 
 function AddContactGroup($groupName,$GroupDescription){
     $success = -1;
        try {
             
         $stmtSel = $this->db->pdo->prepare("SELECT `groupID` FROM `tbcontactgroup` WHERE `groupName`=:groupName");
         $stmtSel->bindValue(':groupName', $groupName, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params=array(':groupName' => $groupName,
                      ':GroupDescription' => $GroupDescription, 
                      ':clientID' => $_SESSION['fields'][0],
                      ':status' => 1,
                      ':createdBY' => $_SESSION['username']);
        
$stmtInst= $this->db->pdo->prepare("INSERT INTO `tbcontactgroup`(`groupName`, `groupDescription`, `cleintID`, `status`, `createdBy`) "
        . "  VALUES(:groupName,:GroupDescription,:clientID,:status,:createdBY)");

       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;
            }
          }
        }
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                $success = '-1';
            } 
            else {
                 $success = '-1';
            }
        }
        return $success; 
 }  
 
 function AddGroupContact($groupID,$firstName,$otherNames,$phoneNumber,$gender,$yob,$addaccountselectRegion){
      $success = -1;
        try {
             
         $stmtSel = $this->db->pdo->prepare("SELECT `profileID` FROM `tbprofile` WHERE `msisdn`=:phoneNumber");
         $stmtSel->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
         
         $stmtSel->execute();
         $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         
        $params=array(
                      ':groupID' => $groupID, 
                      ':firstName' => $firstName,
                      ':otherNames' => $otherNames, 
                      ':clientID' => $_SESSION['fields'][0],
                      ':gender' => $gender, 
                      ':YOB' => $yob,
                      ':msisdn' => $phoneNumber, 
                      ':regionID' => $addaccountselectRegion,
                      ':createdBY' => $_SESSION['username']);
        
$stmtInst= $this->db->pdo->prepare("INSERT INTO `tbprofile`(`msisdn`,`firstName`,`otherNames`,`clientID`,`groupID`,`YOB`,`gender`,`regionID`,`createdBY`)"
        . "  VALUES(:msisdn,:firstName,:otherNames,:clientID,:groupID,:gender,:YOB,:regionID,:createdBY)");

       if(count($num_rows)<=0)
        {  
        $stmtInst->execute($params);
        $affected_rows = $stmtInst->rowCount();
        
            if($affected_rows>0){
            $success = 0;
            }
          }
        }
        catch (PDOException $e) {

            if ($e->getCode() == 1062) {
                $success = '-1';
            } 
            else {
                 $success = '-1';
            }
        }
        return $success; 
 }
         
function GetAllmyConatcts(){    
        $accountdetails=array();
         $userid=$_SESSION['fields'][0];
        $stmtSel = $this->db->pdo->prepare("SELECT `profileID`, `msisdn`, `firstName`, `otherNames`, `YOB`, `gender`, `regionID`, `createdON`, `createdBY` FROM `tbprofile` WHERE `clientID`=:clientID");      
        $stmtSel->bindValue(':clientID', $userid, PDO::PARAM_INT);
        $stmtSel->execute();
        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['profileID'].":".$rowdata['msisdn'].":".$rowdata['firstName'].":"
                         .$rowdata['otherNames'].":".$rowdata['YOB'].":".$rowdata['gender'].":".$rowdata['regionID'];       
                 array_push($accountdetails, $data); 
                 $rowcount++;
             }
         }
       return $accountdetails;  
   }
   
 //get my contact group that i created myself  
function GetAllmyConatctsGroup(){    
    
        $data='';
        $userid=$_SESSION['fields'][0];
        $stmtSel = $this->db->pdo->prepare("SELECT `groupID`, `groupName`, `groupDescription`,`createdON`, `createdBy` FROM `tbcontactgroup` WHERE `cleintID`=:clientID");      
        $stmtSel->bindValue(':clientID', $userid, PDO::PARAM_INT);
        $stmtSel->execute();
        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];                        
                 $data.= "<option value='".$rowdata['groupID']."'>".$rowdata['groupName']."</option>"; 
                 $rowcount++;
             }
         }
       return $data;  
   }
function GetAllmyConatctsGroup2(){      
       
        $details=array();
        $userid=$_SESSION['fields'][0];
        $stmtSel = $this->db->pdo->prepare("SELECT `groupID`, `groupName`, `groupDescription`,`createdON`, `createdBy` FROM `tbcontactgroup` WHERE `cleintID`=:clientID");      
        $stmtSel->bindValue(':clientID', $userid, PDO::PARAM_INT);
        $stmtSel->execute();
        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];                        
                 $data=$rowdata['groupID'].":".$rowdata['groupName'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }
       return $details;  
   }  

//get the scope and the region
function GetPostScopeandRegion($clientID){
   
     $userdetails='';
      try {
          
    $postdetails=$this->GetAccountDetails($clientID);  
    $fields = explode(":", $postdetails[0]);
    $postID=$fields[3];//get the data in column 3 which is postID
    $regionID=$fields[4];//regionID to vie for
    $stmt = $this->db->pdo->prepare('SELECT `postScope` FROM `tbpost` WHERE `postID`=:postID');
    $stmt->bindValue(':postID', $postID, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($rows)>0)
        { 
            $rowdata=$rows[0];
            $userdetails=$rowdata['postScope'].":".$regionID;
        }else
        {
            $userdetails="-1"; 
        } 
        
        }
        catch (PDOException $e) {
            if ($e->getCode() == 1062) {
                 $success = $e;
            } else {
                 $success = $e;
            }
        }
        return $userdetails; 
}

function GetContactsBasedonScope($scopeID,$regionID)
{
    $contactsdetails=array();
    //check if the scope is 1,2 or 3
    switch ($scopeID)
    {
        case 1:case '1'://county
            //get all the contacts that belongs to this county
            $contactsdetails=$this->GetAllConatctsByCounty($regionID);
            break;
        case 2:case '2'://constituency
            $contactsdetails=$this->GetAllConatctsByConstituency($regionID);
            break;
        case 3:case '3'://ward
           $contactsdetails=$this->GetAllConatctsByWard($regionID); 
            break;
        
        default:
            $contactsdetails=$this->GetAllConatctsByCounty($regionID);
            break;
    }
    
    return $contactsdetails;
}

function GetMyRegionContacts(){
   $contactsdetails=array();
   //GetPostScopeandRegion
   $clientID=$_SESSION['fields'][3];
   
   $scopenregion=$this->GetPostScopeandRegion($clientID);
   $fields = explode(":", $scopenregion);
   
  if(!empty($fields[1])){
   $scopeID=$fields[0];
   $regionID=$fields[1];
//get the contacts here   
   $contactsdetails=$this->GetContactsBasedonScope($scopeID,$regionID);
   
   
  }
   
   
   
   
   return $contactsdetails;
}

function GetAllConatctsByWard($wardID){  
    
        $accountdetails=array();
        $stmtSel = $this->db->pdo->prepare("SELECT `profileID`, `msisdn`, `firstName`, `otherNames`, `YOB`, `gender`, `regionID`, `createdON`, `createdBY` FROM `tbprofile` WHERE `regionID`=:regionID");      
        $stmtSel->bindValue(':regionID', $wardID, PDO::PARAM_INT);
        $stmtSel->execute();
        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['profileID'].":".$rowdata['msisdn'].":".$rowdata['firstName'].":"
                         .$rowdata['otherNames'].":".$rowdata['YOB'].":".$rowdata['gender'].":".$rowdata['regionID'];       
                 array_push($accountdetails, $data); 
                 $rowcount++;
             }
         }
       return $accountdetails;  
   }

function GetAllConatctsByConstituency($constituencyID){  
    
        $accountdetails=array();
        
        $stmtSel = $this->db->pdo->prepare("SELECT `wardID` FROM `tbward` WHERE `constituencyID`=:constituencyID");      
        $stmtSel->bindValue(':constituencyID', $constituencyID, PDO::PARAM_INT);
        $stmtSel->execute();
        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                 $data=$this->GetAllConatctsByWard($rowdata['wardID']);
                 array_push($accountdetails, $data); 
                 $rowcount++;
             }
         }
       return $accountdetails;  
   }
   
function GetAllConatctsByCounty($countyID){  
    
        $accountdetails=array();
        
        $stmtSel = $this->db->pdo->prepare("SELECT `constituencyID` FROM `tbconstituency` WHERE `countyID`=:countyID");      
        $stmtSel->bindValue(':countyID', $countyID, PDO::PARAM_INT);
        $stmtSel->execute();
        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                
                 $rowdata=$num_rows[$rowcount];
                 $data=$this->GetAllConatctsByConstituency($rowdata['constituencyID']);
                 array_push($accountdetails, $data); 
                 $rowcount++;
             }
         }
       return $accountdetails;  
   }
 
   
   
   
   
   
   
   
}
?>