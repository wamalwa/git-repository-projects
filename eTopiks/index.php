
<?php require 'backend/config.php'; 
require('backend/functions.php');
$fn = new Functions();

?>    
    
<?php  

$page_title='eTopiks News'; 
$currectPage = explode('/',$_SERVER['REQUEST_URI'])[2];
include_once 'ui_header.php';
$posts=$fn->GetAllPosts();
$fields = explode("|", $posts[0]);

//just in
$posts_ji=$fn->GetAllPostJustIn();
//get posta by clickcount
$posts_cc=$fn->GetAllPostsByClickCount();
//get post by categories

 $mdeia_details=$fn->GetAllMedia($fields[1]);
 $mdei_fields = explode("|", $mdeia_details[0]);
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
        <!-- BLOG POST -->
        <div class="blog_post  clearfix" data-animated="fadeInUp">
            <div class="col-lg-12">
                <div class="col-lg-8 wrapper" style="float:left;">
                    <a href="backend/action.php?postCode=<?php echo $fields[1];?>&type=postCount&link=http://<?php echo $_SERVER['HTTP_HOST'] ?>/enews/blog-post.php">
                        <img src="http://<?php echo $_SERVER['HTTP_HOST'] ;?>/eTopiksPortal/<?php echo  $mdei_fields[1]; ?>" style=" width:100%;height:370px;" />  </a>
                        <div class='description col-lg-12'>
                                <h3><b><?php echo $fields[2];?> - </b><em style="font-size:12pt;"><?php echo $fields[7];?> | <?php echo $fn->DateFormater($fields[0]);?></em></h3>						
                                <p class='description_content'><?php echo substr($fields[4], 0, 100) ?>...
                                <a href="backend/action.php?postCode=<?php echo $fields[1];?>&type=postCount&link=http://<?php echo $_SERVER['HTTP_HOST'] ?>/eTopiks/blog-post.php">read on</a></p>  
                        </div>  

                </div>
<div class="col-lg-4">
    <div class="sidepanel widget_popular_posts">
         <h3><b>Top</b> Stories </h3>
  <?php 
    $max = count($posts_cc);    
     for($i = 0;$i<$max;$i++){
         $fields_cc = explode('|', $posts_cc[$i]);
         ?>
        <div class="post_item_content_widget">
            <a class="title" href="backend/action.php?postCode=<?php echo $fields_cc[1];?>&type=postCount&link=http://<?php echo $_SERVER['HTTP_HOST'] ?>/eTopiks/blog-post.php"><?php echo $fields_cc[2];  ?></a>
        </div><hr/>
         <?php }?>
                  <hr/>
        </div>

    </div>
   </div>

 </div>
</div>       
     <!--PSOT by Categories-->  
 <?php
 
$categories = $fn->GetAllCategories();
$cat_total = count($categories);
    
 for($catIndex=0;$catIndex<$cat_total;$catIndex++){
    
   $fields_cats= explode('|', $categories[$catIndex]);
    $cat_id=$fields_cats[0];
        //News CategoryID 1
    $posts_cat=$fn->GetAllPostsByCategory($fields_cats[0],4);
    $nc=count($posts_cat);
    //check if there is content in this category
if($nc>0){
     
?> 

 <hr>
 <div class="row"><h3><?php echo $fields_cats[1]; ?></h3>
    <?php 

    for($i=0;$i<$nc;$i++){
       $fields_cat= explode('|', $posts_cat[$i]);
       
     $media_details=$fn->GetAllMedia($fields_cat[1]);
     $media_fields = explode('|', $media_details[0]);
     ?>
      <div class="recent_posts_widget clearfix col-md-4">
        <div class="post_item_img_widget">
        <img src="http://<?php echo $_SERVER['HTTP_HOST'] ;?>/eTopiksPortal/<?php echo $media_fields[1]; ?>" alt="<?php echo $media_fields[1]; ?>" style="width: 270px;height: 180px"  />
        </div>
        <div class="post_item_content_widget">
                <a class="title" href="backend/action.php?postCode=<?php echo $fields_cat[1];?>&type=postCount&link=http://<?php echo $_SERVER['HTTP_HOST'] ?>/eTopiks/blog-post.php"><?php echo $fields_cat[2];  ?></a>
                <h6>  <?php echo $fields_cat[7];?> | <?php echo $fn->DateFormater($fields_cat[0]);?></h6>
        </div>
    </div>
    <?php  }
   
    ?>
   </div> 

 <?php 
 
 }
    }?>  
     <!--PSOT by Categories-->         
</div>

       
   
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
         $fields_ji = explode('|', $posts_ji[$i]);
         
      $mdeia_details=$fn->GetAllMedia($fields_ji[1]);
      $mdei_fields = explode('|', $mdeia_details[0]);
         ?>
      <div class="recent_posts_widget clearfix">
            <div class="post_item_img_widget">
                <img  src="http://<?php echo $_SERVER['HTTP_HOST'] ;?>/eTopiksPortal/<?php echo $mdei_fields[1]; ?>" alt="<?php echo $mdei_fields[1]; ?>" style="width: 270px;height: 180px" />
            </div>
            <div class="post_item_content_widget">
                    <a class="title" href="backend/action.php?postCode=<?php echo $fields_ji[1];?>&type=postCount&link=http://<?php echo $_SERVER['HTTP_HOST'] ?>/eTopiks/blog-post.php" ><?php echo $fields_ji[2];  ?></a>
                    <h6>  <?php echo $fields_ji[7];?> | <?php 
                    echo $fn->DateFormater($fields_ji[0]);?></h6>
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
<!--    <div class="sidepanel widget_text">
            <h3><b>About</b> Blog</h3>
            <p>I must admit this particular defense set me on edge a little bit, for two reasons. The first is that she’s being held to a completely different standard than male politicians are held to.</p>
    </div> //TEXT WIDGET -->
    </div>
     
   </div>  
     <!-- //SIDEBAR -->
</div><!-- //ROW -->
  
</section>      
<div class="container center">
<p style="margin:0 auto;font-size: 12em">Advertisement</p>
</div>
<?php //include_once 'ui_footer.php';

