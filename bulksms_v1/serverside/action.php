<?php
include_once '../serverside/config.php';
include_once('../serverside/OLERead.php');
include_once('../serverside/PhpExcelReader.php');
include_once('../serverside/functions.php');
$fn=new Functions();

//check action type

if(!empty($_POST['actiontype'])){

    //login action
 if($_POST['actiontype']=='login'){

    $responseMessage='-1';
//check if the input is 
if(isset($_POST['myusername']) && !empty($_POST['myusername']) 
  && isset($_POST['mypassword']) && !empty($_POST['mypassword']))
{

    session_destroy();
    session_start();
    $username=$_POST['myusername'];
    $password=$_POST['mypassword'];

    //clean the input to prevent sql iinjection
    $username=  trim($username);
    $password=  trim($password);

    //call  login from functions.php
   $userdetails= $fn->Login($username, $password);
    $fields = explode(":", $userdetails);

    if(!empty($fields[1])){
        
    $_SESSION['fields']=$fields;
    
    $responseMessage= $fields[2];
    $_SESSION['username']=$fields[2];
  
    }   

}
 echo $responseMessage;
 exit;
}
    //
 //addCounty action
    if($_POST['actiontype']=='addCounty'){  

       $responseMessage='-1';       
       //check input
     if(isset($_POST['CountyName']) && !empty($_POST['CountyName'])) {

            $CountyName=trim($_POST['CountyName']);
            $CountyName=strtoupper($CountyName);
            $responseMessage= $fn->AddCounty($CountyName);
          }

        echo $responseMessage;
        
 exit;
    }

 //addConstituency action
    if($_POST['actiontype']=='addConstituency'){  

              $responseMessage='-1';       
       //check input
     if(isset($_POST['ConstituencyName']) && !empty($_POST['ConstituencyName'])) {

            $ConstituencyName=trim($_POST['ConstituencyName']);
            $countyID=trim($_POST['countyID']);
            $ConstituencyName=strtoupper($ConstituencyName);
            $responseMessage= $fn->AddConstituency ($ConstituencyName,$countyID);

          }

        echo $responseMessage;
        
 exit;
    }
    //addPost action
    if($_POST['actiontype']=='addPost'){  

       $responseMessage='-1';       
       //check input
     if(isset($_POST['PostName']) && !empty($_POST['PostName'])) {

            $PostName=trim($_POST['PostName']);
            $PostName=strtoupper($PostName);
            $PostDescription=trim($_POST['PostDescription']);
            $postScope=trim($_POST['postScope']);
            $responseMessage= $fn->AddPost($PostName,$PostDescription,$postScope);
          }

        echo $responseMessage;
        
 exit;
    } 
   //addRole action
    if($_POST['actiontype']=='addRole'){  

       $responseMessage='-1';       
       //check input
     if(isset($_POST['RoleName']) && !empty($_POST['RoleName'])) {

            $RoleName=trim($_POST['RoleName']);
            $RoleName=strtoupper($RoleName);
            $RoleDescription=trim($_POST['RoleDescription']);
            $responseMessage= $fn->AddRole($RoleName,$RoleDescription);
          }

        echo $responseMessage;
        
 exit;
    } 
    
  //add ward action  
      if($_POST['actiontype']=='addward'){  

              $responseMessage='-1';       
       //check input
     if(isset($_POST['wardName']) && !empty($_POST['wardName'])) {

            $wardName=trim($_POST['wardName']);
            $ConstituencyID=trim($_POST['ConstituencyID']);
            $wardName=strtoupper($wardName);
            $responseMessage= $fn->AddWard ($wardName,$ConstituencyID);

          }

        echo $responseMessage;
        
 exit;
    } 

    
  //add createaccount action  
      if($_POST['actiontype']=='createaccount'){  

              $responseMessage='-1';       
       //check input
     if(isset($_POST['nationalID']) && !empty($_POST['nationalID'])) {
                $surName=trim($_POST['surName']);
                $firstName=trim($_POST['firstName']);
                $nationalID=trim($_POST['nationalID']);
                $gender=trim($_POST['gender']);
                $emailAddress=trim($_POST['emailAddress']);
                $phoneNumber=trim($_POST['phoneNumber']);
                $physicalAddress=trim($_POST['physicalAddress']);
                $postID=trim($_POST['postID']);
                $regionID=trim($_POST['regionID']);
            $responseMessage= $fn->CreateAccount($surName, $firstName,$nationalID,$gender, $emailAddress,$phoneNumber,
                    $physicalAddress,$postID,$regionID);

          }

        echo $responseMessage;
        
 exit;
    } 

//LoadConsperCounty action
    
  if($_POST['actiontype']=='LoadConsperCounty'){  

              $responseMessage='-1';       
       //check input
     if(isset($_POST['countyID']) && !empty($_POST['countyID'])) {
         
            $countyID=trim($_POST['countyID']);
            $responseMessage= $fn->GetConstituenciesofCounty ($countyID);
          }

        echo $responseMessage;
        
 exit;
    }
// LoadregionToView    action
     if($_POST['actiontype']=='LoadregionToView'){  

              $responseMessage='-1';       
       //check input
     if(isset($_POST['postID']) && !empty($_POST['postID'])) {
         
            $postID=trim($_POST['postID']);
            $responseMessage= $fn->GetRegiontoViewForPost ($postID);

          }

        echo $responseMessage;
        
 exit;
    }
    
    // AddContact    action
     if($_POST['actiontype']=='addContact'){  

        $responseMessage='-1';       
       //check input
     if(isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])) {
         
            $firstName=trim($_POST['firstName']);
            $otherNames=trim($_POST['otherNames']);
            $phoneNumber=trim($_POST['phoneNumber']);
            $gender=trim($_POST['gender']);
            $yob=trim($_POST['yob']);
            $addaccountselectRegion=trim($_POST['addaccountselectRegion']);
            $responseMessage= $fn->AddContact($firstName,$otherNames,$phoneNumber,$gender,$yob,$addaccountselectRegion);
            
          }

        echo $responseMessage;
        
 exit;
    }
