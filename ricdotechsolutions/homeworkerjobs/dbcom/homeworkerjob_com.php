<?php

class HomeWorkerJobsDAO {

    public $userpassword;
    public $userId;
    public $filenames;//=new array();
    
  

    //setters
    function setPassword($userpassword) {
        $this->userpassword = $userpassword;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    //getters
    function getPassword() {
        return $this->userpassword;
    }

    function getPUserId() {
        return $this->userId;
    }

    //getPapers
    function getPapers() {
        $options = array();
        $i = 0;
        $execute = mysql_query("SELECT * FROM papers") or die(mysql_error());

        while ($row = mysql_fetch_assoc($execute)) {
            $options[$i] = "<option value=" . $row['idpapers'] . "-" . $row['pprice'] . " >" . $row['pname'] . "</option>";
            $i++;
        }

        return $options;
    }

    //getpages   
    function getPages() {
        $options = array();
        $i = 0;
        $execute = mysql_query("SELECT * FROM pages") or die(mysql_error());

        while ($row = mysql_fetch_assoc($execute)) {
            $options[$i] = "<option value=" . $row['idpages'] . "-" . $row['idpages'] . " >" . $row['pname'] . "</option>";
            $i++;
        }
        return $options;
    }

    //getpages   
    function getAcademicLevels() {
        $options = array();
        $i = 0;
        $execute = mysql_query("SELECT * FROM `academic_level` WHERE 1") or die(mysql_error());

        while ($row = mysql_fetch_assoc($execute)) {
            $options[$i] = "<option value=" . $row['academic_id'] . "-" . $row['academic_cost'] . " >" . $row['academic_level'] . "</option>";
            $i++;
        }
        return $options;
    }

    //get urgencies
    //getpages   
    function getUrgencies() {
        $options = array();
        $i = 0;
        $execute = mysql_query("SELECT * FROM `urgency`") or die(mysql_error());

        while ($row = mysql_fetch_assoc($execute)) {
            $options[$i] = "<option value=" . $row['urgencyid'] . "-" . $row['urgency_price'] . " >" . $row['urgency_name'] . "</option>";
            $i++;
        }
        return $options;
    }

    //Login   
    function Login($emailaddress, $userpassword) {
        $success = 1;
        try {
            $execute = mysql_query("SELECT `userid`,`isadmin` FROM `account` WHERE `emailaddress`='"
                    . $emailaddress . "' AND `userpassword`='"
                    . $userpassword . "' AND `loginstatus`=0;") or die(mysql_error());

            $rows = mysql_num_rows($execute);

            if ($rows > 0) {
                $row = mysql_fetch_assoc($execute);
                session_start();
                $_SESSION["UserID"] = $row["userid"];
                $_SESSION["emailaddress"] = $emailaddress;
                $this->setUserId($row["userid"]);
                $this->getUserDetails($this->userId);
                
                if($row["isadmin"]!=0)
                {
                   $success = 2; 
                }
                else
                {
                    $success = 0;
                }
                
            } else {
                $success = 1;
            }
        } catch (Exception $e) {
            $success = $e;
        }
        return $success;
    }

    function quote($str) {
        $str = "'" . $s . "'";
        return $str;
    }

    function RegisterUser($surname, $firstname, $lastname, $phonenumber, $country, $userid) {
        $success = 1;
        try {
            $datecreated = date('m-d-Y');

            if (mysql_query("INSERT INTO `users`(`iduser`, `surname`, `firstname`, `lastname`, `phonenumber`, `country`, `datecreated`, `userid`) 
                             VALUES (NULL,'" . $surname . "','" . $firstname . "','" . $lastname . "','" . $phonenumber . "','" . $country . "','" . $datecreated . "'," . $userid . ");")) {
                $success = 0;
            } else {
                $success .= mysql_error();
            }
        } catch (Exception $e) {
            $success = $e;
        }


        return $success;
    }

    function updateUser($surname, $firstname, $lastname, $phonenumber, $country, $userid) {
        $success = 1;
        try {

            if (mysql_query("UPDATE `users` SET `surname`='$surname',`firstname`='$firstname',`lastname`='$lastname',`phonenumber`='$phonenumber',`country`='$country' WHERE `userid`=$userid;")) {
                $success = 0;
            } else {
                $success .= mysql_error();
            }
        } catch (Exception $e) {
            $success = $e;
        }
        return $success;
    }

    function CreateAccount($emailaddress) {
        $success = 1;
        try {
            $userpassword = "p" . mt_rand(20, 100) . "h" . date("iw") . "k";
            $this->setPassword($userpassword);
            $this->Login($emailaddress, $userpassword);
            if (mysql_query("INSERT INTO `account`(`userid`, `emailaddress`, `userpassword`, `loginstatus`) 
                VALUES (NULL,'" . $emailaddress . "','" . $userpassword . "',0)")) {
                $success = 0;
            } else {
                $success = 1;
            }
        } catch (Exception $e) {
            echo $e;
        }


        return $success;
    }

    function CheckSeeion() {
        error_reporting(0);
        session_start();
        $user = "Unknown";
        if (!empty($_SESSION["UserID"])) {
            $user = "Hi " . $_SESSION["firstName"];
        } else {
            echo '<script language=javascript>location.href="./index.php";</script>';
        }

        return $user;
    }

    function getUserDetails($userid) {
        $success = 1;
        try {
            $execute = mysql_query("SELECT `surname`, `firstname`, `lastname`, `phonenumber`, `country`
                FROM `users` LEFT JOIN `account` ON(`account`.`userid`=`users`.`userid`) 
                WHERE `account`.`userid`=" . $userid) or die(mysql_error());

            $rows = mysql_num_rows($execute);

            if ($rows > 0) {
                $row = mysql_fetch_assoc($execute);
                $_SESSION["firstName"] = $row["firstname"];
                $_SESSION["surname"] = $row["surname"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["phonenumber"] = $row["phonenumber"];
                $_SESSION["country"] = $row["country"];
                $success = 0;
            } else {
                $success = 1;
            }
        } catch (Exception $e) {
            $success = $e;
        }

        return $success;
    }

    function getOrderDetails($surname, $firstname, $lastname, $phonenumber, $country, $emailaddress, $topic,
            $typeofdocument, $writing_style, $SubujectArea, $numberofpages, $urgency, $language, $academic_level, $instruction, $spacing, $receivecalls, $totalcost,$uploadedfiles) {
        $success = 1;
        try {
            session_start();
            #-----Persona details-----------#
            $_SESSION["surname"] = $surname;
            $_SESSION["firstName"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["phonenumber"] = $phonenumber;
            $_SESSION["country"] = $country;
            $_SESSION["emailaddress"] = $emailaddress;

            #----Order details-----#
            $_SESSION["orderno"] = 'h' . date('dmiG');
            $_SESSION["topic"] = $topic;
            $_SESSION["typeofdocument"] = $typeofdocument;
            $_SESSION["writing_style"] = $writing_style;
            $_SESSION["SubujectArea"] = $SubujectArea;
            $_SESSION["numberofpages"] = $numberofpages;
            $_SESSION["urgency"] = $urgency;
            $_SESSION["language"] = $language;


            #----Other related details----#      


            $_SESSION["academic_level"] = $academic_level;
            $_SESSION["instruction"] = $instruction;
            if ($spacing == 1) {
                $_SESSION["spacing"] = 'Single';
            } else {
                $_SESSION["spacing"] = "Double";
            }
            $_SESSION["orderdate"] = date('d-m-Y');
            $_SESSION["receivecalls"] = $receivecalls;

            $_SESSION["totalcost"] = $totalcost;
            $_SESSION["uploadedfiles"] = $uploadedfiles;
            $success = 0;
        } catch (Exception $e) {
            $success = $e;
            $success .= 1;
        }

        return $success;
    }

    function OrderNow($iduser, $orderno, $topic, $typeofdocument, $SubujectArea, $numberofpages, $spacing, $urgency, $writing_style, $academic_level, $language, $instruction, $totalcost, $receivecalls) {
        $success = 1;
        try {
            $orderdate = date('m-d-Y');

            if (mysql_query("INSERT INTO `myorder`(`idorder`, `orderno`, `topic`, `subject`, `doctype`, `numpages`, `spacing`, 
			`orderdate`, `urgency`, `style`, `aclevel`, `language`, `instructions`, `totalcost`, `statusid`, `receivecalls`,`iduser`) 
                VALUES (NULL,'$orderno','$topic','$SubujectArea','$typeofdocument','$numberofpages','$spacing',
				'$orderdate','$urgency','$writing_style','$academic_level','$language','$instruction','$totalcost',1,'$receivecalls',$iduser)")) {
                $success = 0;
            } else {
                $success .= mysql_error();
            }
        } catch (Exception $e) {
            $success = $e;
        }


        return $success;
    }

    function sendMail($emailaddress, $userpassword) {

        $success = 1;

        $emailaddress = @trim(stripslashes($_POST['emailaddress']));
        $userpassword = @trim(stripslashes($_POST['userpassword']));

        $email_from = '';
        $email_to = $emailaddress;

        $subject = "Congratulations!";
        $message = 'Thank you for Registering with us.Please use the following details as your login: "\n\n"  Email Address: '
                . $email_to . '"\n\n" Password:' . $userpassword . '"\n\n"Please remember to change it the first time you login to secure your account."\n\n" Regards,"\n\n\n"Home Worker Jobs';

        $body = 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;



        if (@mail($email_to, $subject, $body, 'From: <' . $email_from . '>')) {
            $success = 0;
        } else {
            $success = 1;
        }
    }

    function updateStatus($statusid, $orderno, $iduser) {
        $success = 1;
        try {

            if (mysql_query("UPDATE `myorder` SET `statusid`=$statusid  WHERE `orderno`='$orderno' AND `iduser`=$iduser;")) {
                echo " <p>Thank you for placing an order with us</p>";
            } else {
                $success .= mysql_error();
            }
        } catch (Exception $e) {
            $success = $e;
        }
        return $success;
    }

    function getOrdersfromDB($userid) {
        $success = 1;
        try {
            $execute = mysql_query("SELECT `orderno`, `topic`, `subject`, `doctype`,  `orderdate`, `totalcost`,`status`.`statusid`,  status.`statusname` FROM `myorder`  LEFT JOIN `status`ON (`status`.`statusid`=`myorder`.`statusid`) WHERE `iduser`=" . $userid) or die(mysql_error());

            $rows = mysql_num_rows($execute);
            $_SESSION["orders"] = $rows;

            if ($rows > 0) {
                $success = "
	<table class='table'>
	 <thead><tr> <th>Index.</th> <th>Order No.</th>	<th>Topic</th> <th>Subject Area</th><th>Type of Document</th><th>Order Date</th> <th>Total Cost</th> <th>Payment Status</th>
	 <th>Action</th> </tr>	 </thead>	 <tbody>";
                $index = 1;
                while ($row = mysql_fetch_assoc($execute)) {

                    if ($row["statusid"] == 1) {
                        $success.="<tr class='active'>
					 <td>" . $index . "</td>
					 <td>" . $row["orderno"] . "</td>
					 <td>" . $row["topic"] . "</td> 
					 <td>" . $row["subject"] . "</td>
					 <td>". $row["doctype"] . "</td>
					 <td>" . $row["orderdate"] . "</td> 
					 <td>USD $" . $row["totalcost"] . "</td>
					 <td>" . $row["statusname"] ."</td>
					 <td><button type='submit' class='btn btn-primary btn-default btn-flat btn-lg' id='btnpaywith_".$index."' 
                                             onclick=gotoPayment('".$row["orderno"]."');>Complete Payment</button> </td>
					 </tr>";

                        $index++;
                    } else {
                        $success.='<tr class="success">
				 <td>' . $index . '</td>
				 <td>' . $row["orderno"] . '</td>
				 <td>' . $row["topic"] . '</td> 
				 <td>' . $row["subject"] . '</td>
				 <td>' . $row["doctype"] . '</td>
				 <td>' . $row["orderdate"] . '</td> 
				 <td>' . $row["totalcost"] . '</td>
				 <td>' . $row["statusname"] . '</td>
				 <td>Settled </td>
				 </tr>';

                        $index++;
                    }
                }
                $success.='</tbody></table>';
            } else {
                 $_SESSION["orders"] = 0;
                $success = "Sorry, you have no Orders yet";
            }
        } catch (Exception $e) {
            $success = $e;
        }

        return $success;
    }
    
    
 function getOrdersDetailsfromDB($orderno) {
        $success = 1;
        try {
            $execute = mysql_query("SELECT `topic`, `subject`, `doctype`, `numpages`, `spacing`, `orderdate`,
                `urgency`, `style`, `aclevel`, `language`, `instructions`,  `totalcost`,`status`.`statusid`,  status.`statusname` FROM `myorder`  LEFT JOIN `status`ON (`status`.`statusid`=`myorder`.`statusid`) WHERE `orderno`='" . $orderno."'") or die(mysql_error());

            $rows = mysql_num_rows($execute);

            if ($rows > 0) {
                
                $row = mysql_fetch_assoc($execute);
                $success ='<div class="row">           
                        <div class="form-group col-md-6 "> <div class="control-label">Order Number: 
                            <label>'. $orderno.'</label></div></div>
                                
                         <div class="form-group col-md-6 "> <div class="control-label">Tottal Cost: 
                            <label>USD$ '. $row["totalcost"].'</label></div></div>
                        
                        </div> 
                    <div class="row">           
                        <div class="form-group col-md-6 "> <div class="control-label">Topic: 
                            <label>'. $row["topic"].'</label></div></div>
                          
                      
                        <div class="form-group col-md-6 "> <div class="control-label">Subject Area : 
                            <label>'. $row["subject"].'</label></div></div>
                        
                        </div>                   
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="control-label">Document Type : 
                            <label>'. $row["doctype"].'</label></div></div>
                           
                       
                        <div class="form-group col-md-6 ">
                            <div class="control-label">Number of Pages : 
                            <label>'. $row["numpages"].'</label></div></div>
                          
                        </div>
                   
                    <div class="row">           
                        <div class="form-group col-md-6"> <div class="control-label">Spacing :
                            <label>'. $row["spacing"].'</label></div></div>
                  
                        <div class="form-group col-md-6 "> <div class="control-label">Order Date : 
                            <label>'. $row["orderdate"].'</label></div></div>

                    </div> 
                    <div class="row">           
                        <div class="form-group col-md-6 "> <div class="control-label">Urgency : 
                            <label>'. $row["urgency"].'</label></div></div>
                            

                        <div class="form-group col-md-6 "> <div class="control-label">Style : 
                            <label>'. $row["style"].'</label></div></div>

                    </div>
                    <div class="row">                          
                        <div class="form-group col-md-6 "> <div class="control-label">Academic Level:
                            <label>'. $row["aclevel"].'</label></div></div>
                      
                       
                        <div class="form-group col-md-6 "> <div class="control-label">Language: 
                            <label>'. $row["language"].'</label></div></div>
                    </div>
                     <div class="row">                          
                        <div class="form-group col-md-6 "> <div class="control-label">Status:
                            <label>'. $row["statusname"].'</label></div></div>
                      
                    </div>
               <div class="row">
                        <div class="form-group col-md-6 ">
                            <div class="control-label">Order Instructions </div>
                            <textarea name="instruction" id="instruction" cols="60" rows="7" disabled="disabled">
                           '. $row["instructions"].'
                            </textarea>
                        </div>
                    </div>';
              
              
            }
        } catch (Exception $e) {
            $success = $e;
        }

        return $success;
    }
    
   function viewAllOrders() {
        $success = 1;
        try {
            $execute = mysql_query("SELECT `orderno`, `topic`, `subject`, `doctype`,  `orderdate`, `totalcost`,`status`.`statusid`,  status.`statusname` FROM `myorder`  LEFT JOIN `status`ON (`status`.`statusid`=`myorder`.`statusid`) WHERE 1") or die(mysql_error());

            $rows = mysql_num_rows($execute);
            $_SESSION["orders"] = $rows;

            if ($rows > 0) {
                $success = "
	<table class='table'>
	 <thead><tr> <th>Index.</th> <th>Order No.</th>	<th>Topic</th> <th>Subject Area</th><th>Type of Document</th><th>Order Date</th> <th>Total Cost</th> <th>Payment Status</th>
	 <th>Action</th> </tr>	 </thead>	 <tbody>";
                $index = 1;
                while ($row = mysql_fetch_assoc($execute)) {
                    if($row["statusid"]==1)
                    {
                        $success.="<tr class='active'>
					 <td>" . $index . "</td>
					 <td>" . $row["orderno"] . "</td>
					 <td>" . $row["topic"] . "</td> 
					 <td>" . $row["subject"] . "</td>
					 <td>". $row["doctype"] . "</td>
					 <td>" . $row["orderdate"] . "</td> 
					 <td>USD $" . $row["totalcost"] . "</td>
					 <td>" . $row["statusname"] ."</td>
					 <td><button type='submit' class='btn btn-primary btn-default btn-flat btn-lg' id='btnpaywith_".$index."' 
                                             onclick=window.location.href='orders.php?orderno=".$row["orderno"]."';>View Details</button> </td>
					 </tr>";

                        $index++;
                    }
                    else
                    {
                        $success.="<tr class='success'>
                                    <td>" . $index . "</td>
                                    <td>" . $row["orderno"] . "</td>
                                    <td>" . $row["topic"] . "</td> 
                                    <td>" . $row["subject"] . "</td>
                                    <td>". $row["doctype"] . "</td>
                                    <td>" . $row["orderdate"] . "</td> 
                                    <td>USD $" . $row["totalcost"] . "</td>
                                    <td>" . $row["statusname"] ."</td>
                                    <td><button type='submit' class='btn btn-primary btn-default btn-flat btn-lg' id='btnpaywith_".$index."' 
                                        onclick=window.location.href='orders.php?orderno=".$row["orderno"]."';>View Details</button> </td>
                                    </tr>";

                $index++;
                    }
                }
                $success.='</tbody></table>';
            } else {
                 $_SESSION["orders"] = 0;
                $success = "Sorry, you have no Orders yet";
            }
        } catch (Exception $e) {
            $success = $e;
        }

        return $success;
    }
  
   function showUploadedFiles($orderno){      
        $success = 1;
        try {
            $execute = mysql_query("SELECT `atachid`, `filepath`,`uploadatetime` FROM `attachments` WHERE `orderno`='" . $orderno."';") or die(mysql_error());

            $rows = mysql_num_rows($execute);
            $_SESSION["files"] = $rows;

            if ($rows > 0) {
                $success = "
	<table class='table'>
	 <thead><tr> <th>Index.</th> <th>File Name</th><th>Datetime Uploaded</th><th>Action</th> </tr>	 </thead>	 <tbody>";
                $index = 1;
                while ($row = mysql_fetch_assoc($execute)) {

                   //$filename= $row["filepath"];
                        $success.="<tr class='active'>
					 <td>" . $index . "</td>
					 <td>" . $row["filepath"] . "</td> 
					 <td>" . $row["uploadatetime"] . "</td>
					 <td><a type='button' class='btn btn-primary btn-default btn-flat btn-lg' id='btnDownload".$index."' 
                                                href='dbcom/". $row["filepath"] ."'>Download</a> </td>
					 </tr>";

                        $index++;
                   
                }
                $success.='</tbody></table>';
            } else {
                 $_SESSION["orders"] = 0;
                $success = "Sorry, you have no attachments";
            }
        } catch (Exception $e) {
            $success = $e;
        }

        return $success;
  }  
  
  function uploadAttachments($file) {

        $success = 1;

        if (isset($file["tmp_name"])) {
            session_start();
            $orderno = $_SESSION["orderno"];
            //Uploading Image
            $target_dir = "attachments/";
            // Check file size
            if ($file["size"] > 1000000) {
                $success .= "<div class='alert alert-danger'>Sorry, image should not exceed 10MB.</div>";
            } else {
                $newfilename = date("YmdHis") . $file['name'];

                if (move_uploaded_file($file["tmp_name"], $target_dir . "I" . $newfilename)) {
                    try {
                        $fileUpload = $target_dir . "I" . $newfilename;
                        if (mysql_query("INSERT INTO `attachments`(`atachid`, `filepath`, `orderno`) 
                            VALUES (NULL,'$fileUpload','$orderno')")) {
                            $success = 0;
                        } else {
                            $success .= mysql_error();
                        }
                    } catch (Exception $e) {
                        $success = $e;
                    }
                } else {
                    $success.= "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $success .= "<div class='alert alert-danger'>grrrrrrrr!</div>";
        }

        return $success;
    }

   function sessionOrderDetails($orderno) {
        $success = 1;
        try {
             $execute = mysql_query("SELECT `topic`, `orderdate`,`totalcost` FROM `myorder`  WHERE `orderno`='" . $orderno."'") or die(mysql_error());

            $rows = mysql_num_rows($execute);

            if ($rows > 0) {
                
                $row = mysql_fetch_assoc($execute);
            session_start();
            #----Order details-----#
            $_SESSION["orderno"] = $orderno;
            $_SESSION["topic"] = $row['topic'];
             $_SESSION["orderdate"] = $row['orderdate'];
            $_SESSION["totalcost"] = $row['totalcost'];
           
            $success = 0;
            }
        } catch (Exception $e) {
            $success = $e;
            $success .= 1;
        }

        return $success;
    }
    
    
    
}

?>
