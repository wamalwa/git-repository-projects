<?php
//get All posts
//get Approved posts
$pending_posts      = $fn->GetAllPosts(0);
//get declined posts
$approved_posts     = $fn->GetAllPosts(1);
$declined_posts     = $fn->GetAllPosts(3);
//total comments
//approved comments
$pending_comments   = $fn->GetAllPostComments(0);
$approved_comments  = $fn->GetAllPostComments(1);
$declined_comments  = $fn->GetAllPostComments(3);
//approved comments
//declined coments
//total users
?>
<div id="page" class="container">
<div class="row">
 <div id="sidebar" class="4u">
    <section>
        <?php  
        $p_posts      = count($pending_posts);
        $a_posts      = count($approved_posts);
        $d_posts      = count($declined_posts);
        $total_posts  = $p_posts+$a_posts+$d_posts;
        
        //comment counts
        $p_comments     = count($pending_comments);
        $a_comments     = count($approved_comments);
        $d_comments     = count($declined_comments);
        $total_comments = $p_comments+$a_comments+$d_comments;
        ?>
      <ul class="default">
          <li><button class="btn-block btn" id="btnTotalPostsView"><b><?php echo $fn->toCurrency($total_posts);?> Total Posts</b></button></li>
            <li><button class="btn-block btn" id="btnPendingPostsView"><?php echo $fn->toCurrency($p_posts);?> Posts Pending Approval</button></li>
            <li><button class="btn-block btn" id="btnApprovedPostsView"><?php echo $fn->toCurrency($a_posts);?> Approved Posts</button></li>
            <li><button class="btn-block btn" id="btnDeclinedPostsView"><?php echo $fn->toCurrency($d_posts);?> Declined Posts</button></li> 
           
        </ul> 
    </section>
       
</div> 
 <div id="sidebar" class="4u">
    <section>  
        <ul class="default">
            <li><button class="btn-block btn" id="btnTotalCommentsView"><b><?php echo $fn->toCurrency($total_comments);?> Total Comments</b></button></li>
            <li><button class="btn-block btn" id="btnPendingCommentsView"><?php echo $fn->toCurrency($p_comments);?> Comments Pending Approval</button></li> 
            <li><button class="btn-block btn" id="btnApprovedCommentsView"><?php echo $fn->toCurrency($a_comments);?> Approved Comments</button></li> 
            <li><button class="btn-block btn" id="btnDeclinedCommentsView"><?php echo $fn->toCurrency($d_comments);?> Declined Comments</button></li> 
        </ul>
    </section>       
</div>
 <div id="sidebar" class="4u">
    <section>  
<!--        <ul class="default">            
            <li><button class="btn-block btn" id="btnTotalUsersView"><b>Total Users</b></button></li>
            <li><button class="btn-block btn" id="btnApprovedPostView"> Comments Pending Approval</button></li> 
            <li><button class="btn-block btn" id="btnApprovedPostsiew">Approved Comments</button></li> 
            <li><button class="btn-block btn" id="btnDeclinedCommentView">Declined Comments</button></li>             
            <li><button class="btn-block btn" id="btnTotalUsersView">Total Users</button></li>
        </ul>-->
    </section>       
</div> 
 <div id="1" class="12u" style="display:none">
    <section id="sectionViewPosts">
        <table class="table table-bordered table-condensed table-striped" style="font-size:0.8em;">
     <thead style="font-weight:bold">
         <tr>
            <th></th>
            <th colspan="3"><?php echo $fn->toCurrency($p_posts);?> Posts Pending Approval</th>           
          </tr>
          <tr>
            <th>#</th>
            <th>Date </th>
            <th>Post Code </th>
            <th>Category</th>
            <th>Post Title</th>
           <th>Link Name</th>
            <th>Url</th>
            <th>Created By</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
       <?php  
        for ($i = 0; $i <$p_posts; $i++) { //break the string in the array
              $fields         = explode("|", $pending_posts[$i]);            
               $mdeia_details = $fn->GetAllMedia($fields[1]);
               $mdei_fields   = explode("|", $mdeia_details[0]);
        ?>
          <tr>
            <td><img src="<?php echo $mdei_fields[1];  ?>" alt="-" id="output" style=" width:50px;height:50px;"></td>
            <td><?php echo $fields[0];?></td>
            <td><?php echo $fields[1];?></td>
            <td><?php echo $fields[3];?></td>
            <td><?php echo $fields[2];?> </td>
            <td><?php echo $fields[6];?> </td>
            <td><?php echo $fields[5];?> </td>
            <td><?php echo $fields[7];?> </td>
            <td><a href="viewpostdetails.php?id=<?php  echo $i; ?>"><button>View Details</button></a></td>
          </tr>
           <?php }?>
        </tbody>
      </table>

    </section>

