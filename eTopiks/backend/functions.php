<?php

class Functions
{
    private  $db;
     //constructor
     function __construct() {
       $this->db= new db();
        $this->dateToday=date('Y-m-d H:i:s');
        session_start();       
        $this->userid=$_SESSION['fields'][0];
    
     }
     
        
function  GetAllPosts(){
    
        $details=array(); 
        $stmt = $this->db->pdo->prepare("SELECT tbposts.`postCode` , `postTitle` , 
            `tbcategories`.categoryName, `postDescription` , `postLink` , `linkName` , tbposts.`approvedON` as `createdON` ,
            CONCAT(`tbusers`.`firstname`, ' ', `tbusers`.`lastname`) as username 
            FROM `tbposts`
            INNER JOIN tbcategories ON tbposts.categoryID = tbcategories.categoryID
            INNER JOIN tbusers ON tbposts.createdBY = tbusers.`userid`
            WHERE tbposts.`approved`=1 AND(tbposts.categoryID=1 OR tbposts.categoryID=2) 
            order by cast(tbposts.`approvedON` as datetime)  desc LIMIT 2");      

        $stmt->execute();

        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {   

             $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['createdON']."|".$rowdata['postCode']."|".$rowdata['postTitle']."|"
                         .$rowdata['categoryName']."|".$rowdata['postDescription']."|".$rowdata['postLink']."|"
                         .$rowdata['linkName']."|".$rowdata['username'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }

       return $details;  
   }

function  GetAllPostJustIn(){
    
        $details=array(); 
        $stmt = $this->db->pdo->prepare("SELECT tbposts.`postCode` , `postTitle` , `tbcategories`.categoryName,
            `postDescription` , `postLink` , `linkName` , tbposts.`approvedON` as `createdON` ,
            CONCAT(`tbusers`.`firstname`, ' ', `tbusers`.`lastname`) as username 
            FROM `tbposts`
            INNER JOIN tbcategories ON tbposts.categoryID = tbcategories.categoryID
            INNER JOIN tbusers ON tbposts.createdBY = tbusers.`userid`
            WHERE tbposts.`approved`=1 AND (tbposts.categoryID<>3) 
            order by cast(tbposts.`approvedON` as datetime)  desc LIMIT 4");      

        $stmt->execute();

        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {   

             $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['createdON']."|".$rowdata['postCode']."|".$rowdata['postTitle']."|"
                         .$rowdata['categoryName']."|".$rowdata['postDescription']."|".$rowdata['postLink']."|"
                         .$rowdata['linkName']."|".$rowdata['username'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }

       return $details;  
   }

function  GetAllPostsByClickCount(){
    
        $details=array(); 
        $stmt = $this->db->pdo->prepare("SELECT tbposts.`postCode` , `postTitle` , `tbcategories`.categoryName, `postDescription` , `postLink` , `linkName` , tbposts.`approvedON` as `createdON` ,
            CONCAT(`tbusers`.`firstname`, ' ', `tbusers`.`lastname`) as username
            FROM `tbposts`
            INNER JOIN tbcategories ON tbposts.categoryID = tbcategories.categoryID
            INNER JOIN tbusers ON tbposts.createdBY = tbusers.`userid`
            WHERE tbposts.`approved`=1 order by tbposts.`postclickCount` desc LIMIT 4");      

        $stmt->execute();

        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
             $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['createdON']."|".$rowdata['postCode']."|".$rowdata['postTitle']."|"
                         .$rowdata['categoryName']."|".$rowdata['postDescription']."|".$rowdata['postLink']."|"
                         .$rowdata['linkName']."|".$rowdata['username'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }

       return $details;  
   }
  
function  GetAllPostsByLikeCount(){
    
        $details=array(); 
        $stmt = $this->db->pdo->prepare("SELECT tbposts.`postCode` , `postTitle` , `tbcategories`.categoryName, `postDescription` , `postLink` , `linkName` , tbposts.`approvedON` as `createdON` ,
            CONCAT(`tbusers`.`firstname`, ' ', `tbusers`.`lastname`) as username
            FROM `tbposts`
            INNER JOIN tbcategories ON tbposts.categoryID = tbcategories.categoryID
            INNER JOIN tbusers ON tbposts.createdBY = tbusers.`userid`
            WHERE tbposts.`approved`=1 order by tbposts.`postLikeCount` desc LIMIT 4");      

        $stmt->execute();

        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {
             $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['createdON']."|".$rowdata['postCode']."|".$rowdata['postTitle']."|"
                         .$rowdata['categoryName']."|".$rowdata['postDescription']."|".$rowdata['postLink']."|"
                         .$rowdata['linkName']."|".$rowdata['username'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }

       return $details;  
   }
    
function  GetPostDetails($postCode){
    
        $details; 
        $stmtSel = $this->db->pdo->prepare("SELECT tbposts.`postCode` , `postTitle` , `tbcategories`.categoryName, `postDescription` , `postLink` , `linkName` , tbposts.`approvedON` as `createdON` ,
            CONCAT(`tbusers`.`firstname`, ' ', `tbusers`.`lastname`) as username,`postLikeCount`
            FROM `tbposts`
            INNER JOIN tbcategories ON tbposts.categoryID = tbcategories.categoryID
            INNER JOIN tbusers ON tbposts.createdBY = tbusers.`userid`
            WHERE tbposts.`postCode`=:postCode AND tbposts.`approved`=1
                   ORDER BY cast( tbposts.`approvedON` AS datetime ) DESC LIMIT 1");      
        $stmtSel->bindValue(':postCode', $postCode, PDO::PARAM_STR);
        $stmtSel->execute();

        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {   
             $rowcount=0;               
                 $rowdata=$num_rows[0];
                 $details=$rowdata['createdON']."|".$rowdata['postCode']."|".$rowdata['postTitle']."|"
                         .$rowdata['categoryName']."|".$rowdata['postDescription']."|".$rowdata['postLink']."|"
                         .$rowdata['linkName']."|".$rowdata['username']."|".$rowdata['postLikeCount'];       
                 $rowcount++;
             
         }

       return $details;  
   }
   
function CountClick($postCode)
{
      $success = -1;
       try {
         
        $params=array(':postCode' => $postCode,
                      ':postclickCount' => 1);
        
        $stmtInst= $this->db->pdo->prepare("UPDATE `tbposts` SET `postclickCount`=postclickCount+:postclickCount WHERE `postCode`=:postCode"); 
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

function CountLikes($postCode)
{
      $success = -1;
       try {
         
        $params=array(':postCode' => $postCode,
                      ':postLikeCount' => 1);
        
        $stmtInst= $this->db->pdo->prepare("UPDATE `tbposts` SET `postLikeCount`=postLikeCount+:postLikeCount WHERE `postCode`=:postCode"); 
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
function CountLinkClicks($postCode)
{
      $success = -1;
       try {
         
        $params=array(':postCode' => $postCode,
                      ':linkclickCount' => 1);
        
        $stmtInst= $this->db->pdo->prepare("UPDATE `tbposts` SET `linkclickCount`=linkclickCount+:linkclickCount WHERE `postCode`=:postCode"); 
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
function  GetAllMedia($postCode){   

        $details=array(); 
        $stmt = $this->db->pdo->prepare("SELECT `mediaID`, `mediaPath`, `caption`, `takenBY` "
                . "FROM `tbpostmedia` WHERE `postCode`=:postCode");
        
        $stmt->bindValue(':postCode', $postCode, PDO::PARAM_STR);

        $stmt->execute();

        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         { 
             $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['mediaID']."|".$rowdata['mediaPath']."|".$rowdata['caption']."|".$rowdata['takenBY'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }
       return $details;  
   }
//get posts by Categories
 function  GetAllPostsByCategory($categoryID,$limit){
    
        $details=array(); 
        $stmtSel = $this->db->pdo->prepare("SELECT tbposts.`postCode` , `postTitle` , `tbcategories`.categoryName, `postDescription` , `postLink` , `linkName` , tbposts.`approvedON` AS `createdON` , CONCAT( `tbusers`.`firstname` , ' ', `tbusers`.`lastname` ) AS username
            FROM `tbposts`
            INNER JOIN tbcategories ON tbposts.categoryID = tbcategories.categoryID
            INNER JOIN tbusers ON tbposts.createdBY = tbusers.`userid`
            INNER JOIN tbpostmedia ON tbpostmedia.`postCode`=tbposts.`postCode`
            WHERE  tbposts.categoryID=:categoryID AND tbposts.`approved` =1 order by tbposts.`postclickCount`  desc LIMIT :limit");      
        $stmtSel->bindValue(':categoryID', $categoryID, PDO::PARAM_STR);
        $stmtSel->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmtSel->execute();

        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {   

             $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['createdON']."|".$rowdata['postCode']."|".$rowdata['postTitle']."|"
                         .$rowdata['categoryName']."|".$rowdata['postDescription']."|".$rowdata['postLink']."|"
                         .$rowdata['linkName']."|".$rowdata['username'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }

       return $details;  
   }
   
//getAllCategories   
function  GetAllCategories(){
        $details=array(); 
        $stmt = $this->db->pdo->prepare("SELECT `categoryID`, `categoryName`  FROM `tbcategories` WHERE 1");      
        $stmt->execute();
        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {
              $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount]; 
                 $data= $rowdata['categoryID']."|".$rowdata['categoryName'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }
       return $details;  
   }   

function PostComment($postCode,$visitorsname,$emailaddress,$message_body){
     $success = -1;
        try {  
                $params=array(
                    ':commentBody' => $message_body,
                    ':postCode' => $postCode,
                    ':userName' => $visitorsname, 
                    ':userEmail' => $emailaddress, 
                    ':createdON' =>  $this->dateToday ,
                    ':approved' => 0 );
        
        $stmtInst= $this->db->pdo->prepare("INSERT INTO `tbpostcomments`(`commentBody`, `postCode`, `userName`, `userEmail`, `createdON`, `approved`)  "
                . "VALUES (:commentBody,:postCode,:userName,:userEmail,:createdON,:approved)");
        
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
function  GetAllPostComments($postCode){
    
     $details=array(); 
     $stmt = $this->db->pdo->prepare("SELECT `commentID`, `commentBody`, `userName`, `userEmail`, `createdON` FROM `tbpostcomments` WHERE `postCode`=:postCode AND approved=1 order by commentID desc LIMIT 5");      
     $stmt->bindValue(':postCode', $postCode, PDO::PARAM_STR);
     $stmt->execute();

        $num_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {   
             $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $v_name=$rowdata['userName'];
                 if($v_name===''){$v_name='Anonymous';}
                 $data=$rowdata['commentID']."|".$rowdata['commentBody']."|".$v_name."|"
                         .$rowdata['userEmail']."|".$rowdata['createdON'];      
                 array_push($details, $data); 
                 $rowcount++;
             }
         }

       return $details;  
   }
  
function DateFormater($datetime){
    //this is done by JAACOB PETRO
    
    $strDateformat=''.$datetime;
//    $datetime='2017-03-14 11:32:19';
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

function CheckActivePage($page,$cpage){
    if($page===$cpage){ echo 'active';}
}
function  GetCategoryNameByID($currectPage){
    
        $mdei_fields = explode('=',$currectPage);        
        $details; 
        $stmtSel = $this->db->pdo->prepare("SELECT categoryName FROM `tbcategories` WHERE `categoryID`=:categoryID");      
        $stmtSel->bindValue(':categoryID', $mdei_fields[1], PDO::PARAM_STR);
        $stmtSel->execute();

        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
         $rows=count($num_rows);
        
         if($rows>0)
         {   
             $rowcount=0;               
             $rowdata=$num_rows[0];
             $details=$rowdata['categoryName'];             
         } else{
            $details=''; 
         }

       return $details;  
   }
function  GetCategoryIDByName($categoryName){
      try {
        $details; 
        $stmtSel = $this->db->pdo->prepare("SELECT `categoryID` FROM `tbcategories` WHERE `categoryName`=:categoryName");      
        $stmtSel->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
        $stmtSel->execute();

        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         {   
             $rowcount=0;               
             $rowdata=$num_rows[0];
             $details=$rowdata['categoryID'];             
         }
         else{
            $details=''; 
         }
      }
    catch (PDOException $e) {
    if ($e->getCode() == 1062) {
         $details = $e;
    } else {
         $details = $e;
    }
}
       return $details;  
   }

function GetAllPostsBySearchQuery($SearchQuery)
{
    try {
    $details=array(); 
        $stmtSel = $this->db->pdo->prepare("SELECT tbposts.`postCode` , `postTitle` , `tbcategories`.categoryName, `postDescription` , `postLink` , `linkName` , tbposts.`createdON` , CONCAT( `tbusers`.`firstname` , ' ', `tbusers`.`lastname` ) AS username
            FROM `tbposts`
            INNER JOIN tbcategories ON tbposts.categoryID = tbcategories.categoryID
            INNER JOIN tbusers ON tbposts.createdBY = tbusers.`userid`
            INNER JOIN tbpostmedia ON tbpostmedia.`postCode` = tbposts.`postCode`
            WHERE tbposts.`approved` =1 AND `tbcategories`.categoryName LIKE '%$SearchQuery%'
            OR `tbposts`.postTitle LIKE '%$SearchQuery%' OR  `tbposts`.`linkName` LIKE '%$SearchQuery%' 
            ORDER BY cast( tbposts.`approvedON` AS datetime ) DESC LIMIT 100");      
       
//        $stmtSel->bindValue(':SearchQuery', $SearchQuery, PDO::PARAM_STR);
        $stmtSel->execute();

        $num_rows = $stmtSel->fetchAll(PDO::FETCH_ASSOC);
        $rows=count($num_rows);
        
         if($rows>0)
         { 
             $rowcount=0;
             //returns an array of property details
             while($rowcount<$rows){                 
                 $rowdata=$num_rows[$rowcount];
                 $data=$rowdata['createdON']."|".$rowdata['postCode']."|".$rowdata['postTitle']."|"
                         .$rowdata['categoryName']."|".$rowdata['postDescription']."|".$rowdata['postLink']."|"
                         .$rowdata['linkName']."|".$rowdata['username']."|".$rowdata['mediaPath'];      
                 array_push($details, $data); 
                 $rowcount++;
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
       return $details; 
}
   
}
