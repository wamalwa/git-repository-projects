	<!--header-top-->
<?php 

function checkActive($page,$thispage){

	if($page===$thispage){
		echo 'class="active"';
	}
}
?>
  <div class="col-md-8" style="margin:0">
  <div class="col-md-8" style="margin:0">
	<img src="images/logo17.png" style="width:500px;height:155px;" alt="" />
</div>
		
 </div>	

 <div class="col-md-4 head-right">
   <h5>Phone Number:+254729 974 764</h5>
   <h5>Email: info@ricdotecsolutions.com</h5>
 </div>
 <div class="clearfix"></div>
	<!--header-top-->
	<!--navigation-starts-->
	<div class="navigation">
        <span class="menu"></span>
        <ul class="navig cl-effect-16">
            <li <?php checkActive('index',$thispage); ?>><a href="index.php">Home</a></li>
            <li <?php checkActive('about',$thispage); ?>><a href="about.php">About Us</a></li>
            <li <?php checkActive('services',$thispage); ?>><a href="services.php">Our Services</a></li>
            <li <?php checkActive('products',$thispage); ?>><a href="products.php">Our Products</a></li>
            <li <?php checkActive('supplies',$thispage); ?>><a href="supplies.php">Our Supplies</a></li>
            <li <?php checkActive('events',$thispage); ?>><a href="events.php">Event Planning</a></li>
            <li <?php checkActive('contact',$thispage); ?>><a href="contact.php">Contact Us</a></li>
        </ul>
	</div>
	<!--navigation-end-->
	<!--script-for-menu-->
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>
	<!--script-for-menu-->