<div class="col-md-4 ">
</div>
<div class="well panel-primary col-md-4 col-sm-12" style="margin-top:0px; padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">Stay Secure, Change your Password here</h3>
  </div>
  <div class="panel-body bg-gray">
  <form method="POST" action="common/core/action.php" name="login_form" id="login_form">
<div class="row col-md-6 ">
	<div class="col-md-6 form-group" > 
	 <input type="hidden" name='actiontype' id="actiontype" value="ChangePassword" class="form-control">
	 </div>
</div>
			
<div class="row"><div class="col-md-2"></div>
<div id="not"><?php $fn->setFlash();?></div>	
</div>			
		<div class="form-group">							
                    <input class="form-control" type="password" name="current_password" id="current_password" placeholder="Current Passowrd" required="true"/>
		</div>
		<div class="form-group required">
			<input class="form-control " type="password" name="new_password" id="new_password" placeholder="New Password" required="true" />
		</div>
		<div class="form-group required">
			<input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="true"/>
		</div>
		<div class="form-group">
		<input type="submit" value="Change" class="btn btn-block btn-primary" name="btnChangePassword" />
                <p align="center"><br>&copy; Rush My Writing All Rights Reserved</p>
	  </div>
</form>
 
  </div>
</div>
<script>
//events
  
$(document).ready(function(){
         
    $('#confirm_password').blur(function(){
     var new_password       = $('#new_password').val();
     var confirm_password   = $('#confirm_password').val();

     if(confirm_password.length<6){
         alert('Weak password. Ensure the length is greater than 6 characters');
     }
     else if(!(new_password==confirm_password)){
         alert('The new password and confirm password do not match. Please ensure the passwords are the match')
     }
     else{
         $('#confirm_password').addClass('sucess');
     }
    });   
    $('#btnChangePassword').click(function(){
     var new_password       = $('#new_password').val();
     var confirm_password   = $('#confirm_password').val();

     if(confirm_password.length<6){
         alert('Weak password. Ensure the length is greater than 6 characters');
         return false;
     }
     else if(!(new_password==confirm_password)){
         alert('The new password and confirm password do not match. Please ensure the passwords are the match');
         return false;
     }
     else{
         return true;
     }
    });
 
 
});

</script>



			
