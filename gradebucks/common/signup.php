<div class="col-md-2"></div>
 <div class="panel panel-primary col-md-8 col-sm-12" style="padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">Register Now!</h3>
  </div>
  <div class="panel-body">
  <form method="post" id="register_form" action="common/core/action.php">  
  <input type="hidden" name='actiontype' id="actiontype" value="clientRegistration">
   <div class="body bg-gray">
	<div id="not"><?php $fn->setFlash();?></div>
  <div class="row">
     <div class="form-group col-md-6 required">
       <div class="control-label">First Name</div>
      <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required="true"/>
  </div>
  <div class="form-group col-md-6 required"> <div class="control-label">Second Name</div>
      <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name"/>                      
  </div>
  </div>  
  <div class="row">
      <div class="form-group col-md-6 required">
        <div class="control-label">Surname</div>
        <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" required="true"/>
    </div>          
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
  <div class="form-group col-md-6 required"> <div class="control-label">Email Address</div>
      <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="Email Address" required="true"/>
  </div>                         
  <div class="form-group col-md-6 required"> <div class="control-label">Phone Number</div>
      <input type="text" name="phonenumber" maxlength="12" id="phonenumber" class="form-control" placeholder="Phone Number"/>
  </div> 
  </div> 
  <div class="row">                  
  <div class="form-group col-md-6 required"> <div class="control-label">Country of Origin</div>
       <?php   $fn->dropdwonList($fn->find_countries('dropdown'),
                    array('name'=>'country','class'=>'form-control')); ?>
  </div>          
  </div>         
    </div>
  <div class="row">
  <div class="form-group col-md-12 required">
      <span> <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" required="true"/><a href="common/core/fileUplaods/Terms and Conditions.docx">I have read and agreed to terms and conditions.</a></span>
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