</div>
<div id="2" class="12u" style="display:none">
    <section id="sectionViewPosts">
        <table class="table table-bordered table-condensed table-striped" style="font-size:0.8em;">
     <thead style="font-weight:bold">
         <tr>
            <th></th>
            <th colspan="3"><?php echo $fn->toCurrency($a_posts);?> Approved Posts</th>           
          </tr>
          <tr>
            <th>#</th>
            <th>Date </th>
            <th>Post Code </th>
            <th>Category</th>
            <th>Post Title</th>
           <th>Link Name</th>
            <th>Url</th>
            <th>Created By</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
       <?php  
        for ($i = 0; $i <$a_posts; $i++) { //break the string in the array
              $fields           = explode("|", $approved_posts[$i]);            
               $mdeia_details   = $fn->GetAllMedia($fields[1]);
               $mdei_fields     = explode("|", $mdeia_details[0]);
        ?>
          <tr>
            <td><img src="<?php echo $mdei_fields[1];  ?>" alt="-" id="output" style=" width:50px;height:50px;"></td>
            <td><?php echo $fields[0];?></td>
            <td><?php echo $fields[1];?></td>
            <td><?php echo $fields[3];?></td>
            <td><?php echo $fields[2];?> </td>
            <td><?php echo $fields[6];?> </td>
            <td><?php echo $fields[5];?> </td>
            <td><?php echo $fields[7];?> </td>
            <td><a href="viewpostdetails.php?id=<?php  echo $i; ?>"><button>View Details</button></a></td>
          </tr>
           <?php }?>
        </tbody>
      </table>

    </section>

</div>

<div id="3" class="12u" style="display:none">
    <section id="sectionViewPosts">
        <table class="table table-bordered table-condensed table-striped" style="font-size:0.8em;">
     <thead style="font-weight:bold">
         <tr>
            <th></th>
            <th colspan="3"><?php echo $fn->toCurrency($d_posts);?> Declined Posts</th>           
          </tr>
          <tr>
            <th>#</th>
            <th>Date </th>
            <th>Post Code </th>
            <th>Category</th>
            <th>Post Title</th>
           <th>Link Name</th>
            <th>Url</th>
            <th>Created By</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
       <?php  
        for ($i = 0; $i <$d_posts; $i++) { //break the string in the array
              $fields         = explode("|", $declined_posts[$i]);            
               $mdeia_details = $fn->GetAllMedia($fields[1]);
               $mdei_fields   = explode("|", $mdeia_details[0]);
        ?>
          <tr>
            <td><img src="<?php echo $mdei_fields[1];  ?>" alt="-" id="output" style=" width:50px;height:50px;"></td>
            <td><?php echo $fields[0];?></td>
            <td><?php echo $fields[1];?></td>
            <td><?php echo $fields[3];?></td>
            <td><?php echo $fields[2];?> </td>
            <td><?php echo $fields[6];?> </td>
            <td><?php echo $fields[5];?> </td>
            <td><?php echo $fields[7];?> </td>
            <td><a href="viewpostdetails.php?id=<?php  echo $i; ?>"><button>View Details</button></a></td>
          </tr>
           <?php }?>
        </tbody>
      </table>

    </section>

</div>
<div id="4" class="12u" style="display:none">
    <section id="sectionViewPosts">
        <table class="table table-bordered table-condensed table-striped" style="font-size:0.8em;">
     <thead style="font-weight:bold">
         <tr>
            <th></th>
            <th colspan="3"><?php echo $fn->toCurrency($p_comments);?>  Comments Pending Approval</th>           
          </tr>
         <tr>
            <th>#</th>
            <th>Date </th>
            <th>User Name</th>
            <th>Email</th>
            <th>Comment</th>
          </tr>
        </thead>
        <tbody>
       <?php  
        for ($i = 0; $i < $p_comments; $i++) { //break the string in the array
              $fields = explode("|", $pending_comments[$i]);
              $no     = $i+1;
        ?>
          <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $fields[0];?></td>
            <td><?php echo $fields[1];?></td>
            <td><?php echo $fields[2];?></td>
            <td><?php echo $fields[3];?> </td>
          </tr>
           <?php }?>
        </tbody>
      </table>

    </section>

</div>
<div id="5" class="12u" style="display:none">
    <section id="sectionViewPosts">
        <table class="table table-bordered table-condensed table-striped" style="font-size:0.8em;">
     <thead style="font-weight:bold">
         <tr>
            <th></th>
            <th colspan="3"><?php echo $fn->toCurrency($a_comments);?> Approved Comments</th>           
          </tr>
         <tr>
            <th>#</th>
            <th>Date </th>
            <th>User Name</th>
            <th>Email</th>
            <th>Comment</th>
          </tr>
        </thead>
        <tbody>
       <?php  
        for ($i = 0; $i < $a_comments; $i++) { //break the string in the array
              $fields = explode("|", $approved_comments[$i]);
              $no     = $i+1;
        ?>
          <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $fields[0];?></td>
            <td><?php echo $fields[1];?></td>
            <td><?php echo $fields[2];?></td>
            <td><?php echo $fields[3];?> </td>
          </tr>
           <?php }?>
        </tbody>
      </table>

    </section>
</div> 
 <div id="6" class="12u" style="display:none">
    <section id="sectionViewPosts">
        <table class="table table-bordered table-condensed table-striped" style="font-size:0.8em;">
     <thead style="font-weight:bold">
         <tr>
            <th></th>
            <th colspan="3"><?php echo $fn->toCurrency($d_comments);?> Declined Comments</th>           
          </tr>
         <tr>
            <th>#</th>
            <th>Date </th>
            <th>User Name</th>
            <th>Email</th>
            <th>Comment</th>
          </tr>
        </thead>
        <tbody>
       <?php  
        for ($i = 0; $i <$d_comments; $i++) { //break the string in the array
              $fields = explode("|", $declined_comments[$i]);
              $no     = $i+1;
        ?>
          <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $fields[0];?></td>
            <td><?php echo $fields[1];?></td>
            <td><?php echo $fields[2];?></td>
            <td><?php echo $fields[3];?> </td>
          </tr>
           <?php }?>
        </tbody>
      </table>

    </section>

</div>
</div>
</div>
    <!-- /Page -->				
