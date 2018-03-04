<?php
$page_title="Bulk SMS  | Users";
$head="Users";
$currectPage='users.php';
 include_once 'serverside/config.php';  
 include_once 'header.php';
 include_once('serverside/functions.php');
 $fn = new Functions();
  $allacounts=$fn->GetAllActiveAccounts();  
 $allroles=$fn->GetAllRoles();
 
?>

<!-- Page -->
<div id="page" class="container">
<div class="row">
<div id="sidebar" class="3u">
    <section>
        <header class="major">
            <h2>Available Users</h2>
        </header>
        <ul class="default">
            <li><a href="#">   <h3><?php echo $fn->toCurrency(count($allacounts)); ?> Active  User(s) </h3></a></li> 
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
                        <span class="byline">Create New User here(Passsword will be autogenerated)</span>
                    </header>
                    <form method="post" action="#" name="frmcreateuser" id="frmcreateuser">   
                     <input type="hidden" name="actiontype" id="actiontype" value="createuser">
                    <div id="not">
                 
                    </div>
                     <br>
                      	<div class="row half">
                      	<div class="4u">User Account:</div>
       <div class="8u"> <select class="form-control"  name="userselectAccount" id="userselectAccount">
 <?php  
        for ($i = 0; $i < count($allacounts); $i++) { //break the string in the array
              $fields = explode(":", $allacounts[$i]);
    ?>
   <option value="<?php echo $fields[0]; ?>"><a href="#"> <?php echo $fields[1]." ".$fields[2]; ?></a></option>
        <?php }?>
   </select></div>
	</div>
          <br>
                      <div class="row half">
                      	<div class="4u">User Role:</div>
                     <div class="8u"> <select class="form-control"  name="userselctUserRoles" id="userselctUserRoles" >
				     <?php echo $allroles; ?>
                         </select></div>
			</div> <br>
                                       
                        <br>   	
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Create User" class="button alt" id="btncreateuser"  />
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