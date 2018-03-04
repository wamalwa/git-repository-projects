<!-- FOOTER -->
<footer>

<!-- CONTAINER -->
<div class="container">

<!-- ROW -->
<div class="row" data-appear-top-offset="-200" data-animated="fadeInUp">


    <div class="col-lg-3 col-md-3 col-sm-3 padbot30 foot_about_block">
            <h4><b>About</b> us</h4>
            <p>We value people over profits, quality over quantity, and keeping it real. As such, we deliver an unmatched working relationship with our clients.</p>
            <p>Our team is intentionally small, eclectic, and skilled; with our in-house expertise, we provide sharp and</p>

    </div>

        <div class="col-lg-3 col-md-3 col-sm-3 padbot30">
                <h4><b>Categories</b> </h4>
                     <ul class="ph">                                   
                            <li class="first scroll_btn <?php echo $fn->CheckActivePage('index.php',$currectPage);?>"><a href="index.php">News</a></li>
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Sports'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Sports</a></li> 
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Business'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Business</a></li>
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Entertainment'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Entertainment</a></li>                                        
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Lifestyle'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Lifestyle</a></li>                                        
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Videos'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Videos</a></li>                                        
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('How To'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">How To</a></li>                                                                    
                            <li class="scroll_btn <?php $id=$fn->GetCategoryIDByName('Jobs'); echo $fn->CheckActivePage("postsbycategories.php?id=$id",$currectPage);?>"><a href="postsbycategories.php?id=<?php echo $id;?>">Jobs</a></li>
                        </ul>
                           
        </div>
     <div class="col-lg-3 col-md-3 col-sm-3 padbot30">
                <h4><b>Live</b> </h4>
              <ul class="ph">
                    <li class="first scroll_btn <?php echo $fn->CheckActivePage("livetv.php",$currectPage);?>"><a href="livetv.php">Live TV</a></li>
                    <li class="first scroll_btn <?php echo $fn->CheckActivePage("onlineradio.php",$currectPage);?>"><a href="onlineradio.php">Online Radio</a></li>
                    <li class="first scroll_btn <?php echo $fn->CheckActivePage("advertisement.php",$currectPage);?>"><a href="advertisement.php">Advertisement</a></li>
              </ul>
                           
        </div>
        <div class="respond_clear"></div>

        <div class="col-lg-3 col-md-3 padbot30">
                <h4><b>Contacts</b> Us</h4>
                <!-- CONTACT FORM -->
                <div class="span9 contact_form">
                    <div id="note"></div>
                    <div id="fields">
                            <form id="contact-form-face" class="clearfix" action="#">
                                    <input type="text" name="name" value="Name" onFocus="if (this.value == 'Name') this.value = '';" onBlur="if (this.value == '') this.value = 'Name';" />
                                    <textarea name="message" onFocus="if (this.value == 'Message') this.value = '';" onBlur="if (this.value == '') this.value = 'Message';">Message</textarea>
                                    <input class="contact_btn" type="submit" value="Send message" />
                            </form>
                    </div>
                </div><!-- //CONTACT FORM -->
        </div>
        </div><!-- //ROW -->
</div><!-- //CONTAINER -->
<div class='col-md-4'></div><a href="#" class="ph">Designed and Developed By Univeit L.t.d.</a></div>
</footer><!-- //FOOTER -->
	<!-- MAP -->
    <div id="map">
        <a class="map_hide" href="javascript:void(0);"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></a>
        <iframe src="http://maps.google.com/maps?f=q&amp;give%20a%20hand=s_q&amp;hl=en&amp;geocode=&amp;q=london&amp;sll=37.0625,-95.677068&amp;sspn=42.631141,90.263672&amp;ie=UTF8&amp;hq=&amp;hnear=London,+United+Kingdom&amp;ll=51.500141,-0.126257&amp;spn=0.026448,0.039396&amp;z=14&amp;output=embed" ></iframe>
    </div><!-- //MAP -->

</div>
</body>
</html>