<?php
$page_title="Bulk SMS  | Send SMS";
$head="Send SMS";
$currectPage='sendsms.php';
 include_once 'serverside/config.php';  
 include_once 'header.php';
 include_once('serverside/functions.php');
 $fn = new Functions();
 $allcontacts=$fn->GetAllmyConatcts();
 $myregioncontacts=$fn->GetMyRegionContacts();
 $accountbalance=$fn->GetMyAccountBalance();
 $allcontactgroups=$fn->GetAllmyConatctsGroup();
 
?>
    <!-- Page -->
<div id="page" class="container">
<div class="row">
<div id="sidebar" class="2u">
    <section>
        <header class="major">
            <h2>Available Messages</h2>
        </header>
        <ul class="default">
            <li><a href="#">1. Compagn</a></li>
            <li><a href="#">2. Support</a></li>
            <li><a href="#">3. Holyday Wishes</a></li>
        </ul>
    </section>
     <section>
        <header class="major">
            <h2>Account Summary</h2>
        </header>
        <ul class="default">
            <li><h3>Account Balance Ksh.</h3><a href="#"> <h4> <?php 
            
            $fields = explode(":", $accountbalance[0]);
            $availablebalance=trim($fields[0]);//available Balance
            echo  $fn->toCurrency($availablebalance); ?></h4></a></li>
        </ul>
    </section>
     <section>   <header class="major">
            <h2>Contacts Summary</h2>
        </header>
        <ul class="default">
        <li><a href="#"> <h4> My Added Contacts</h4></a>
            <ul ><li><?php echo $fn->toCurrency(count($allcontacts));?> Contacts(s)</li></ul>
        </li> 
       <li><a href="#">   <h4> My Region Contacts</h4></a>
            <ul><li><?php echo $fn->toCurrency(count($myregioncontacts));?> Contacts(s)</li></ul>
        </li> 
        </ul>
    </section>
   
     
</div>
<div id="main" class="8u">
                <section>
                    <header class="major">
                        <h3>Create Message</h3>                      
                    </header>
                    <form method="post" action="#" name="frmcreatesms" id="frmcreatesms">   
                     <input type="hidden" name='actiotype' id="actiontype" value="createmessage">
                    <div id="not">
                 
                    </div>
                      <div class="row half">
                            <div class="12u">
                                <input class="text" type="text" name="messagetitle" id="messagetitle" value="Message Title" />
                            </div>
                        </div>                       
                        <div class="row half">
                            <div class="12u">
                                <textarea name="message" id="message" placeholder="Message Content"></textarea>
                            </div>
                        </div>
                      <div class="row half">
                            <div class="4u">
                                 <label> <input class="text" type="checkbox" name="checkboxcontacts" id="myregioncontacts" value="MyregionContacts" checked="true" /> My Region Contacts     </label>                            
                            </div>
                            <div class="8u">
                            <label> <input class="text" type="checkbox" name="checkboxcontacts" id="mycontacts" value="MyAddedContacts" />My Added Contacts   </label> 
                        
                            <div id="contactGroupView" style="display:none"> <select class="form-control" name="selectgroupContact" id="selectgroupContact">
                                  <option value="0">---Select Contact Group--</option>
				<?php  echo $allcontactgroups; ?>           
                              </select>
                          </div>
                            </div>
                           
                        </div>
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Create Message" class="button alt" id="btncreatesms" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
    <div id="sidebar"  class="2u">
          <header class="major">
                        <h3>Message Parameters</h3>                      
                    </header>
         <ul class="">
            <li><button class="btn-block btn" id="btnAddFirstNameparam">{firstName}</button></li> 
            <li><button class="btn-block btn" id="btnAddAvailableBalanceparam">{AvailableBalance}</button></li> 
            <li><button class="btn-block btn" id="btnAddPostparam">{Post}</button></li>
            <li><button class="btn-block btn" id="btnAddclientNameparam">{clientName}</button></li> 
        </ul>
    </div>    
        </div>
    </div>
<!-- /Page -->  
    <?php  include_once 'footer.php'; ?>