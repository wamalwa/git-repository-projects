<?php
$page_title="Bulk SMS  | Account";
$head="Account";
$currectPage='account.php';
  include_once 'serverside/config.php';   
 include_once 'header.php';
 include_once('serverside/functions.php');
 $fn = new Functions();
 $allposts = $fn->GetAllPostsFormated();
 $regionstoVie=$fn->GetRegiontoViewForPost(1);//default post
 $allacounts=$fn->GetAllActiveAccounts();
?>

<!-- Page -->
<div id="page" class="container">
<div class="row">
<div id="sidebar" class="3u">
    <section>
        <header class="major">
            <h2>Existing Accounts</h2>
        </header>
        <ul class="default">
        <li><a href="#">   <h3><?php echo $fn->toCurrency(count($allacounts));?> Active Account(s) </h3></a></li> 
        <?php  
        for ($i = 0; $i < count($allacounts); $i++) { //break the string in the array
              $fields = explode(":", $allacounts[$i]);
    ?>
   <li><a href="#"><?php echo $i+1 ?>. <?php echo $fields[1]." ".$fields[2]; ?></a></li>
        <?php }?>
        </ul>
    </section>
     
</div>
<div id="sidebar" class="8u">
                <section>
                    <header class="major">
                        <h2>Create Account</h2>
                        <span class="byline">Create New Client Account here</span>
                    </header>
                    <form method="post" action="#" name="frmcreateaccount" id="frmcreateaccount">   
                     <input type="hidden" name='actiotype' id="actiontype" value="createaccount">
                    <div id="not">
                 
                    </div>
                      <div class="row half">
                            <div class="12u">
                                <input class="text" type="text" name="surName" id="surName" placeholder="Sur Name" />
                            </div>
                        </div>                       
                        <div class="row half">
                            <div class="12u">
                                 <input class="text" type="text" name="firstName" id="firstName" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="row half">
                            <div class="12u">
                                 <input class="text" type="text" name="nationalID" id="nationalID" placeholder="National ID/ Passport /Alien ID" />
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
 			<div class="row half">
                            <div class="12u">
                                 <input class="text" type="email" name="emailAddress" id="emailAddress" placeholder="Email Address" />
                            </div>
                        </div>
                        <div class="row half">
                            <div class="12u">
                                 <input class="text" type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" />
                            </div>
                        </div>
                        <div class="row half">
                            <div class="12u">
                                 <input class="text" type="text" name="physicalAddress" id="physicalAddress" placeholder="Physical Address" />
                            </div>
                        </div>
                        <br>
                      	<div class="row half">
                      	<div class="4u">Post to Vie:</div>
                        <div class="8u"> <select class="form-control" name="addaccountselectPost" id="addaccountselectPost">
                       <?php    echo $allposts;    ?>     
                     </select></div>
                        </div>
                        <br>
			<div class="row half">
                      	<div class="4u">Region to Vie:</div>
                          <div class="8u"> <select class="form-control" name="addaccountselectRegion" id="addaccountselectRegion">
				<?php  echo $regionstoVie; ?>           
                              </select>
                          </div>
				    	</div>

                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Create Account" class="button alt" id="btncreateaccount" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
<!-- End Page -->
<?php  include_once 'footer.php'; ?>
	