<?php
$page_title="Bulk SMS  | Contacts";
$head="Contacts";
$currectPage='contacts.php';
 include_once 'serverside/config.php';  
 include_once 'header.php';
 include_once('serverside/functions.php');
 $fn = new Functions();
 $allposts = $fn->GetAllPostsFormated();
 $allWards=$fn->GetAllWards();//default post
 $allcontacts=$fn->GetAllmyConatcts();
 $myregioncontacts=$fn->GetMyRegionContacts();
 
?>

<div id="page" class="container">
<div class="row">
<div id="sidebar" class="3u">
    <section>
            <h3>Available Contacts</h3>
        <ul class="default">
        <li><a href="#"> <h4> My Added Contacts</h4></a>
            <ul ><li><?php echo $fn->toCurrency(count($allcontacts));?> Contacts(s)</li></ul>
        </li> 
       <li><a href="#">   <h4> My Region Contacts</h4></a>
            <ul><li><?php echo $fn->toCurrency(count($myregioncontacts));?> Contacts(s)</li></ul>
        </li> 
        </ul>
    </section>
     <section>
        <header class="major">
            <h2>Sub Menu</h2>
        </header>
        <ul class="default">
            <li><button class="btn-block btn" id="btnContactUploadView">Upload CSV/Excel Sheet</button></li> 
            
        </ul>
    </section>    
</div>
<div id="sidebar" class="8u">
             <section id="sectionAddcontanct">
                    <header class="major">
                        <h2>Create Account</h2>
                        <span class="byline">Create New Contact here</span>
                    </header>
                    <form method="post" action="#" name="frmaddcontact" id="frmaddcontact">   
                     <input type="hidden" name='actiontype' id="actiontypeaddcontact" value="addContact">
                    <div id="not">
                 
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
                                 <input class="text" type="email" name="yob" id="yob" placeholder="Year Of Birth" />
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
                                        <input type="submit" value="Add Contact" class="button alt" id="btnaddcontact" />
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
                    <form method="POST" action="serverside/action.php" name="frmuploadexcelsheet" id="frmuploadexcelsheet" enctype="multipart/form-data">   
                     <input type="hidden" name='actiontype' id="actiontype" value="uploadexcelsheet">
                    <div id="notUploadexcelsheet">
                 
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
                                        <input type="submit" value="Save Contacts" class="button alt" id="btnuploadexcelsheet" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
  
            </div>
        </div>
    </div>


<?php  include_once 'footer.php'; ?>