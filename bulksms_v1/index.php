<?php
$page_title="Bulk SMS  | Login";
$head="Login";
$currectPage='index.php';
 include_once 'header.php';
?>
<!-- Content -->
		<div id="footer" class="wrapper">
			<div class="container">
				<section>
					<header class="major">
						<h2>Login here</h2>
						<span class="byline">You must Login to Use this Portal</span>
					</header>
					<div class="col-md-6"></div>
					<form method="POST" action="#" name="login_form" id="login_form">	
					 <input type="hidden" name='actiontype' id="actiontype" value="login">
                    <div id="not">

                    </div>				
						<div class="row col-md-10">
							<div class="12u">							
								<input class="text" type="text" name="myusername" id="myusername" placeholder="Email Address or Phone Number" />
							</div>
						</div>
						
						<div class="row col-md-10">
							<div class="12u">
								<input class="password" type="password" name="mypassword" id="mypassword" placeholder="Password" />
							</div>
						</div>
						<div class="row col-md-10">
							<div class="12u">
								<ul class="actions">
									<li>
									<input type="submit" value="Login" class="button alt" name="btnlogin" id="btnlogin" />
									</li>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	<?php  include_once 'footer.php'; ?>
	