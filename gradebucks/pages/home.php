<?php 

if(isset($_SESSION['userdetails']['userid'])){
     $today = date('Y-m-d');
     $user_id = $_SESSION['userdetails']['userid'];
     $orders_today  = $fn->find_count('tborders',"cast(createdon as date)='".$today."' and createdby='".$user_id."'"); 
     $completed_orders_today = $fn->find_count('tborders',"CAST(createdon as date)='".$today."' AND approved=2 and createdby='".$user_id."'"); 
     $revisions_today = $fn->find_count('tbmyrevisions',"CAST(createdon as date)='".$today."' and createdby='".$user_id."'");
//
////toatals
     $completed_orders = $fn->find_count('tborders',"approved=2 and createdby='".$user_id."'"); 
     $my_pending_orders = $fn->find_count('tborders',"approved=0 and createdby='".$user_id."'"); 
     $orders  = $fn->find_count('tborders',"createdby='".$user_id."'"); 
     $revisions = $fn->find_count('tbmyrevisions'," createdby='".$user_id."'");
}
?> 
<div class="sidebar one_quarter first">   
<div class="panel-primary col-md-12 col-sm-12" style="margin-top:0px; padding:0px">
<div class="panel-heading">
    <h3 class="panel-title" style="font-size: 1em;text-align: center"><i class="fa fa-list"></i>   Today's Summary</h3>
</div>
      <nav class="sdb_holder">
        <ul>
          <li><a href="index.php?r=pages/vieworders&p=View New Orders"> <?= $orders_today ?> Today's Orders </a></li>  
        </ul>
      </nav>
</div>

</div>

<div class="content three_quarter"> 
<div class="panel-primary col-md-12 col-sm-12" style="margin-top:-20px; padding:0px"><br>
<div class="panel-heading">
   <h2 class="panel-title"><i class="fa fa-dashboard"></i>    Dashboard <small>Statistics Overview </small></h2>
</div>
<br>
<div id="not"><?php $fn->setFlash();?></div>
<div style="text-align: center" class="alert-danger">
<i class="fa fa-star-o"></i> <a href="index.php?r=pages/completepayment&p=Complete Orders, Make Payment">You have <?= $my_pending_orders ?> pending order(s) kindly complete them so we can work on them.</a> <i class="fa fa-star-o"></i> </div>
<br>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-folder fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $orders ?></div>
                <div>My Orders</div>
            </div>
        </div>
    </div>
    <a href="index.php?r=pages/myorders&p=My Orders">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-folder-open fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $revisions ?></div>
                <div>My Revisions</div>
            </div>
        </div>
    </div>
    <a href="#">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>

<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-folder fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?= $completed_orders ?></div>
                <div>Completed Orders</div>
            </div>
        </div>
    </div>
    <a href="#">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>
</div>
</div>
</div>