<?php require 'backend/config.php'; 
require('backend/functions.php');
$fn = new Functions();

?>  
<?php  
$page_title='Advertisement'; 
$currectPage=explode('/',$_SERVER['REQUEST_URI'])[2];
include_once 'ui_header.php';?>
 
<section id="advertsection" >
<p style="margin:0 auto;font-size: 12em">Advertisement</p>
</section>

<!-- BLOG -->
<section id="blog">

<!-- CONTAINER -->
<div class="container">

        <!-- ROW -->
 <div class="row">

 </div>
</div>
</section>


<?php include_once 'ui_footer.php';


