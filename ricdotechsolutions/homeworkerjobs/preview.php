<!--Master Page display-->
<?php
$ordernow="class='active'";
$title="Preview your Order";
include_once ('ui/myheader.php');
include_once ("dbcom/config.php");
include_once ("dbcom/homeworkerjob_com.php");
$obj = new HomeWorkerJobsDAO();
session_start();
             
?>

<div class="container">

    <form method="post" id="register_form" >
        <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">My Personal Details</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
                    <div id="not"></div>
                    <div class="row">
					 <input type="hidden" name="iduser" id="iduser"  value="<?php if (!empty($_SESSION["UserID"])) {  echo $_SESSION["UserID"];}?>" >
                        <div class="form-group col-md-6">
                            <div class="control-label">Surname :
                                <label><?php if(!empty($_SESSION["surname"])){echo $_SESSION["surname"];} ?></label></div>
                          
                        </div>
                        <div class="form-group col-md-6 ">
                            <div class="control-label">First Name: 
                                <label> <?php if(!empty($_SESSION["firstName"])){ echo $_SESSION["firstName"];} ?></label></div>
                        </div>
                    </div>  
                    <div class="row">           
                        <div class="form-group col-md-6 "> <div class="control-label">Last Name : 
                                <label><?php if(!empty($_SESSION["lastname"])){ echo $_SESSION["lastname"];} ?></label></div>
                           

                        </div>
                        <div class="form-group col-md-6 "> <div class="control-label">Email Address : 
                      <label> <?php if(!empty($_SESSION["emailaddress"])){ echo $_SESSION["emailaddress"];} ?> </label> </div> 
                        </div> 
                    </div> 
                    <div class="row">                          
                        <div class="form-group col-md-6 "> <div class="control-label">Phone Number: 
                            <label><?php if(!empty($_SESSION["phonenumber"])){echo $_SESSION["phonenumber"];} ?></label></div>
                        </div>            

                        <div class="form-group col-md-6 "> <div class="control-label">Country of Origin: 
                            <label><?php if(!empty($_SESSION["country"])){echo $_SESSION["country"];} ?></label></div>
                          
                        </div>          
                    </div> 

                </div>

            </div>
        </div> 
        <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">My Order Details!</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
                    <div id="not"></div>
					<!-- Defining all the data that are needed-->
					 <input type="hidden" name="orderno" id="orderno"  value="<?php if (!empty($_SESSION["orderno"])) {  echo $_SESSION["orderno"];}?>" />
					 <input type="hidden" name="topic" id="topic"  value="<?php if (!empty($_SESSION["topic"])) {  echo $_SESSION["topic"];}?>" >
					 <input type="hidden" name="SubujectArea" id="SubujectArea"  value="<?php if (!empty($_SESSION["SubujectArea"])) {  echo $_SESSION["SubujectArea"];}?>" />
					 <input type="hidden" name="typeofdocument" id="typeofdocument"  value="<?php if (!empty($_SESSION["typeofdocument"])) {  echo $_SESSION["typeofdocument"];}?>" />
					 <input type="hidden" name="numberofpages" id="numberofpages"  value="<?php if (!empty($_SESSION["numberofpages"])) {  echo $_SESSION["numberofpages"];}?>" />
					 <input type="hidden" name="spacing" id="spacing"  value="<?php if (!empty($_SESSION["spacing"])) {  echo $_SESSION["spacing"];}?>" />
					 <input type="hidden" name="orderdate" id="orderdate"  value="<?php if (!empty($_SESSION["orderdate"])) {  echo $_SESSION["orderdate"];}?>" />
					 <input type="hidden" name="urgency" id="urgency"  value="<?php if (!empty($_SESSION["urgency"])) {  echo $_SESSION["urgency"];}?>" />
					 <input type="hidden" name="writing_style" id="writing_style"  value="<?php if (!empty($_SESSION["writing_style"])) {  echo $_SESSION["writing_style"];}?>" />
					 <input type="hidden" name="academic_level" id="academic_level"  value="<?php if (!empty($_SESSION["academic_level"])) {  echo $_SESSION["academic_level"];} ?>" />
					 <input type="hidden" name="language" id="language"  value="<?php if (!empty($_SESSION["language"])) {  echo $_SESSION["language"];} ?>" />
					 <input type="hidden" name="instruction" id="instruction"  value="<?php if (!empty($_SESSION["instruction"])) {  echo $_SESSION["instruction"];}?>" />
					 <input type="hidden" name="receivecalls" id="receivecalls"  value="<?php if (!empty($_SESSION["receivecalls"])) {  echo $_SESSION["receivecalls"];}?>" />
					 <input type="hidden" name="totalcost" id="totalcost"  value="<?php if (!empty($_SESSION["totalcost"])) {  echo $_SESSION["totalcost"];} ?>" />
					
					 <!-- END-->
                    <div class="row">           
                        <div class="form-group col-md-6 "> <div class="control-label">Order Number: 
                            <label><?php if(!empty($_SESSION["orderno"])){echo $_SESSION["orderno"];} ?></label></div></div>
                        
                        </div> 
                    <div class="row">           
                        <div class="form-group col-md-6 "> <div class="control-label">Topic: 
                            <label><?php if(!empty($_SESSION["topic"])){echo $_SESSION["topic"];} ?></label></div></div>
                          
                      
                        <div class="form-group col-md-6 "> <div class="control-label">Subject Area : 
                            <label><?php if(!empty($_SESSION["SubujectArea"])){echo $_SESSION["SubujectArea"];} ?></label></div></div>
                        
                        </div> 
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="control-label">Document Type : 
                            <label><?php if(!empty($_SESSION["typeofdocument"])){echo $_SESSION["typeofdocument"];} ?></label></div></div>
                           
                       
                        <div class="form-group col-md-6 ">
                            <div class="control-label">Number of Pages : 
                            <label><?php if(!empty($_SESSION["numberofpages"])){echo $_SESSION["numberofpages"];} ?></label></div></div>
                          
                        </div>
                   
                    <div class="row">           
                        <div class="form-group col-md-6"> <div class="control-label">Spacing :
                            <label><?php if(!empty($_SESSION["spacing"])){echo $_SESSION["spacing"];} ?></label></div></div>
                  
                        <div class="form-group col-md-6 "> <div class="control-label">Order Date : 
                            <label><?php if(!empty($_SESSION["orderdate"])){echo $_SESSION["orderdate"];} ?></label></div></div>

                    </div> 
                    <div class="row">           
                        <div class="form-group col-md-6 "> <div class="control-label">Urgency : 
                            <label><?php if(!empty($_SESSION["urgency"])){echo $_SESSION["urgency"];} ?></label></div></div>
                            

                        <div class="form-group col-md-6 "> <div class="control-label">Style : 
                            <label><?php if(!empty($_SESSION["writing_style"])){echo $_SESSION["writing_style"];} ?></label></div></div>

                    </div>
                    <div class="row">                          
                        <div class="form-group col-md-6 "> <div class="control-label">Academic Level:
                            <label><?php if(!empty($_SESSION["academic_level"])){echo $_SESSION["academic_level"];} ?></label></div></div>
                      
                       
                        <div class="form-group col-md-6 "> <div class="control-label">Language: 
                            <label><?php if(!empty($_SESSION["language"])){echo $_SESSION["language"];} ?></label></div></div>
                    </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="panel panel-primary col-md-5 col-sm-12" style="margin-top:0px; padding:0px">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 1.5em">Total Cost</h3>
                        </div>
                        <div class="panel-body">
                            <div class="body bg-gray">
                               
                     <div style="text-align: center" id="totalcost">
                      <font style="font-size: 2em;color: green">Total Cost:<b>USD$ <?php if(!empty($_SESSION["totalcost"])){echo $_SESSION["totalcost"];}  else { echo '0';} ?></b></font>
                         </div>
                            </div>


                        </div>
                    </div>

                </div>
                    </div>
        </div>
        <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">Instructions and Attachments</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
                    <div id="not"></div>
                    <div class="row">
                        <div class="form-group col-md-6 ">
                            <div class="control-label">Attachments</div>
                            <?php if(!empty($_SESSION["uploadedfiles"])){echo $_SESSION["uploadedfiles"];} ?>
                        </div>
                        <div class="form-group col-md-6 ">
                            <div class="control-label">Order Instructions </div>
                            <textarea name="instruction" id="instruction" cols="60" rows="7" disabled="disabled">
                            <?php if(!empty($_SESSION["instruction"])){echo $_SESSION["instruction"];} ?>
                            </textarea>
                        </div>
                    </div>                     

                </div>
                <div class="row">  <div class="col-md-7"></div>
                    <div class="form-group col-md-5">                                                               
                        <button type="submit" class="btn btn-primary btn-default btn-flat btn-lg" id="btnpayment">Proceed to Payment</button> 
                    </div>
                </div>

            </div>
        </div>  
    </form> 
</div>


<!--Footer-->
<?php include_once ('ui/footer.php'); ?>