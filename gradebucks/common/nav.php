<?php  if(!empty($_SESSION['username'])) { ?>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">    
        <img src="images/logo.png" style="width: 200px;height: 80px"> &nbsp;<span><a href="#" style="font-size: 1.8em;"><?php echo $page_desc; ?> </a>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
<!-- Dashboard -->
<?php 
if($_SESSION['userdetails']['user_type']==='Admin'){
    ?>
   <!-- <li class="active"><a href="home.php">Dashboard</a></li> -->
        <?php  $fn->page_nav(array('url'=>'pages/admindashboard','name'=>'Admin Dashboard','active'=>$page,'visible'=>1)); ?>
<!-- Manage Posts -->
        <li><?php  $fn->page_nav(array('url'=>'#','name'=>'Manage Orders','active'=>'dropdown','visible'=>1)); ?>
          <ul>           
            <?php  $fn->page_nav(array('url'=>'pages/viewneworders','name'=>'View Orders','active'=>$page,'visible'=>1)); ?>
          </ul>
        </li>
         <li><?php  $fn->page_nav(array('url'=>'#','name'=>'Clients','active'=>'dropdown','visible'=>1)); ?>
          <ul>  
            <?php  $fn->page_nav(array('url'=>'pages/clients','name'=>'All Clients','active'=>$page,'visible'=>1)); ?> 
            <?php  $fn->page_nav(array('url'=>'pages/testimonials','name'=>'Testimonials','active'=>$page,'visible'=>1)); ?> 
          </ul>
        </li>
<!-- Statistics -->
            <?php  $fn->page_nav(array('url'=>'pages/statistics','name'=>'Statistics','active'=>$page,'visible'=>0)); ?> 
<!-- Users -->
        <li><?php  $fn->page_nav(array('url'=>'#','name'=>'Users','active'=>'dropdown','visible'=>1)); ?>
          <ul>  
            <?php  $fn->page_nav(array('url'=>'pages/newuser','name'=>'Add User','active'=>$page,'visible'=>1)); ?> 
            <?php  $fn->page_nav(array('url'=>'pages/manageusers','name'=>'Manage Users','active'=>$page,'visible'=>1)); ?> 
          </ul>
        </li>
<!-- Profiles -->
        <li><?php  $fn->page_nav(array('url'=>'#','name'=>'User Groups','active'=>'dropdown','visible'=>1)); ?>
          <ul>
            <?php  $fn->page_nav(array('url'=>'pages/assignroles','name'=>'Assign Roles','active'=>$page,'visible'=>1)); ?> 
            <?php  $fn->page_nav(array('url'=>'pages/addusergroup','name'=>'Add User Group','active'=>$page,'visible'=>1)); ?>
            </ul>
        </li>  
    <!-- System Admin     -->
          <li><?php  $fn->page_nav(array('url'=>'#','name'=>'System Admin','active'=>'dropdown','visible'=>1)); ?>          
          <ul> 
            <?php  $fn->page_nav(array('url'=>'pages/services','name'=>'Services','active'=>$page,'visible'=>1)); ?>
            <?php  $fn->page_nav(array('url'=>'pages/countries','name'=>'Countries','active'=>$page,'visible'=>1)); ?>
            <?php  $fn->page_nav(array('url'=>'pages/papertypes','name'=>'Paper Types','active'=>$page,'visible'=>1)); ?>
            <?php  $fn->page_nav(array('url'=>'pages/subjectareas','name'=>'Subject Areas','active'=>$page,'visible'=>1)); ?>
            <?php  $fn->page_nav(array('url'=>'pages/academiclevels','name'=>'Academic Levels','active'=>$page,'visible'=>1)); ?>
            <?php  $fn->page_nav(array('url'=>'pages/urgencies','name'=>'Urgencies','active'=>$page,'visible'=>1)); ?>
            </ul>
        </li> 
<?php 
}
else{ ?>
<script type="text/javascript">function add_chatinline(){var hccid=95527917;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); 
</script>
           <?php  $fn->page_nav(array('url'=>'pages/home','name'=>'My Dashboard','active'=>$page,'visible'=>1)); ?>
           <?php  $fn->page_nav(array('url'=>'pages/myneworder','name'=>'New Order','active'=>$page,'visible'=>1)); ?> 
           <?php  $fn->page_nav(array('url'=>'pages/myorders','name'=>'My Orders','active'=>$page,'visible'=>1)); ?> 
           <?php  $fn->page_nav(array('url'=>'pages/myrevions','name'=>'My Revisions','active'=>$page,'visible'=>1)); ?>      
<?php
}
?>
     
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<?php  }
else{?>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
    <img src="images/logo.png" style="width: 200px;height: 80px"> &nbsp;<span><a href="#" style="font-size: 1.8em;"><?php echo $page_desc; ?> </a>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">          
            <?php  $fn->page_nav(array('url'=>'common/index','name'=>'Home','active'=>$page,'visible'=>1)); ?>
            <?php  $fn->page_nav(array('url'=>'common/about','name'=>'About Us','active'=>$page,'visible'=>1)); ?>
            <?php  $fn->page_nav(array('url'=>'common/services','name'=>'Services','active'=>$page,'visible'=>1)); ?>
            <?php  $fn->page_nav(array('url'=>'common/testimonials','name'=>'Testimonials','active'=>$page,'visible'=>1)); ?>        
            <?php  $fn->page_nav(array('url'=>'common/faq','name'=>'FAQ','active'=>$page,'visible'=>1)); ?>         
            <?php  $fn->page_nav(array('url'=>'common/samples','name'=>'Samples','active'=>$page,'visible'=>1)); ?>                
            <?php  $fn->page_nav(array('url'=>'common/contactus','name'=>'Contact Us','active'=>$page,'visible'=>1)); ?> 
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
  <script type="text/javascript">function add_chatinline(){var hccid=95527917;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); 
</script>
</div>
<?php } 