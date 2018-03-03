<?php 
   $thispage = 'contacts';
require_once 'header.php' ?>
<!--=======content================================-->

<section id="content">
	<div class="full-width-container block-1">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Our Locations</span></h2>
					</header>
					<div class="content_map">
						<div class="google-map-api"> 
							<div id="map-canvas" class="gmap"></div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-2">
		<div class="container">
			<div class="row">
				<div class="grid_5">
					<form id="contact-form">
						<div class="contact-form-loader"></div>
							<header>
								<h2><span>Contact Form</span></h2>
							</header>
							<fieldset>
									<label class="name">
										<span class="text">Your Name:</span>
										<input type="text" name="name" placeholder="" value="" data-constraints="@Required @JustLetters" />
											<span class="empty-message">*This field is required.</span>
											<span class="error-message">*This is not a valid name.</span>
									</label>
									<label class="email">
										<span class="text">Your E-mail:</span>
										<input type="text" name="email" placeholder="" value="" data-constraints="@Required @Email" />
										<span class="empty-message">*This field is required.</span>
										<span class="error-message">*This is not a valid email.</span>
									</label>
									<label class="phone">
										<span class="text">Subject:</span>
										<input type="text" name="phone" placeholder="" value="" data-constraints="@Required" />
										<span class="empty-message">*This field is required.</span>
										<span class="error-message">*This is not a valid subject.</span>
									</label>
									<label class="message">
										<span class="text">Message:</span>
										<textarea name="message" placeholder="" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
										<span class="empty-message">*This field is required.</span>
										<span class="error-message">*The message is too short.</span>
									</label>
								<div class="cont_btn">
									<a href="#" data-type="reset" class="btn">Clear</a>
									<a href="#" data-type="submit" class="btn">Send</a>
								</div>
						</fieldset> 
						<div class="modal fade response-message">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Modal title</h4>
									</div>
									<div class="modal-body">
										You message has been sent! We will be in touch soon.
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="grid_6 preffix_1">
					<div>
						<hader>
							<h2><span>Contact Information</span></h2>
						</hader>
						<p class="el-1">Our workshop with a full range of modern equipment and machinery is located at Lungalunga
Rod Laki House.</p>
					</div>
					<div class="grid_3 alpha">
						<div class="address">
							<p>Laixa Engineering Limited. <br>Umoja Estate Moi Drive, <br> Plot No B47</p>
						</div>
					</div>
					<div class="grid_3">
						<div class="address">
							<p>Mailing Address: P.O BOX 53953-00200 NAIROBI, KENYA <br>Telephone Number: 0735126244<br>E-mail: <a href="mailto:laixaengineering@gmail.com" class="mail">laixaengineering@gmail.com</a></p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php' ?>