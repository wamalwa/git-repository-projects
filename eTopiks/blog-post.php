<?php require 'backend/config.php'; 
require('backend/functions.php');
$fn = new Functions();

?> 
<?php  
$page_title='News Blog'; 

include_once 'ui_header.php';
$postCode=$_GET['postCode'];
$postDetails=$fn->GetPostDetails($postCode);
$fields = explode('|', $postDetails);

 $media_details=$fn->GetAllMedia($postCode);
 $media_fields = explode('|', $media_details[0]); 
 $posts_lc=$fn->GetAllPostsByClickCount();
 
 //get comments for this post
 $comments=$fn->GetAllPostComments($postCode); 
 
?> 
<section id="advertsection" >
<p style="margin:0 auto;font-size: 12em">Advertisement</p>
</section>
	<!-- BLOG -->
		<section id="blog">			
			<!-- CONTAINER -->
			<div class="container">				
				<!-- ROW -->
				<div class="row">				
<!-- BLOG BLOCK -->
	<div class="blog_block col-lg-9 col-md-9 padbot50"> 
        <div class="single_blog_post clearfix" data-animated="fadeInUp">
                <div class="single_blog_post_descr">
                        <div class="single_blog_post_date"> <?php  echo $fn->DateFormater($fields[0]);?></div>
                        <div class="single_blog_post_title"><?php echo $fields[2];?></div>
                    
                </div>
                <div class="single_blog_post_img">
                <img src="http://<?php echo $_SERVER['HTTP_HOST'] ;?>/eTopiksPortal/<?php echo $media_fields[1]; ?>" alt="" style=" width:100%;height:370px;" /></div>

                <div class="single_blog_post_content">
               <?php echo $fields[4];?>
                    <h3><b>From:</b> <a class="alink" href="backend/action.php?type=linkUrl&postCode=<?php echo $fields[1];?>&link=<?php echo $fields[5];?>"><?php echo $fields[6];?></a></h3>
                    
                         <a href="javascript:void(0);" ><?php echo $fields[8]; ?> Likes</a>
                       
                </div>
        </div> 
            <div col-md-4 >
                <h5>  <a href="backend/action.php?type=LikePost&postCode=<?php echo $fields[1];?>&link=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;?>">
                        <img src="images/like.png" alt="Like" style="height:60px;width:70px"/>
                    </a></h5>
            </div>
        <!-- COMMENTS -->
        <div id="comments" class="margbot30" data-animated="fadeInUp">
                <h3><b>Comments </b><span class="comments_count">(<?php            
                 $c_count=count($comments);
                if($c_count<=0){$c_count=0; echo $c_count;}else{ echo $c_count;}?>)</span></h3>
         <hr>
          <!-- LEAVE A COMMENT -->
      <div class="leave_comment" data-animated="fadeInUp">
            <form id="comment_form" class="row" method="post" action="#">
                
                <div style="display: none">  <input typ="hidden" id="postCode" value="<?php echo $postCode ?>" /></div>
                    <div class="col-lg-4 col-md-4">
                            <input type="text" id="visitorsname" name="name" value="Your Name *" onFocus="if (this.value == 'Your Name *') this.value = '';" onBlur="if (this.value == '') this.value = 'Your Name *';" />
                            <input type="text" id="emailaddress" name="emailaddress" value="E-mail " onFocus="if (this.value == 'E-mail *') this.value = '';" onBlur="if (this.value == '') this.value = 'E-mail *';" />
                            <div class="comment_note">All fields marked with an asterisk (*) are required</div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                            <textarea id="message_body" name="message" onFocus="if (this.value == 'Your message *') this.value = '';" onBlur="if (this.value == '') this.value = 'Your message *';">Your message *</textarea>
                            <input class="contact_btn pull-right" type="submit" value="Send message" id="send_message"/>
                    </div>
            </form>
            </div><!-- //LEAVE A COMMENT -->
            <ul>
         <?php 
         if($c_count>0){
             for($i=0;$i<$c_count;$i++){
                 $comments_fields = explode('|', $comments[$i]);
          ?>
    <li class="clearfix" >
     <div class="pull-left avatar">
         <a href="javascript:void(0);" ><img src="images/avatar1.png" alt="" /></a>
     </div>
         <div class="comment_right" >
                 <div class="comment_info clearfix">
                     <div class="pull-left comment_author"><?php echo $comments_fields[2];?></div>
                         <div class="pull-left comment_inf_sep">|</div>
                         <div class="pull-left comment_date"><?php echo $fn->DateFormater($comments_fields[4]);?></div>
                 </div>
                 <p><?php echo $comments_fields[1];?></p>
         </div>
         </li>
                    <?php }
               
                    ?>
            </ul>
            <?php } ?>
        </div>
						<!-- //COMMENTS -->
						
  
    </div><!-- //BLOG BLOCK -->

					
					<!-- SIDEBAR -->
<div class="sidebar col-lg-3 col-md-3 padbot50">
						
                            <!-- POPULAR POSTS WIDGET -->
  <div class="sidepanel widget_popular_posts">
          <h3><b>Popular</b> Posts</h3>
      <?php 
      
     $max=count($posts_lc);    
     for($i=0;$i<$max;$i++){
         $lc_fields = explode('|', $posts_lc[$i]);
         
      $media_details=$fn->GetAllMedia($lc_fields[1]);
      $media_fields = explode('|', $media_details[0]);
     
    ?>
     <div class="recent_posts_widget clearfix">
        <div class="post_item_img_widget">
             <img  src="http://<?php echo $_SERVER['HTTP_HOST'] ;?>/eTopiksPortal/<?php echo $media_fields[1]; ?>" alt="<?php echo $media_fields[1]; ?>" style="width: 270px;height: 180px"  />
        </div>
        <div class="post_item_content_widget">
               <a class="title" href="backend/action.php?postCode=<?php echo $lc_fields[1];?>&type=postCount&link=http://<?php echo $_SERVER['HTTP_HOST'] ?>/eTopiks/blog-post.php" ><?php echo $lc_fields[2];  ?></</a>
            
               <h6><?php echo $lc_fields[7];?> | <?php echo $fn->DateFormater($lc_fields[0]);?></h6>
        </div>
   </div>
     
     <?php  }    ?>
        
            </div><!-- //POPULAR POSTS WIDGET -->
            <hr>
            <!-- TEXT WIDGET -->
            <div class="sidepanel widget_text">
                    <h3><b>About</b> Blog</h3>
                    <p>I must admit this particular defense set me on edge a little bit, for two reasons.
                        The first is that she’s being held to a completely different standard than male politicians are
                        held to.</p>
            </div><!-- //TEXT WIDGET -->
            <br><br><br>
             </div><!-- //SIDEBAR -->
            </div><!-- //ROW -->
    </div><!-- //CONTAINER -->
		</section><!-- //BLOG -->
	</div><!-- //PAGE -->


	<?php include_once 'ui_footer.php';?>

	