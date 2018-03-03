<div class="panel panel-primary col-md-12 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">Add New User</h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php">  
  <input type="hidden" name='actiontype' id="actiontype" value="AddUser">
   <div class="body bg-gray">
	<div id="not"><?php $fn->setFlash();?></div>
  <div class="row">
     <div class="form-group col-md-6 required">
       <div class="control-label">First Name</div>
      <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required="true"/>
  </div>
  <div class="form-group col-md-6 required"> <div class="control-label">Second Name</div>
      <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Second Name"/>                      
  </div>
  </div>  
  <div class="row">          
      <div class="col-md-6">           
      <div class="col-md-3  control-label">Gender</div>  
      <div class="col-md-3">  
      <INPUT type="radio" name="gender" value="Male" class="form-group" > Male  </INPUT>
    </div>
       <div class="col-md-4">  
      <INPUT type="radio" name="gender" value="Female" class="form-group"> Female </INPUT>
     </div> 
   </div>
   </div>

  <div class="row">                
  <div class="form-group col-md-6 required"> <div class="control-label">Select User Group</div>
       <?php   $fn->dropdwonList($fn->find_usergroups('dropdown'),
                    array('name'=>'groupid','class'=>'form-control')); ?>
  </div> 
<div class="form-group col-md-6 required"> <div class="control-label">User Type</div>
<select name="user_type" class="form-control">
  <option value="Writer">Writer</option>
  <option value="Admin">Admin</option>
</select>
  </div> 
    
  </div> 
  <div class="row"> 
    <div class="form-group col-md-6 required"> <div class="control-label">Email Address</div>
      <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="Email Address" required="true"/>
  </div>                          
  <div class="form-group col-md-6 required"> <div class="control-label">Phone Number</div>
      <input type="text" name="phonenumber" maxlength="12" id="phonenumber" class="form-control" placeholder="Phone Number"/>
  </div>                 
  <div class="form-group col-md-6 required"> <div class="control-label">Country of Origin</div>
       <?php   $fn->dropdwonList($fn->find_countries('dropdown'),
                    array('name'=>'country','class'=>'form-control')); ?>
  </div>          
  </div>         
    </div>
    <div class="row">
              <div class="form-group col-md-12">                           
                  <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" id="register">Create Account</button> 
              </div>
    </div>
</form>
</div>
</div>