// addcontactgroup
      if($_POST['actiontype']=='addcontactgroup'){  

        $responseMessage='-1';       
       //check input
     if(isset($_POST['groupName']) && !empty($_POST['groupName'])) {
         
            $groupName=trim($_POST['groupName']);
            $GroupDescription=trim($_POST['GroupDescription']);
            $responseMessage= $fn->AddContactGroup($groupName,$GroupDescription);
            
          }

        echo $responseMessage;
        
 exit;
    }  
    //addgroupcontact
   if($_POST['actiontype']=='addgroupcontact'){  

        $responseMessage='-1';       
       //check input
    
     if(isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])) {
            $groupID=trim($_POST['groupID']);
            $firstName=trim($_POST['firstName']);
            $otherNames=trim($_POST['otherNames']);
            $phoneNumber=trim($_POST['phoneNumber']);
            $gender=trim($_POST['gender']);
            $yob=trim($_POST['yob']);
            $addaccountselectRegion=trim($_POST['addaccountselectRegion']);
            $responseMessage= $fn->AddGroupContact($groupID,$firstName,$otherNames,$phoneNumber,$gender,$yob,$addaccountselectRegion);
            
          }

        echo $responseMessage;
        
 exit;
    }  
  //createuser action
   if($_POST['actiontype']=='createuser'){  

        $responseMessage='-1';       
       //check input
     if(isset($_POST['clientID']) && !empty($_POST['clientID'])) {
         
            $clientID=trim($_POST['clientID']);
            $RoleID=trim($_POST['RoleID']);
            $responseMessage= $fn->CreateUser($clientID,$RoleID);
          }

        echo $responseMessage;
        
 exit;
    }  
   //uploadexcelsheet 
    if($_POST['actiontype']=='uploadexcelsheet'){  

//          echo "<script type='javascript'> alert('File Uploaded successfully!');</script>";
               
          $target_dir="fileUplaods/";
           $timeStamp="_".date('Ymdhms');
          $target_file =$target_dir.$timeStamp.basename($_FILES["fileUpload"]["name"]);
         if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {             
//            $fn->ReadExcelSheet($target_file);
//             $fn->AddfiletoDB($target_file);
                $responseMessage='0'; 
//                echo '<script type="javascript">alert("File Uploaded successfully!")</>';
                header("location:./contacts.php");
         }
         else
         {
               $responseMessage='-1';   
         }
        
          
        echo $responseMessage;
        
 exit;
    }   
//
      if($_POST['actiontype']=='uploadexcelsheetgroupcontacts'){  
        
//          echo "<script type='javascript'> alert('File Uploaded successfully!');</script>";
               
          $target_dir="fileUplaods/";
           $timeStamp="_".date('Ymdhms');
          $target_file =$target_dir.$timeStamp.basename($_FILES["fileUpload"]["name"]);
         if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {             
//            $fn->ReadExcelSheet($target_file);
//             $fn->AddfiletoDB($target_file);
                $responseMessage='0'; 
//                echo '<script type="javascript">alert("File Uploaded successfully!")</>';
                 header("location:../contactgroups.php");
         }
         else
         {
               $responseMessage='-1';   
         }
        
          
        echo $responseMessage;
        
 exit;
    }  
}
else
{
    echo $responseMessage;
}
