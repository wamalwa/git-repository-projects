<?php
 $usergroups  = $fn->GetUsergroups();
 $users       = $fn->GetAllUsers();
 $user_count  = count($users);
?>

<!-- Page -->
<div id="page" class="container">
<div class="row">
<div id="sidebar" class="3u">
    <section>
        <header class="major">
            <h2>Existing Users</h2>
        </header>
        <ul class="default">
        <li><a href="#">   <h3><?php echo $fn->toCurrency($user_count);?> Active Users(s) </h3></a></li> 
        <?php  
        for ($i = 0; $i < $user_count; $i++) { //break the string in the array
              $fields = explode("|", $users[$i]);
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
                    <form method="post" action="#" name="frmadduser" id="frmadduser">   
                    <div id="not">
                 
                    </div>
                      <div class="row half">
                            <div class="12u">
                                <input class="text" type="text" name="lastname" id="lastname" placeholder="Sur Name" />
                            </div>
                        </div>                       
                        <div class="row half">
                            <div class="12u">
                                 <input class="text" type="text" name="firstname" id="firstname" placeholder="First Name" />
                            </div>
                        </div>
                     <div class="row half">
                            <div class="12u">
                                 <input class="text" type="email" name="emailaddress" id="emailaddress" placeholder="Email Address" />
                            </div>
                        </div>                        
                       <div class="row half">
                            <div class="12u">
                                 <input class="text" type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number" />
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
                      	<div class="4u">User Group:</div>
                          <div class="8u"> <select class="form-control" name="selectUsergroup" id="selectUsergroup">
				<?php  echo $usergroups; ?>           
                              </select>
                          </div>
		</div>
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Add User" class="button alt" id="btnAddUser" />
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
	