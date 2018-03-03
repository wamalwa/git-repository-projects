<?php 
   $thispage = 'about';
require_once 'header.php' ?>
<!--=======content================================-->

<section id="content">
	<div class="full-width-container block-1">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>About Us</span></h2>
					</header>
				</div>
				<div class="grid_4">
					<div class="img_container"><img src="images/index-1_img-1.jpg" alt="img"></div>
				</div>
				<div class="grid_7 preffix_1">
					<p>Laixa Engineering Ltd is a turnkey firm committed to innovative designs, sustainable solutions and
						high quality products and services to clients. We have a firm belief that quality, competitive pricing,
						on- time deliveries & excellent customer service are all important and strive to be the best source for
						steel fabrication as well as engineering materials for our clients.</p>
						<br>
					<p>We are committed to helping our clients find engineering solutions that deliver immediate and long
						term bottom line results. Our combination of both on and off-site services enables us to deliver
						sustainable solutions to our clients. This is through a combination of professional know-how and
						proven technology with an approach tailored to our clients’ special needs to deliver a cost effective
						project to our client. The savings are delivered through best practices and superior designs.</p>
					<a href="#" class="btn" id="btn_link_more">More</a>

					<div id="div_more" style="display:none"><br>
					<p>We view clients as partners where mutual respect, trust and integrity lead to long term relationships
								over multiple projects.</p>
					<p>Our staff include mechanical design engineers and technicians who have experience in project design
								as well as management.</p>
					<p>We have strict quality control procedures and all our materials and products are carefully inspected
								before dispatch to the clients.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- 	<div class="full-width-container block-2 parallax-block" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Our Team</span></h2>
					</header>
				</div>
				<div class="grid_3">
					<article>
						<div class="img_container"><img src="images/index-1_img-2.jpg" alt="our team"></div>
						<h4>Mark Gret</h4>
						<p>Lamus at magna non derto merli seworet gertomin</p>
					</article>
				</div>
				<div class="grid_3">
					<article>
						<div class="img_container"><img src="images/index-1_img-3.jpg" alt="our team"></div>
						<h4>Irma Anderson</h4>
						<p>Lamus at magna non derto merli seworet gertomin</p>
					</article>
				</div>
				<div class="grid_3">
					<article>
						<div class="img_container"><img src="images/index-1_img-4.jpg" alt="our team"></div>
						<h4>Sam Wood</h4>
						<p>Lamus at magna non derto merli seworet gertomin</p>
					</article>
				</div>
				<div class="grid_3">
					<article>
						<div class="img_container"><img src="images/index-1_img-5.jpg" alt="our team"></div>
						<h4>Kevin Thomson</h4>
						<p>Lamus at magna non derto merli seworet gertomin</p>
					</article>
				</div>
			</div>
		</div>
	</div> -->
	<div class="full-width-container block-3">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Why Choose Us</span></h2>
					</header>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">1</span></div>
					<div class="grid_3">
						<p>We have a reliable Installation mechanical and electrical team that provides an immediate
response to our client’s needs </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">2</span></div>
					<div class="grid_3">
						<p>Knowing the importance of client satisfaction, we understand that some clients require
jobs done within a specific time frame and we deliver just that</p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">3</span></div>
					<div class="grid_3">
						<p>We care about you! Maintaining good condition for existing systems, structures and
equipment offers additional years of service thus giving you value for your product and
money. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-4">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Our Core Values</span></h2>
					</header>
				</div>

				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">1</span></div>
					<div class="grid_3">
						<p>Hard work </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">2</span></div>
					<div class="grid_3">
						<p>Honesty & Integrity</p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">3</span></div>
					<div class="grid_3">
						<p>Quality </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">4</span></div>
					<div class="grid_3">
						<p>Customer Service </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">5</span></div>
					<div class="grid_3">
						<p>Respect </p>
					</div>
				</div>
				<div class="grid_4">
					<div class="grid_1 alpha"><span class="element bd-ra">6</span></div>
					<div class="grid_3">
						<p>Health & Safety </p>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<script>

$(document).ready(function(){
  
   $('#btn_link_more').click(function(){
         chnageDisplayState('div_more','block'); 
          chnageDisplayState('btn_link_more','none'); 
        }) ;
        
});

function chnageDisplayState(element,state){
    document.getElementById(element).style.display=state; 
}
</script>
	</script>
<?php require_once 'footer.php' ?>