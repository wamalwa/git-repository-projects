<?php
$page_title="Bulk SMS  | Contact Groups";
$head="Contact Groups";
$currectPage='contactgroups.php';
 include_once 'serverside/config.php';  
 include_once 'header.php';
 include_once('serverside/functions.php');
 $fn = new Functions();
 $allposts = $fn->GetAllPostsFormated();
 $allWards=$fn->GetAllWards();
 $allcontactgroups=$fn->GetAllmyConatctsGroup();
 $contactgroups=$fn->GetAllmyConatctsGroup2();
?>

<div id="page" class="container">
<div class="row">
<div id="sidebar" class="3u">
    <section>
        <header class="major">
            <h2>Available Contact Groups</h2>
        </header>
        <ul class="default">
        <li><a href="#"> <h3><?php echo $fn->toCurrency(count($contactgroups));?> Contact Group(s) </h3></a></li> 
        <?php  
        for ($i = 0; $i < count($contactgroups); $i++) { //break the string in the array
              $fields = explode(":", $contactgroups[$i]);
        ?>
   <li><a href="#"><?php echo $i+1 ?>. <?php echo $fields[1]; ?></a></li>
        <?php }?> 
        </ul>
    </section>
     <section>
        <header class="major">
            <h2>Sub Menu</h2>
        </header>
        <ul class="default">
            <li><button class="btn-block btn" id="btnContactUploadView">Upload CSV/Excel Sheet</button></li> 
             <li><button class="btn-block btn" id="btnAddContactGroupView">Add Contact Group</button></li> 
            
        </ul>
    </section>    
</div>
<div id="sidebar" class="8u">
             <section id="sectionAddcontanct">
                    <header class="major">
                        <h2>Create Account</h2>
                        <span class="byline">Create New Contact here</span>
                    </header>
                    <form method="post" action="#" name="frmaddgroupcontact" id="frmaddgroupcontact">   
                     <input type="hidden" name='actiontype' id="actiontypegroupcontact" value="addgroupcontact">
                    <div id="not">
                 
                    </div>
                     <div class="row half">
                      	<div class="4u">Contact Group:</div>
                          <div class="8u"> <select class="form-control" name="selectgroupContact" id="selectgroupContact">
				<?php  echo $allcontactgroups; ?>           
                              </select>
                          </div>
			</div>
                      <div class="row half">
                            <div class="12u">
                                <input class="text" type="text" name="firstName" id="firstName" placeholder="First Name" />
                            </div>
                        </div>                       
                        <div class="row half">
                            <div class="12u">
                                 <input class="text" type="text" name="otherNames" id="otherNames" placeholder="Other Names" />
                            </div>
                        </div>
                      <div class="row half">
                            <div class="12u">
                                 <input class="text" type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" />
                            </div>
                        </div>
 			<div class="row half">
                            <div class="12u">
                                <input class="text" type="text" name="yob" id="yob" placeholder="Year Of Birth" />
                            </div>
                        </div>

                   <div class="row half">
                            <div class="4u">
                               <label> <input class="text" type="radio" name="radiogender" id="male" value="Male" checked="true"/>Male   </label>                                
                            </div>
                             <div class="4u">
                                 <label> <input class="text" type="radio" name="radiogender" id="female" value="Female" /> Female     </label>                            
                            </div>
                        </div>
                        <br>
			<div class="row half">
                      	<div class="4u">Region Located:</div>
                          <div class="8u"> <select class="form-control" name="addaccountselectRegion" id="addaccountselectRegion">
				<?php  echo $allWards; ?>           
                              </select>
                          </div>
			</div>

                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Add Contact" class="button alt" id="btnsavegroupcontacts" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
      <!--upload excel sheet-->
      <section id="sectionUploadExcelSheet" style="display:none">
                    <header class="major">
                        <h2>Create Account</h2>
                        <span class="byline">Upload Excel Sheet here</span>
                    </header>
                    <form method="POST" action="serverside/action.php" name="frmuploadexcelsheetgroupcontacts" id="frmuploadexcelsheetgroupcontacts" enctype="multipart/form-data">   
                     <input type="hidden" name='actiontype' id="actiontype" value="uploadexcelsheetgroupcontacts">
                    <div id="notUploadexcelsheet">
                 
                    </div>
                       <div class="row half">
                      	<div class="4u">Contact Group:</div>
                          <div class="8u"> <select class="form-control" name="uploadfileSelectgroupContact" id="uploadfileSelectContactgroup">
				<?php  echo $allcontactgroups; ?>           
                              </select>
                          </div>
			</div>
                      <div class="row half">
                            <div class="12u">
                                <input class="file" type="file" name="fileUpload" id="fileUpload"  />
                            </div>
                        </div> 
                       <div class="row half">
                            <div class="12u">
                                <a class="link" href="serverside/fileUplaods/contacts.xls">Download Sample here</a>
                            </div>
                        </div>
                     <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Save Contacts" class="button alt" id="btnsavegroupContactsfile" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
  <!--ADD new CONTACT GROUP-->
    <section id="sectionAddContactGroup" style="display:none">
                    <header class="major">
                        <h2>Create Contact Group</h2>
                        <span class="byline">Create Contact Group here</span>
                    </header>
                    <form method="POST" action="#" name="frmaddcontactgroup" id="frmaddcontactgroup" >   
                     <input type="hidden" name='actiontype' id="actiontypecontactgroup" value="addcontactgroup">
                    <div id="notContactGroup">
                 
                    </div>
                        <div class="row half">
                            <div class="12u">
                                <input class="text" type="text" name="groupName" id="groupName" placeholder="Group Name" />
                            </div>
                        </div>                       
                    <div class="row half">
                    <div class="12u">
                            <textarea name="GroupDescription" id="GroupDescription" placeholder="Description"></textarea>
                            </div>
                  </div>
                     <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Save Contact Group" class="button alt" id="btnSaveContactGroup" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>


<?php  include_once 'footer.php'; 