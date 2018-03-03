<?php
$allusergroups  = $fn->GetUsergroups();
$allroles       = $fn->GetAllViewRoles();
?>
<!-- Page -->

<div id="sidebar" class="8u">
                <section>
                 <form method="post" action="#" name="frmassignRoles" id="frmassignRoles">   
                     <input type="hidden" name="actiontype" id="actiontype" value="AssignRoles">
                    <div id="not">
                 
                    </div>
                     <br>
                     <div class="row half">
                      	<div class="4u">User Group:</div>
                     <div class="8u"> <select class="form-control"  name="userselctUserGroup" id="userselctUserGroup" >
				     <?php echo $allusergroups; ?>
                         </select></div>
		      </div> <br>
  <div class="span6">

 <table class="table table-bordered table-condensed table-striped">
     <thead style="font-weight:bold">
          <tr>
            <th></th>
            <th colspan="2">User Roles</th>           
          </tr>
          <tr>
            <th>#</th>
            <th>Role Name</th>
            <th>Role Description</th>
             <th><label><input class="text" type="checkbox" name="allcheckboxroles" id="mastercheckbox" /> </label> </th>
          </tr>
        </thead>
        <tbody>
       <?php  
        for ($i = 0; $i < count($allroles); $i++) { //break the string in the array
              $fields = explode("|", $allroles[$i]);
              $no     = $i+1;
        ?>
          <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $fields[1];?></td>
            <td><?php echo $fields[2];?></td>
            <td><label> <input class="text" type="checkbox" name="checkboxroles[]" value="<?php echo $fields[0]; ?>" /> </label> </td>
          </tr>
           <?php }?>
        </tbody>
      </table>
	</div>
	
        <br>   	
        <div class="row half">
            <div class="12u">
                <ul class="actions">
                    <li>
                        <input type="submit" value="Add Profile" class="button alt" id="btnAssignRoles"  />
                    </li>
                </ul>
            </div>
        </div>
            </form>
        </section>
            </div>
<!-- End Page -->
