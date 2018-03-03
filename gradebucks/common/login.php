<div class="col-md-4 ">
</div>
<div class="well panel-primary col-md-4 col-sm-12" style="margin-top:0px; padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.2em">Gradebucks User Area</h3>
  </div>
  <div class="panel-body bg-gray">
  <form method="POST" action="common/core/action.php" name="login_form" id="login_form">
<div class="row col-md-6 ">
	<div class="col-md-6 form-group" > 
	 <input type="hidden" name='actiontype' id="actiontype" value="login" class="form-control">
	 </div>
</div>
			
<div class="row"><div class="col-md-2"></div>
<div id="not"><?php $fn->setFlash();?></div>	
</div>			
		<div class="form-group">							
			<input class="form-control required" type="text" name="myusername" id="myusername" placeholder="Email Address or Phone Number" required="true"/>
		</div>
		<div class="form-group required">
			<input class="form-control" type="password" name="mypassword" id="mypassword" placeholder="Password" required="true"/>
		</div>
		<div class="form-group">
		<input type="submit" value="Login" class="btn btn-block btn-primary" name="btnlogin" /><hr>
            <p><a href="index.php?r=common/signup&p=Registration Page" class="btn btn-block btn-default">Don't have an Account? Create Now!</a></p>
            <p align="center">&copy; Gradebucks All Rights Reserved</p>
	  </div>
</form>
 
  </div>
</div>



			
