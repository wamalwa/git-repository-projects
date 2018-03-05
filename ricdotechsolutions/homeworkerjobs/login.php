<!--Master Page display-->
<?php 
$login="class='active'";
$title="Login";
include_once ('ui/master.php'); ?>

<div class="container">
    <div class="col-md-4 col-sm-12">
</div>
<div class="well panel-primary col-md-4 col-sm-12" style="margin-top:0px; padding:0px">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1.5em">Home Worker Jobs Login</h3>
  </div>
  <div class="panel-body">
  <form method="post" id="login_form" >
                <div class="body bg-gray">
				<div id="not"></div>
                    <div class="form-group required">
                        <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="User name"/>
                    </div>
                    <div class="form-group required">
                        <input type="password" name="userpassword" id="userpassword" class="form-control" placeholder="Password"/>
                    </div>          
                 
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" id="login">Sign in</button> 
					<br>
                    <p><a href="register.php">Not yet Registered? Do it Now!</a></p>
                    <p align="center">&copy; Home Worker Jobs All Rights Reserved</p>
                    
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            </form>
  </div>
</div>
</div>

<!--Footer-->
<?php include_once ('ui/footer.php'); 



?>


