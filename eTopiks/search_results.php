<?php  
$page_title='Search Results'; 
$currectPage='search_results.php';
include_once 'ui_header.php';
$Search=$_GET['Search'];
$posts=$fn->GetAllPostsBySearchQuery($Search);
$post_count=count($posts);

//just in
$posts_ji=$fn->GetAllPostJustIn();
$posts_cc=$fn->GetAllPostsByClickCount();

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
<div class="blog_block col-lg-9 col-md-9 ">


    <?php 
    if($post_count==0){?>
    <div class="recent_posts_widget clearfix " style="font-size: 15em">
        No Search Results found for <b><?php echo $Search;?></b>
    </div>
        <?php
    }
  else { ?>
  <div class="recent_posts_widget clearfix" style="font-size: 15em">
  <?php echo $post_count;?>  Search Results found for <b><?php echo $Search;?></b>
 </div>
   <?php  for($i=0;$i<$post_count;$i++){ 
     $fields = explode("|", $posts[$i]); 
        
     $media_details=$fn->GetAllMedia($fields[1]);
     $media_fields = explode("|", $media_details[0]);
     ?>
    
      <div class="recent_posts_widget clearfix col-md-4">
        <div class="post_item_img_widget">
            <img src="http://<?php echo $_SERVER['HTTP_HOST'] ;?>/eTopiksPortal/<?php echo $media_fields[1]; ?>" alt="<?php echo $media_fields[1]; ?>" />
        </div>
        <div class="post_item_content_widget">
         <a class="title" href="blog-post.php?postCode=<?php echo $fields[1];  ?>"><?php echo $fields[2];  ?></a>
           <h6> <?php echo $fields[7];?> | <?php echo $fn->DateFormater($fields[0]);?></h6>
        </div>
    </div>
    <?php }
    
    }?>
         
  
         
  </div><!-- //BLOG BLOCK -->
                        <!-- SIDEBAR -->
<div class="sidebar col-lg-3 col-md-3 padbot50">
<div class="sidepanel widget_popular_posts">
 <p style="margin:0 auto;font-size: 12em">Advertisement</p>
        </div>

   <!-- POPULAR POSTS WIDGET -->
<div class="sidepanel widget_popular_posts">
    <h3><b>Just</b> In </h3>

    <?php 
    $max=count($posts_ji);    
     for($i=0;$i<$max;$i++){
         $fields_ji = explode("|", $posts_ji[$i]);
         
     $media_details=$fn->GetAllMedia($fields_ji[1]);
     $media_fields = explode("|", $media_details[0]);
         ?>
      <div class="recent_posts_widget clearfix">
            <div class="post_item_img_widget">
                    <img  src="http://<?php echo $_SERVER['HTTP_HOST'] ;?>/eTopiksPortal/<?php echo $media_fields[1]; ?>" alt="" />
            </div>
            <div class="post_item_content_widget">
                    <a class="title" href="blog-post.php?postCode=<?php echo $fields_ji[1];  ?>" ><?php echo $fields_ji[2];  ?></a>
                   <h6><?php echo $fields_ji[7];?> | <?php echo  $fn->DateFormater($fields_ji[0]);?></h6>
            </div>
    </div>
    
     <?php 
     
     }
    
    ?>
  

</div><!-- //POPULAR POSTS WIDGET -->

  <hr>

<!-- POPULAR TAGS WIDGET -->
<div class="sidepanel widget_tags">
        <h3><b>Latest</b> News </h3>
        <ul>
                <li><a href="javascript:void(0);" >Fashion</a></li>
                <li><a href="javascript:void(0);" >Shop</a></li>
                <li><a href="javascript:void(0);" >Color</a></li>
                <li><a href="javascript:void(0);" >Creative Agency</a></li>
                <li><a href="javascript:void(0);" >Theme</a></li>
                <li><a href="javascript:void(0);" >Dress</a></li>
                <li><a href="javascript:void(0);" >Wordpress</a></li>
        </ul>
</div><!-- POPULAR TAGS WIDGET -->

    <hr>

    <!-- TEXT WIDGET -->
    <div class="sidepanel widget_text">
            <h3><b>About</b> Blog</h3>
            <p>I must admit this particular defense set me on edge a little bit, for two reasons. The first is that she’s being held to a completely different standard than male politicians are held to.</p>
    </div><!-- //TEXT WIDGET -->
    </div><!-- //SIDEBAR -->
                </div><!-- //ROW -->
        </div><!-- //CONTAINER -->
          <div class="container center">
        <p style="margin:0 auto;font-size: 12em">Advertisement</p>
        </div>
</section><!-- //BLOG -->
</div><!-- //PAGE -->


<!-- CONTACTS -->
<section id="contacts">
</section><!-- //CONTACTS -->
<?php include_once 'ui_footer.php';?>
